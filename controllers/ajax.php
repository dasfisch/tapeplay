<?php
    use tapeplay\server\bll\UserBLL;
    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\PositionBLL;
    use tapeplay\server\bll\SchoolBLL;
    use tapeplay\server\bll\StatsBLL;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\Stat;

    require_once("bll/PlayerBLL.php");
    require_once("bll/PositionBLL.php");
    require_once("bll/SchoolBLL.php");
    require_once("bll/StatsBLL.php");
    require_once("bll/UserBLL.php");
    require_once("bll/VideoBLL.php");
    require_once("model/Stat.php");

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

                    if(isset($schools) && !empty($schools)) {
                        foreach($schools as $key=>$school) {
                            $encoded[] = $school->encodeJson();
                        }

                        $result['schools'] = $encoded;
                        $result['message'] = '';
                        $result['code'] = 200;
                    } else {

                    }

                    echo json_encode($encoded);
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
                        $schoolBLL = new SchoolBLL();

                        $school = $schoolBLL->getSchoolById($post['value']);

                        $user->setSchool($school[0]);

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
                    $thePositions = false;
                    $ran = false;

                    unset($post['hash']);

                    $user = $userBLL->getUser();

                    foreach($post['data'] as $data) {
                        $methodName = 'set'.ucfirst(substr($data['name'], 1, strlen($data['name'])));

                        if($data['name'] == '_position') {
                            $thePositions = true;

                            if($ran === false) {
                                $playerBll = new PlayerBLL();

                                // my current positions
                                $positions = $user->getPosition();

                                foreach($positions as $key=>$position) {
                                    $playerBll->deletePositions($user->getId(), $position->getId());

                                    unset($positions[$key]);
                                }

                                $ran = true;
                            }

                            try {
                                $playerBll->updatePositions($user->getId(), $data['value']);
                            } catch(Exception $e) {

                            }
                        } elseif($data['name'] != '_hash') {
                            $user->$methodName($data['value']);
                        } else {
                            $user->setHash($userBLL->createHash($user->getEmail(), $data['value']));
                        }
                    }

                    if($thePositions === true) {
                        $user->setPosition($positions);

                        $positionBll = new PositionBLL();

                        $user->setPosition($positionBll->getPositionsByPlayer($user->getId()));
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
            case 'updatestats':
                $errors = array();

                $statsBll = new StatsBLL();

                foreach($post['data'] as $stat) {
                    $id = explode('-', $stat['name']);
                    $val = $stat['value'];

                    $stat = new Stat();

                    $stat->setId($id[1]);
                    $stat->setStatValue($val);

                    try {
                        $statsBll->updatePlayerStat($stat, $userBLL->getUser()->getId());
                    } catch(Exception $e) {
                        $errors[] = $id;
                    }
                }

                if(empty($errors)) {
                    echo 200;
                } else {
                    echo 600;
                }

                break;
            case 'videoprivacy':
                try {
                    $playerBll = new PlayerBLL();

                    $playerBll->setMyVideoPrivacy((int)$userBLL->getUser()->getId(), (int)$post['level']);
                } catch(Exception $e) {

                }

                break;
            case 'optins':
                $switch = $post['switcher'];

                if($switch == 'off') {
                    echo 'deleting;';
                    try {
                        $userBLL->deleteOptin($userBLL->getUser()->getId(), $post['optin']);
                    } catch(Exception $e) {

                    }
                } else {
                    echo 'creating';
                    try {
                        $userBLL->addOptin($userBLL->getUser()->getId(), $post['optin']);
                    } catch(Exception $e) {

                    }
                }

                break;
            case 'deactivateme':
                if($userBLL->deactivateMe($userBLL->getUser()->getUserId())) {
                    $_SESSION['message']['message'] = 'You have been deactivated!';
                    $_SESSION['message'][''] = 'success';

                    echo 200;

                    \Util::setHeader('user/logout/');
                }

                break;
            case 'deletevideo':
                $videoBll = new VideoBLL();
                if($videoBll->deleteVideo($post['videoId'])) {
                    echo 200;
                }
        }
    } else {
        echo 'redirect '.$get['hash'];
//        header('Location:'.$controller->configuration->URLs['baseUrl']);
    }