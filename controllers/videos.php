<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)

    require_once ("bll/VideoBLL.php");

    use tapeplay\server\model\SearchFilter;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\Video;

    $bll = new VideoBLL();

    global $controller, $route, $smarty;

    /**
     * This will be the catcher; part of the rewrite rules;
     *
     * The url will be like this:
     *      http://www.tapeplay.com/__CLASS__/__METHOD__/__ID__?params....
     *          eg: http://www.tapeplay.com/videos/view/23
     *              http://www.tapeplay.com/videos/view/23?utm=google.com&etc=soforth
     *              http://www.tapeplay.com/videos/notes
     *
     */

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

                $msarty->display('videoNotes');

                break;
            default:
                /**
                 * Get first 20 videos (or whatever);
                 * Display them;
                 */
                $video = new VideoBLL();

                $video->search(new SearchFilter());

                $smarty->assign('videos', $video);
                $smarty->assign('file', 'videos/videoBrowse.tpl');

                $smarty->display('index.tpl');

                break;
        }
    } else {
        /**
         * If method isn't set, do a default action;
         * I think that the best will be a basic view all.
         */
        $video = new VideoBLL();

        $videos = $video->search(new SearchFilter());

//        echo '<pre>';
//        var_dump($videos[0]->v);
//        exit;

        $smarty->assign('videoCount', count($videos));
        $smarty->assign('videos', $videos);
        $smarty->assign('file', 'videos/videoBrowse.tpl');

        $smarty->display('index.tpl');
    }