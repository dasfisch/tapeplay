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

    $smarty->assign('file', 'index/index.tpl');
    $smarty->display('index.tpl');