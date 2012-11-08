<?php
    //all include, globals (not opposed to not using globals)

    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\PositionBLL;
    use tapeplay\server\bll\SportBLL;
    use tapeplay\server\bll\StatsBLL;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\SearchFilter;
    use tapeplay\server\model\Video;

    require_once("bll/PlayerBLL.php");
    require_once("bll/PositionBLL.php");
    require_once("bll/SportBLL.php");
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
            case 'video':
                if(isset($get['id']) && (int)$get['id'] > 0) {
                    $message = '';

                    $search = new SearchFilter();
                    $videoBll = new VideoBLL();

                    $search->setWhere('id', $get['id']);
                    $search->setWhere('method', 'videos');

                    $video = $videoBll->search($search);

                    // redirect user to browse page if video doesn't exist
                    if(!isset($video) || empty($video))
                    {
                        Util::setHeader("videos/notfound/");
                    }

                    $failed = array();
                    $sent = array();

                    $playerBll = new PlayerBLL();

                    $player = $playerBll->getPlayersByPlayerId((int)$video[0]->getPlayer()->getId(), (int)$video[0]->getPlayer()->getSport()->getId());

                    $statsBll = new StatsBLL();
                    $stats = $statsBll->getPlayerStats((int)$player->getId(), (int)$player->getSport()->getId());
                    $modder = (ceil(count($stats) / 3) > 1) ? ceil(count($stats) / 3) : 2;
                    $modder = 3;

                    $args = array("from" => $post["from"],
                        "modder" => $modder,
                        "statCount" => count($stats),
                        "stats" => $stats,
                        "video" => $video[0],
                                                "player" => $player,
                        "gradeLevel", $controller->configuration->gradeLevels[(int)$video[0]->getPlayer()->getGradeLevel()]);

                    $playerBll = new PlayerBLL();

                    $player = $playerBll->getPlayersByPlayerId((int)$video[0]->getPlayer()->getId(), (int)$video[0]->getPlayer()->getSport()->getId());

                    $panda = $controller->configuration->panda;
                    if(@fopen($panda['base'].$panda['bucket'].'/'.$video[0]->getPandaId().$panda['imageExt'], 'r')) {
                        $video[0]->fileExists = true;
                    } else {
                        $video[0]->fileExists = false;
                    }

                    $smarty->assign('hash', $inputFilter->createHash());
                    $smarty->assign('message', $message);
                    $smarty->assign('player', $player);
                    $smarty->assign('stats', $stats);
                    $smarty->assign('modder', $modder);
                    $smarty->assign('video', $video[0]);
                    $smarty->assign('fileExists', $video[0]->fileExists);
                    $smarty->assign("title", 'Share Videos from TapePlay');
                    $smarty->assign("description", "Share videos from TapePlay");

                    $smarty->display('emails/video.tpl');
                } else {
                    Util::setHeader("videos/notfound/");
                }

                break;
        }
    }