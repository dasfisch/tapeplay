<?php
    use tapeplay\server\bll\UserBLL;
    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\SchoolBLL;
    use tapeplay\server\bll\VideoBLL;

    require_once("bll/PlayerBLL.php");
    require_once("bll/SchoolBLL.php");
    require_once("bll/UserBLL.php");
    require_once("bll/VideoBLL.php");

    global $controller, $get, $inputFilter, $post, $route, $smarty, $sport, $userBLL;

    if((isset($post['hash']) && $inputFilter->validateHash($post['hash'])) || ($get['hash']) && $inputFilter->validateHash($get['hash'])) {
        switch($route->method) {
            case 'save':
                if(isset($post['video'])) {
                    try {
                        $userId = (isset($post['user']) && (int)$post['user'] > 0) ? (int)$post['user'] : null;
                        if(is_null($userId)) {
                            Throw new Exception('This is not a valid user id!', 600);
                        }

                        $videoId = $post['video'];

                        $videoBll = new VideoBLL();

                        $videoBll->checkForPreviousSave($videoId, $userId);

                        $result = $videoBll->insertSave((int)$videoId, (int)$userId);
                        if(isset($result)) {
                            echo 'This video was saved to your <a href="'.$controller->configuration->URLs['baseUrl'].'account/welcome/">profile</a>!';
                        }
                    } catch(Exception $e) {
                        echo $e->getMessage();
                    }
                }

                exit;

                default;
            case 'removevideo':
                if(isset($post['video'])) {
                    try {
                        $userId = (isset($post['user']) && (int)$post['user'] > 0) ? (int)$post['user'] : null;

                        echo $userId.' '.$post['video'].' video ';

                        if(is_null($userId)) {
                            Throw new Exception('This is not a valid user id!', 600);
                        }

                        $videoId = $post['video'];

                        $videoBll = new VideoBLL();

                        $result = $videoBll->removeSavedVideo((int)$userId, (int)$videoId);
                        if(isset($result)) {
                            echo 'This video was removed from your <a href="'.$controller->configuration->URLs['baseUrl'].'account/welcome/">profile</a>!';
                        }
                    } catch(Exception $e) {
                        echo $e->getMessage();
                    }
                }

                break;
            case 'report':
                if(isset($post['video'])) {
                    $to = $controller->configuration->errorReporting['reportEmail'];

                    $subject = 'Someone reported an issue!';

                    $body = 'Someone reported <a href="'.$controller->configuration->URLs['baseUrl'].'videos/view/'.$post['video'].'">this video</a>!
                                Please verify it violates our privacy policy, and, if it does, please contact our administrators to remove it!"';

                    $headers = "Content-type: text/html\r\n";

                    if (mail($to, $subject, $body, $headers)) {
                        echo '<p>Thanks. We will review this video and determine if it is inappropriate for this site.</p>';
                    } else {
                        echo '<p>There was an error! Please try again!</p>';
                    }
                } else {
                    echo 'I don\'t know what you are trying to do, but you shouldn\'t be doing it!';
                }

                exit;

                break;
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

                exit;

                break;
            case 'schoolupdate':
                if(isset($post['value']) && (int)$post['value'] > 0) {
                    $user = $userBLL->getUser();
                    $user->getSchool()->setId($post['value']);

                    $playerBll = new PlayerBLL();
                    $result = $playerBll->update($user);
                    if($result === true) {
                        $userBLL->setUser($user);

                        echo 200;
                    } else {
                        echo 600;
                    }
                } else {
                    echo 'not in here';
                    echo 600;
                }

                exit;

                break;
            case 'userupdate':
                if(isset($post) && !empty($post)) {
                    unset($post['hash']);

                    $user = $userBLL->getUser();

                    foreach($post['data'] as $data) {
                        $methodName = 'set'.ucfirst(substr($data['name'], 1, strlen($data['name'])));

                        if($data['name'] != '_hash') {
                            $user->$methodName($data['value']);
                        } else {
                            $user->setHash($userBLL->createHash($user->getEmail(), $data['value']));
                        }
                    }

                    $result = $userBLL->update($user);
                    if($result === true) {
                        $userBLL->setUser($user);

                        echo 200;
                    } else {
                        echo 600;
                    }
                }

                exit;

                break;
            case 'profileupdate':
                if(isset($post) && !empty($post)) {
                    unset($post['hash']);

                    $user = $userBLL->getUser();

                    foreach($post['data'] as $data) {
                        $methodName = 'set'.ucfirst(substr($data['name'], 1, strlen($data['name'])));

                        if($data['name'] != '_hash') {
                            $user->$methodName($data['value']);
                        } else {
                            $user->setHash($userBLL->createHash($user->getEmail(), $data['value']));
                        }
                    }

                    $playerBll = new PlayerBLL();

                    $result = $playerBll->update($user);
                    if($result === true) {
                        $userBLL->setUser($user);

                        echo 200;
                    } else {
                        echo 600;
                    }
                }

                exit;

                break;
        }
    } else {
        echo 'redirect '.$get['hash'];
//        header('Location:'.$controller->configuration->URLs['baseUrl']);
    }