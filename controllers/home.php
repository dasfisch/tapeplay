<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dasfisch
 * Date: 5/15/12
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
    //all include, globals (not opposed to not using globals)

    include('bll/StatsBLL.php');

	use tapeplay\server\bll\StatsBLL;
	use tapeplay\server\bll\VideoBLL;

    global $controller, $post, $route, $smarty, $sport, $userBLL;

    $user = $userBLL->getUser();
    $user = isset($user) ? $user : null;
    $userId = isset($user) ? $user->getUserId() : null;

    $smarty->assign('currentUrl', $route->getCurrentUrl());
    $smarty->assign('user', $user);
    $smarty->assign('userId', $userId);

    if(isset($sport['id']) && $sport['id'] > 0) {
        $statsBll = new StatsBLL();

        $stats = $statsBll->getStatsBySport($sport['id']);

		// grab video for "how-to"
		$videoBll = new VideoBLL();

        try {
		    $videoDisplayInfo = $videoBll->getVideoDisplayInfo($controller->configuration->information['howTapeplayWorksVideoId']);
        } catch(Exception $e) {
            $videoDisplayInfo = null;
        }

        $smarty->assign('file', 'index/home.tpl');
        $smarty->assign('stats', $stats);
        $smarty->assign("title", $sport['name']);
		$smarty->assign('videoDisplayInfo', $videoDisplayInfo);

        $smarty->display('home.tpl');
    } else {
        $smarty->assign('file', 'index/index.tpl');
        $smarty->assign("title", 'The world\’s evolved. So has recruiting.');

        $smarty->display('index.tpl');
    }