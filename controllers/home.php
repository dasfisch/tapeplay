<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)
    
    global $controller, $route, $smarty, $sport;

    if(isset($sport['id']) && (int)$sport['id'] > 0) {
        $smarty->assign('file', 'index/home.tpl');
        $smarty->display('home.tpl');
    } else {
        $smarty->assign('file', 'index/index.tpl');
        $smarty->display('index.tpl');
    }