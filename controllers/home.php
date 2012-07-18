<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)
    use tapeplay\server\bll\StatsBLL;

    include('bll/StatsBLL.php');
    
    global $controller, $post, $route, $smarty, $sport;

    if(isset($sport['id']) && $sport['id'] > 0) {
        $statsBll = new StatsBLL();

        $stats = $statsBll->getStatsBySport($sport['id']);

        $smarty->assign('stats', $stats);
        $smarty->assign('file', 'index/home.tpl');
        $smarty->display('home.tpl');
    } else {
        $smarty->assign('file', 'index/index.tpl');
        $smarty->display('index.tpl');
    }