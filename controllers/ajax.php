<?php
    use tapeplay\server\bll\UserBLL;
    use tapeplay\server\bll\PlayerBLL;
    use tapeplay\server\bll\PositionBLL;
    use tapeplay\server\bll\SchoolBLL;
    use tapeplay\server\bll\StatsBLL;
    use tapeplay\server\bll\VideoBLL;
    use tapeplay\server\model\SearchFilter;
    use tapeplay\server\model\Stat;

    require_once("bll/PlayerBLL.php");
    require_once("bll/PositionBLL.php");
    require_once("bll/SchoolBLL.php");
    require_once("bll/StatsBLL.php");
    require_once("bll/UserBLL.php");
    require_once("bll/VideoBLL.php");
    require_once("model/SearchFilter.php");
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

                    $subject = 'TapePlay Video Flag';

					$body = 'A video has been flagged for inappropriate content. Review it here: <a href="' . $controller->configuration->URLs['baseUrl'] . 'videos/view/' . $post['video'] . '">this video</a>';

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

                    $playerBll = new PlayerBLL();
                    $positionBll = new PositionBLL();

                    $player = $playerBll->getPlayersByPlayerId($post['playerId']);

                    foreach($post['data'] as $data) {
                        $methodName = 'set'.ucfirst(substr($data['name'], 1, strlen($data['name'])));

                        if($data['name'] == '_position') {
                            $thePositions = true;

                            if($ran === false) {
                                // my current positions
                                $positions = $positionBll->getPositionsByPlayer($post['playerId']);

                                foreach($positions as $key=>$position) {
                                    $playerBll->deletePositions($post['playerId'], $position->getId());

                                    unset($positions[$key]);
                                }

                                $ran = true;
                            }

                            try {
                                $playerBll->updatePositions($post['playerId'], $data['value']);
                            } catch(Exception $e) {

                            }
                        } else {
                            $player->$methodName($data['value']);
                        }
                    }

                    /**
                     * This will be run after the restructure of the users
                     */
//                    if($thePositions === true) {
//                        $player->setPosition($positions);
//
//                        $positionBll = new PositionBLL();
//
//                        $user->setPosition($positionBll->getPositionsByPlayer($post['playerId']));
//                    }

                    $result = $playerBll->update($player);
                    if($result === true) {
                        echo 200;
                    } else {
                        echo 600;
                    }
                }

                exit;

                break;
            case 'updatestats':
                $errors = array();

                $playerBll = new PlayerBLL();
                $statsBll = new StatsBLL();

                foreach($post['data'] as $stat) {
                    $id = explode('-', $stat['name']);
                    $val = $stat['value'] != 0 ? $stat['value'] : (int)0;

                    $theStat = new Stat();

                    $theStat->setId($id[1]);
                    $theStat->setStatValue($val);

                    try {
                        if($theStat->getStatValue() != '' || $theStat->getStatValue() == 0) {
                            $curStat = $statsBll->getSinglePlayerStat($post['playerId'], $id[1]);

                            if(!is_null($curStat->getId())) {
                                $statsBll->updatePlayerStat($theStat, $post['playerId']);
                            } else {
                                $playerBll->setStat($post['playerId'], $id[1], $val);
                            }
                        }
                    } catch(Exception $e) {
                        var_dump($e);
                        $errors[] = $id;
                    }
                }

                if(empty($errors)) {
                    $playerBll = new PlayerBLL();

                    $player = $playerBll->getPlayersByPlayerId($post['playerId']);

                    $player->setLastUpdate(strtotime('now'));

                    $result = $userBLL->update($player);

                    echo 200;
                } else {
                    echo 600;
                }

                break;
            case 'videoupdate':
                $search = new SearchFilter();
                $videoBll = new VideoBLL();

                $search->setWhere('id', $post['videoId']);
                $search->setWhere('method', 'videos');

                try {
                    $video = $videoBll->search($search);

                    foreach($post['data'] as $data) {
                        $methodName = 'set'.ucfirst(substr($data['name'], 1, strlen($data['name'])));

                        $video[0]->$methodName($data['value']);
                    }

                    $videoBll->update($video[0]);

                    echo 200;
                } catch(Exception $e) {
                    echo 600;
                }

                exit;

                break;
            case 'videoprivacy':
                try {
                    $playerBll = new PlayerBLL();

                    $playerBll->setMyVideoPrivacy((int)$userBLL->getUser()->getUserId(), (int)$post['level']);
                } catch(Exception $e) {

                }

                break;
            case 'optins':
                $switch = $post['switcher'];

                if($switch == 'off') {
                    try {
                        $userBLL->deleteOptin($userBLL->getUser()->getUserId(), $post['optin']);
                    } catch(Exception $e) {

                    }
                } else {
                    try {
                        $userBLL->addOptin($userBLL->getUser()->getUserId(), $post['optin']);

                        echo 200;
                    } catch(Exception $e) {
                        echo 600;
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

                $id = explode('-', $post['videoId']);

                if($videoBll->deleteVideo($id[2])) {
                    echo 200;
                }
        }
    } else {
        echo 'redirect '.$get['hash'];
//        header('Location:'.$controller->configuration->URLs['baseUrl']);
    }