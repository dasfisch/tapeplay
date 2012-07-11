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

    global $controller, $inputFilter, $route, $smarty, $sport, $userBLL;

    if(isset($route->method)) {
        switch($route->method) {
            case 'notes':
                /**
                 * Get video based on video_id; needs some validation;
                 * Get Notes based on video_id; needs some validation;
                 */
                $video = new Video($_GET['id']);
                $videoNotes = new Notes($_GET['id']);

                $smarty->assign('notes', $notes);
                $smarty->assign('video', $video);

                $smarty->display('videoNotes');

                break;
            case 'view':
                $search = new SearchFilter();

                $playerBll = new PlayerBLL();
                $videoBll = new VideoBLL();

                $search->id = $_GET['id'];
                $search->method = $route->class;

                $video = $videoBll->search($search);
                $player = $playerBll->get($video[0]->getUser()->getUserId());

                $videoPlayer = $videoBll->getFullVideoHTML($video[0]->getPandaId());

                //set a view
                try {
                    $view = $videoBll->insertView($video[0]->getId());
                } catch(Exception $e) {
                    //do something...but what...?
                }

                $search = new SearchFilter();

                $search->id = $player->getId();
                $search->method = 'users';

                $videos = $videoBll->search($search);

                $smarty->assign('hash', $inputFilter->createHash());
                $smarty->assign('player', $player);
                $smarty->assign('video', $video[0]);
                $smarty->assign('videoPlayer', $videoPlayer);
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/single.tpl');

                $smarty->display('index.tpl');

                break;
            default:
                /**
                 * If method isn't set, do a default action;
                 * I think that the best will be a basic view all.
                 */
                $video = new VideoBLL();

                $search = new SearchFilter();

                $search->sport_id = $sport;
                $search->method = 'videos';

                $videos = $video->search($search);

        //        echo '<pre>';
        //        var_dump($videos[0]->v);
        //        exit;

                $smarty->assign('videoCount', count($videos));
                $smarty->assign('videos', $videos);
                $smarty->assign('file', 'videos/videoBrowse.tpl');

                $smarty->display('index.tpl');
        }
    } else {
        /**
         * If method isn't set, do a default action;
         * I think that the best will be a basic view all.
         */
        $video = new VideoBLL();

        $search = new SearchFilter();

        $search->sport_id = $sport;
        $search->method = 'videos';

        $videos = $video->search($search);

//        echo '<pre>';
//        var_dump($videos[0]->v);
//        exit;

        $smarty->assign('videoCount', count($videos));
        $smarty->assign('videos', $videos);
        $smarty->assign('file', 'videos/videoBrowse.tpl');

        $smarty->display('index.tpl');
    }