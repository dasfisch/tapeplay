<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
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

    $smarty->assign('currentUrl', $route->getCurrentUrl());
    $smarty->assign('user', $userBLL->getUser());

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

                $videoPlayer = $videoBll->getFullVideoHTML($video[0]->getPandaId());

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

                $smarty->assign('hash', $inputFilter->createHash());
                $smarty->assign('player', $player);
                $smarty->assign('video', $video[0]);
                $smarty->assign('videoPlayer', $videoPlayer);
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