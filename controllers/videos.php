<?php
    //all include, globals (not opposed to not using globals)

    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\StatsBLL;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\SearchFilter;
    use tapeplay\server\model\Video;

    require_once("bll/PlayerBLL.php");
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

                $smarty->display('videoNotes');

                break;
            case 'view':
                $playerBll = new PlayerBLL();
                $search = new SearchFilter();
                $videoBll = new VideoBLL();

                $search->setWhere('id', (int)$get['id']);
                $search->setWhere('method', $route->class);

                $video = $videoBll->search($search);
                $player = $video[0]->getPlayer();

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

                $smarty->assign('hash', $inputFilter->createHash());
                $smarty->assign('player', $player);
                $smarty->assign('video', $video[0]);
                $smarty->assign("modder", $modder);
                $smarty->assign("statCount", count($stats));
                $smarty->assign('stats', $stats);
                $smarty->assign('videoDisplayInfo', $videoDisplayInfo);
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/single.tpl');

                $smarty->display('home.tpl');

                break;
            case 'search':
                /**
                 * If method isn't set, do a default action;
                 * I think that the best will be a basic view all.
                 */
                $search = new SearchFilter();
                $video = new VideoBLL();

                if(isset($post['searchVal']) && $post['searchVal'] != '') {
                    $search->setLike('title', $post['searchVal']);
                }

                $search->setWhere('sport_id', (int)$sport['id']);
                $search->setWhere('method', 'videos');
                $search->page = $page;
                $search->limit = $limit;

                $videos = $video->search($search);

        //        echo '<pre>';
        //        var_dump($videos[0]->v);
        //        exit;

                $smarty->assign('page', $page);
                $smarty->assign('pages', ceil($videos[0]->count / $search->limit));
                $smarty->assign('videoCount', count($videos));
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/videoSearch.tpl');

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

        $smarty->display('home.tpl');
    }