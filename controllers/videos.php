<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)

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
    if(isset($_GET['method'])) {
        switch($_GET['method']) {
            case 'notes':
                /**
                 * Get video based on video_id; needs some validation;
                 * Get Notes based on video_id; needs some validation;
                 */
                $video = new VideoSearch($_GET['id']);
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
                $video = new Video();

                $smarty->assign('videos', $video);

                $smarty->display('videoBrowse');

                break;
        }
    } else {
        /**
         * If method isn't set, do a default action;
         * I think that the best will be a basic view all.
         */
    }