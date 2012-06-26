<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)
    
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
            case 'about':
                $smarty->assign('file', 'company/about.tpl');

                $smarty->display('index.tpl');

                break;
            case 'advertising':
                $smarty->assign('file', 'company/advertising.tpl');

                $smarty->display('index.tpl');

                break;
            case 'advertising':
                $smarty->assign('file', 'company/advertising.tpl');

                $smarty->display('index.tpl');

                break;
            case 'share':
                $smarty->assign('file', 'company/share.tpl');

                $smarty->display('index.tpl');

                break;
            default:
                $smarty->assign('file', 'company/about.tpl');

                $smarty->display('index.tpl');

                break;
        }
    } else {
        header('Location:'.$controller->configuration->URLs['baseUrl'].'company/about/');
    }