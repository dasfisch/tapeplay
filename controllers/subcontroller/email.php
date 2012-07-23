<?php
    //all include, globals (not opposed to not using globals)

    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\StatsBLL;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\SearchFilter;
    use tapeplay\server\model\Video;

    require_once("bll/PlayerBLL.php");
    require_once("bll/VideoBLL.php");

    global $controller, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    if(isset($route->method)) {
        switch($route->method) {
            case 'video':


                break;
    }