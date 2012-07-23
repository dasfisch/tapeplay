<?php
    use tapeplay\server\bll\SchoolBLL;
    use tapeplay\server\bll\VideoBLL;

    require_once("bll/SchoolBLL.php");
    require_once("bll/VideoBLL.php");

    global $controller, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    if(1 == 1 || (isset($post['hash']) && $inputFilter->validateHash($post['hash'])) || ($get['hash']) && $inputFilter->validateHash($get['hash'])) {
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
            case 'schools':
                if(isset($post['schoolName'])) {
                    $schoolBLL = new SchoolBLL();

                    $schools = $schoolBLL->getSchoolsByName($post['schoolName']);

                    foreach($schools as $key=>$school) {
                        $encoded[] = $school->encodeJson();
                    }

                    echo json_encode($encoded);
                } else {
                    echo 'not in here';
                }

                break;
            case 'profileupdate':
                if(isset($post['value']) && (int)$post['value'] > 0) {
                    $user = $userBLL->getUser();
                    $user->getSchool()->setId($post['value']);

                    echo '<pre>';
                    var_dump($user);
                    exit;
                } else {
                    echo '<pre>';
                    var_dump($post);
                }

                break;
        }
    } else {
        echo 'redirect '.$get['hash'];
//        header('Location:'.$controller->configuration->URLs['baseUrl']);
    }