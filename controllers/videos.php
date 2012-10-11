<?php
    //all include, globals (not opposed to not using globals)

    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\PositionBLL;
    use tapeplay\server\bll\StatsBLL;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\SearchFilter;
    use tapeplay\server\model\Video;

    require_once("bll/PlayerBLL.php");
    require_once("bll/PositionBLL.php");
    require_once("bll/VideoBLL.php");

    global $controller, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    $limit = (isset($get['size']) && (int)$get['size'] > 0) ? $get['size'] : 10;
    $page = (isset($get['page']) && (int)$get['page'] > 0) ? $get['page'] : 1;

    $user = $userBLL->getUser();
    $user = isset($user) ? $user : null;
    $userId = isset($user) ? $user->getUserId() : null;

    $smarty->assign('currentUrl', $route->getCurrentUrl());
    $smarty->assign('user', $user);
    $smarty->assign('userId', $userId);

    if(isset($route->method)) {
        switch($route->method) {
            case 'browse':
                $search = new SearchFilter();
                $videoBll = new VideoBLL();

                $search->page = $page;
                $search->limit = 15;

                $search->setWhere('method', $route->class);
                $search->setWhere('sport_id', (int)$sport['id']);

                $videos = $videoBll->search($search);

                $smarty->assign('page', $page);
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/browse.tpl');
                $smarty->assign("title", 'Browse '.$sport['name'].' TapePlay');

                $smarty->display('home.tpl');

                break;
            case 'notes':
                /**
                 * Get video based on video_id; needs some validation;
                 * Get Notes based on video_id; needs some validation;
                 */
                $video = new Video((int)$get['id']);
                $videoNotes = new Notes((int)$get['id']);

                $smarty->assign('notes', $notes);
                $smarty->assign('video', $video);
                $smarty->assign("title", 'About TapePlay');

                $smarty->display('videoNotes');

                break;
            case 'view':
                $goBack = isset($_SESSION['search']) && !empty($_SESSION['search']) ? 1 : 0;

                $playerBll = new PlayerBLL();
                $search = new SearchFilter();
                $videoBll = new VideoBLL();

                $search->setWhere('id', (int)$get['id']);
                $search->setWhere('method', $route->class);

                $video = $videoBll->search($search);
                $player = $video[0]->getPlayer();

                $positionBll = new PositionBLL();

                try {
                    $positions = $positionBll->getPositionsByPlayer($player->getId());

                    $player->setPosition($positions);
                } catch(Exception $e) {

                }

                $videoDisplayInfo = $videoBll->getVideoDisplayInfo($video[0]->getPandaId());

                //set a view
                try {
                    $view = $videoBll->insertView($video[0]->getId());
                } catch(Exception $e) {
                    //do something...but what...?
                }

                $search = new SearchFilter();

                $search->setWhere('player_id', $player->getId());
                $search->setWhere('method', $route->class);

                $videos = $videoBll->search($search);

                $statsBll = new StatsBLL();
                $stats = $statsBll->getPlayerStats($player->getId(), (int)$player->getSport()->getId());

                $modder = (ceil(count($stats) / 3) > 1) ? ceil(count($stats) / 3) : 2;

                $smarty->assign('goBack', $goBack);
                $smarty->assign('hash', $inputFilter->createHash());
                $smarty->assign("modder", $modder);
                $smarty->assign('player', $player);
                $smarty->assign("statCount", count($stats));
                $smarty->assign('stats', $stats);
                $smarty->assign('video', $video[0]);
                $smarty->assign('videoDisplayInfo', $videoDisplayInfo);
                $smarty->assign('videos', $videos);
				$smarty->assign('gradeLevel', $controller->configuration->gradeLevels[$player->getGradeLevel()]);
                $smarty->assign('file', 'videos/single.tpl');
                $smarty->assign("title", $video[0]->getTitle());
				$smarty->assign("description", "Featuring " . $player->getFirstName() . " on TapePlay (" . $player->getSport()->getSportName() . ")");

                $smarty->display('home.tpl');

                break;
            case 'search':
                /**
                 * If method isn't set, do a default action;
                 * I think that the best will be a basic view all.
                 */
                $search = new SearchFilter();
                $video = new VideoBLL();

                $title = $sport['name'].' Videos';

                if(isset($post['search']) && $post['search'] != '') {
                    $search->setLike('title', $post['search']);

                    $title = 'Search Videos for '.$post['search'].' on TapePlay';

                    $_SESSION['search'] = serialize($search);
                } else {
                    if(isset($_SESSION['search']) && !empty($_SESSION['search']) && isset($get['back']) && $get['back'] == '1') {
                        $search = unserialize($_SESSION['search']);
                    }
                }

                $search->setWhere('sport_id', (int)$sport['id']);
                $search->setWhere('method', 'videos');

                $search->page = $page;
                $search->limit = $limit;

                $videos = $video->search($search);

                $pages = (isset($videos[0]) && !empty($videos[0])) ? ceil($videos[0]->count / $search->limit) : null;

                $smarty->assign('page', $page);
                $smarty->assign('pages', $pages);
                $smarty->assign('videoCount', count($videos));
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/videoSearch.tpl');
                $smarty->assign("title", $title);

                $smarty->display('home.tpl');

                break;
            case 'email':
                if(isset($get['id']) && (int)$get['id'] > 0) {
                    $message = '';

                    $search = new SearchFilter();
                    $videoBll = new VideoBLL();

                    $search->setWhere('id', $get['id']);
                    $search->setWhere('method', 'videos');

                    $video = $videoBll->search($search);

                    if(isset($post) && isset($post['hash']) && $inputFilter->validateHash($post['hash'])) {
                        $failed = array();
                        $sent = array();

                        $statsBll = new StatsBLL();
                        $stats = $statsBll->getPlayerStats((int)$video[0]->getPlayer()->getUserId(), (int)$video[0]->getPlayer()->getSport()->getId());

                        $modder = (ceil(count($stats) / 3) > 1) ? ceil(count($stats) / 3) : 2;

                        /**
                         * generate email template
                         */
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= "From: TapePlay Admin <digital-no-reply@tapeplay.com>\r\n";

                        $subject = 'The Next Big Thing';

                        $smarty->assign('from', $post['from']);
                        $smarty->assign("modder", $modder);
                        $smarty->assign("statCount", count($stats));
                        $smarty->assign('stats', $stats);
                        $smarty->assign('video', $video[0]);

                        $body = $smarty->fetch('emails/video.tpl', false);

                        foreach($post['email'] as $key=>$email) {
                            if(in_array($email, $sent)){
                                continue;
                            }

                            if(mail($email, $subject, $body, $headers)) {
                                $sent[] = $email;
                            } else {
                                $failed[] = $email;
                            }
                        }

                        if(count($failed) == 0) {
                            $message = '<h3 class="success">Success! Everyone got the email!</h3>';
                        } else {
                            $message = '<h3 class="error">The following email addresses did not receive the email:</h3><ul>';

                            foreach($failed as $key=>$fail) {
                                $message .= '<li>'.$fail.'</li>';
                            }

                            $message .= '</ul>';
                        }
                    }

                    $smarty->assign('file', 'videos/emailvideo.tpl');
                    $smarty->assign('hash', $inputFilter->createHash());
                    $smarty->assign('message', $message);
                    $smarty->assign('video', $video[0]);
                    $smarty->assign("title", 'Share Videos from TapePlay');

                    $smarty->display('home.tpl');
                } else {
                    header('Location:'.$controller->configuration->URLs['baseUrl'].'videos/browse/');
                }

                break;
            default:
                /**
                 * If method isn't set, do a default action;
                 * I think that the best will be a basic view all.
                 */
                $search = new SearchFilter();
                $video = new VideoBLL();

                $search->setWhere('sport_id', (int)$sport);
                $search->setWhere('method', 'videos');

                $videos = $video->search($search);

        //        echo '<pre>';
        //        var_dump($videos[0]->v);
        //        exit;

                $smarty->assign('page', $page);
                $smarty->assign('pages', ceil(count($videos) / 20));
                $smarty->assign('videoCount', count($videos));
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/videoSearch.tpl');
                $smarty->assign("title", 'Browse TapePlay');

                $smarty->display('home.tpl');

                break;
        }
    } else {
        /**
         * If method isn't set, do a default action;
         * I think that the best will be a basic view all.
         */
        $search = new SearchFilter();
        $video = new VideoBLL();

        $search->setWhere('sport_id', (int)$sport['id']);
        $search->setWhere('method', 'videos');

        if(isset($post['searchVal']) && $post['searchVal'] != '') {
            $search->setLike('title', $post['searchVal']);
        }

        $videos = $video->search($search);

        $smarty->assign('page', $page);
        $smarty->assign('pages', ceil(count($videos) / 20));
        $smarty->assign('videoCount', count($videos));
        $smarty->assign('videos', $videos);
        $smarty->assign('file', 'videos/videoSearch.tpl');
        $smarty->assign("title", 'Browse TapePlay');

        $smarty->display('home.tpl');
    }