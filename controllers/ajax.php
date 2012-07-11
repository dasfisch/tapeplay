<?php
    use tapeplay\server\bll\VideoBLL;

    require_once("bll/VideoBLL.php");

    global $controller, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    if(isset($post['hash']) && $inputFilter->validateHash($post['hash'])) {
        switch($route->method) {
            case 'save':
                if(isset($post['video'])) {
                    try {
                        $userId = (isset($post['user']) && (int)$post['user'] > 0) ? (int)$post['user'] : null;

                        $videoId = $post['video'];

                        $videoBll = new VideoBLL();

                        $videoBll->checkForPreviousSave($videoId, $userId);

                        $result = $videoBll->insertSave((int)$videoId, (int)$userId);
                    } catch(Exception $e) {
                        echo $e->getMessage();
                    }
                }

                exit;

                default;
        }
    } else {
        header('Location:'.$controller->configuration->URLs['baseUrl']);
    }