<?php

//all include, globals (not opposed to not using globals)
require_once("utility/Util.php");

require_once("enum/AccountTypeEnum.php");
require_once("enum/PandaVerbTypes.php");
require_once("enum/controllers/UserMethods.php");

require_once("bll/Panda.php");
require_once("bll/PlayerBLL.php");
require_once("bll/PositionBLL.php");
require_once("bll/SchoolBLL.php");
require_once("bll/SportBLL.php");
require_once("bll/StatsBLL.php");
require_once("bll/UserBLL.php");
require_once("bll/VideoBLL.php");

require_once("bll/SportBLL.php");
require_once("bll/StatsBLL.php");

require_once("model/Coach.php");
require_once("model/Player.php");
require_once("model/Position.php");
require_once("model/School.php");
require_once("model/Scout.php");
require_once("model/SearchFilter.php");
require_once("model/Sport.php");
require_once("model/User.php");
require_once("model/Video.php");
require_once("model/VideoNote.php");

use tapeplay\server\bll\Panda;
use tapeplay\server\bll\PlayerBLL;
use tapeplay\server\bll\PositionBLL;
use tapeplay\server\bll\SchoolBLL;
use tapeplay\server\bll\SportBLL;
use tapeplay\server\bll\StatsBLL;
use tapeplay\server\bll\UserBLL;
use tapeplay\server\bll\VideoBLL;

use tapeplay\server\model\Coach;
use tapeplay\server\model\Player;
use tapeplay\server\model\Position;
use tapeplay\server\model\School;
use tapeplay\server\model\Scout;
use tapeplay\server\model\SearchFilter;
use tapeplay\server\model\Sport;
use tapeplay\server\model\User;
use tapeplay\server\model\Video;

global $controller, $inputFilter, $message, $post, $route, $smarty, $sport, $userBLL;

$user = $userBLL->getUser();
$user = isset($user) ? $user : null;
$userId = isset($user) ? $user->getUserId() : null;

$smarty->assign('currentUrl', $route->getCurrentUrl());
$smarty->assign('user', $user);
$smarty->assign('userId', $userId);

// check for request method to see if we are posting data
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$posted = true;

	// cleanup post variable
	//$inputFilter = new InputFilter();
	//$_POST = $inputFilter->process($_POST);
}
else
{
	$posted = false;
}

if(!isset($user) || !isset($userId) || empty($userId)) {
    if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/user/login/' &&
            $_SERVER['REQUEST_URI'] !== '/user/signup/' &&
            $_SERVER['REQUEST_URI'] !== '/user/personal/' &&
			$_SERVER['REQUEST_URI'] !== '/user/forgot/') {
        Util::setHeader('user/login/');
    }
} else {
    if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/user/logout/') {
        $step = $user->getStatus();

        if($step == AccountStatusEnum::$STEP2) {
            if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/user/upload/') {
                Util::setHeader('user/upload/');
            }
        } elseif($step == AccountStatusEnum::$STEP3) {
            if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/user/info/') {
                $_SESSION['message']['message'] = 'You\'ve uploaded a video. Now, finish up your profile!';
                $_SESSION['message']['type'] = 'error';

                Util::setHeader('user/info/');
            }
        }
    }
}

// check for method so we can see which page to load
if (isset($route->method))
{
	switch ($route->method)
	{
		case UserMethods::$LOGIN: // http://www.tapeplay.com/user/login/

			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
				if ($userBLL->authenticate($post["username"], $post["password"]))
				{
					// we are authenticated - grab user from db

					// check step that user is on to make sure they have completed login
					$status = $userBLL->getUser()->getStatus();
					$accountType = $userBLL->getAccountType();
					switch ($status)
					{
						case AccountStatusEnum::$STEP2: // need to transfer to step 2
							if ($accountType == AccountTypeEnum::$PLAYER)
							{
								Util::setHeader("user/upload/");
							}
							else if ($accountType == AccountTypeEnum::$COACH || $accountType == AccountTypeEnum::$SCOUT)
							{
								Util::setHeader("user/info/");
							}
							break;

						case AccountStatusEnum::$STEP3:
							if ($accountType == AccountTypeEnum::$PLAYER)
							{
								Util::setHeader("user/info/");
							}
							else if ($accountType == AccountTypeEnum::$COACH || $accountType == AccountTypeEnum::$SCOUT)
							{
								Util::setHeader("user/payment/");
							}
							break;

						default:
							print "default";
						Util::setHeader("account/welcome/");
					}

				}
				else
				{
                    $message->message = 'Your username or password were incorrect!';
                    $message->type = 'error';

					// authentication failed
                    $smarty->assign("file", "user/login/login.tpl");
                    $smarty->assign("message", $message);
                    $smarty->assign("title", 'Login');

					$smarty->display("home.tpl");
				}
			}
			else
			{
				if (!isset($_SESSION["userId"]))
				{
					$smarty->assign("file", "user/login/login.tpl");
                    $smarty->assign("title", 'Login');

					$smarty->display("home.tpl");
				}
				else
				{
					// redirect to another page (home page)
					Util::setHeader("index.php");
				}
			}
			break;

		case UserMethods::$FORGOT: // http://www.tapeplay.com/user/forgot/

			if ($posted)
			{
				// TODO: Check for email address and send password to user.
			}
			else
			{
				// load up template
				$smarty->assign("file", "user/login/forgot.tpl");
                $smarty->assign("title", 'Forgot Your Password?');

				$smarty->display("home.tpl");
			}

			break;

		case UserMethods::$SIGNUP: // http://www.tapeplay.com/user/signup/
			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
				// get current account type
				if (isset($_POST["playerButton"]))
					$accountType = AccountTypeEnum::$PLAYER;
				else if (isset($_POST["coachButton"]))
					$accountType = AccountTypeEnum::$COACH;
				else if (isset($_POST["scoutButton"]))
					$accountType = AccountTypeEnum::$SCOUT;

				// save account type to session
				$_SESSION["accountType"] = $accountType;

				// send user to the signup page
				Util::setHeader("user/personal/");
			}
			else
			{
				$smarty->assign("file", "user/signup/signup.tpl");
                $smarty->assign("title", 'Join TapePlay');

				$smarty->display("home.tpl");
			}
			break;

		case UserMethods::$PERSONAL: // http://www.tapeplay.com/user/personal/
			// check for the need to process the incoming information
			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
                $search = new SearchFilter();

                $search->setWhere('email', $post['email']);
                $search->setWhere('method', 'users');

                $search->page = 1;
                $search->limit = 1;

                $users = $userBLL->search($search);
                if(isset($users) && !empty($users)) {
                    $thirteenYearsBeforeNow = date('Y-m-d', strtotime('13 years ago'));

                    $smarty->assign('userExists', 'A user with this email already exists!');
                    $smarty->assign('message', '');

                    $smarty->assign("thirteenBelow", $thirteenYearsBeforeNow);
                    $smarty->assign('file', "user/personal/playerPersonal.tpl");
                    $smarty->assign('message', $message);
                    $smarty->assign('post', $post);
                    $smarty->assign('title', 'Join TapePlay');
                    $smarty->assign('selected', strtotime($post['birthYear']));

                    $smarty->display("home.tpl");

                    exit;
                }

				// create hash
				$hash = $userBLL->createHash($post["email"], $post["password"]);

				// create user object based on data entered
				$user = new User();
				$user->setAccountType(AccountTypeEnum::$PLAYER);
				$user->setFirstName($_POST["firstName"]);
				$user->setLastName($_POST["lastName"]);
				$user->setHash($hash);
				$user->setEmail($_POST["email"]);
				$user->setLastLogin(time());
				$user->setBirthYear($_POST["birthYear"]);
				$user->setGender($_POST["gender"]);
				$user->setZipcode($_POST["zipcode"]);

				// insert user, grab newly-created id and assign to session
				$userId = $userBLL->insert($user);

				if ($userId > 0)
				{
					// update status
                    try {
					    $userBLL->updateStatus(\AccountStatusEnum::$STEP2);
                    } catch(Exception $e) {
//                        echo '<pre>';
//                        var_dump($e);
//                        exit;
                    }

					// determine which page to load
					switch ($userBLL->getAccountType())
					{
						case AccountTypeEnum::$PLAYER:
							Util::setHeader("user/upload/");
							break;

						case AccountTypeEnum::$COACH:
							Util::setHeader("user/info/");
							break;

						case AccountTypeEnum::$SCOUT:
							Util::setHeader("user/info/");
							break;

						default:
                            $_SESSION['message']['message'] = 'A user with this email already exists!';
                            $_SESSION['message']['type'] = 'error';

							Util::setHeader("user/signup/");
							break;
					}
				}
				else
				{
					// user was not created.  show current page again.
					$smarty->assign('file', "user/personal/");
                    $smarty->assign('title', 'Join TapePlay');

					$smarty->display("home.tpl");
					//
				}
			}
			else
			{
                if(isset($message->message) && !empty($message->message)) {
                    $userExists = $message->message;

                    $smarty->assign('userExists', $userExists);
                    $smarty->assign('message', '');
                }

				// determine which page to load
				switch ($userBLL->getAccountType())
				{
					case AccountTypeEnum::$PLAYER:
						$template = "user/personal/playerPersonal.tpl";
						break;

					case AccountTypeEnum::$COACH:
						$template = "user/personal/coachPersonal.tpl";
						break;

					case AccountTypeEnum::$SCOUT:
						$template = "user/personal/scoutPersonal.tpl";
						break;
					default:
						$template = "user/personal/playerPersonal.tpl";
				}

                $thirteenYearsBeforeNow = date('Y-m-d', strtotime('13 years ago'));

				// now display the template based on above selection
                $smarty->assign("thirteenBelow", $thirteenYearsBeforeNow);
                $smarty->assign('file', $template);
                $smarty->assign('selected', '');
                $smarty->assign('title', 'Join TapePlay');

				$smarty->display("home.tpl");
			}

			break;

		case UserMethods::$UPLOAD: // http://www.tapeplay.com/user/upload/
            if(!$userBLL->getUser()) {
                header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
            }

			// need instance of Panda
			$panda = new Panda();

			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
				// TODO: Process uploaded video
				$video = new Video();

				$video->setPandaId($_POST["panda_video_id"]); // panda id
				$video->setTitle($_POST["title"]);
				$video->setRecordedMonth($_POST["videoMonth"]);
				$video->setRecordedYear($_POST["videoYear"]);
				$video->setUploadDate(time()); // default to NOW
                $video->setSportId($post['sport_id']);

				$videoBLL = new VideoBLL();
				$video = $videoBLL->insert($video, (int)$userBLL->getUser()->getId());

				if ($video->getId() > 0)
				{
                    if($user->getStatus() != \AccountStatusEnum::$COMPLETE) {
                        // update status
                        try {
                            $userBLL->updateStatus(\AccountStatusEnum::$STEP3);
                        } catch(Exception $e) {
                            //there was an error; somehow we gotta figure that out.
                        }
                    }

                    try {
                        $sportBll = new SportBLL();

                        $search = new SearchFilter();

                        $search->setWhere('id', $post['sport_id']);

                        $sport = $sportBll->get($search);

                        $userBLL->getUser()->setSport($sport[0]);
                        $userBLL->setUser($userBLL->getUser());

                        $playerBLL = new PlayerBLL();

                        $myPlayerInfo = $playerBLL->getPlayersByUserId($userBLL->getUser()->getUserId());
                    } catch(Exception $e) {

                    }

                    /**
                     * @TODO: if user video uploads, check to see what sport they have attached to their account;
                     * if the sport doesn't match the current posted sport, force their account to step 3, and make them
                     * create a new player.
                     *
                     * For now, disallow multiple sports
                     */
                    $sports = array();

                    if(isset($myPlayerInfo)) {
                        foreach($myPlayerInfo as $player) {
                            $sports[] = $player->getSport()->getId();
                        }
                    }

                    $_SESSION['postSport'] = $post['sport_id'];
                    $_SESSION['last_video'] = $userBLL->getLastInsertID();

                    if(!in_array($post['sport_id'], $sports)) {
                        // insert succeeded - go to info page
                        Util::setHeader("user/info/");
                    } else {
                        Util::setHeader('account/welcome/');
                    }
				}
			}
			else
			{
				// get json encode of panda access details
				$pandaAccessDetails = json_encode(@$panda->signed_params(PandaVerbTypes::$POST, "/videos.json", array()));

				// get video years
				$videoYears = "";
				for ($i = date('Y', strtotime('now')); $i > 1980; $i--) {
					$videoYears .= "<option value='".$i ."'>" . $i . "</li>";
                }

                $sportBll = new SportBLL();
                $search = new SearchFilter();

                $sports = $sportBll->get($search);

				// send user to upload page
				$smarty->assign("pandaAccessDetails", $pandaAccessDetails);
				$smarty->assign("APIURL", $panda->getAPIURL());
				$smarty->assign("videoYears", $videoYears);
				$smarty->assign("file", "user/upload/upload.tpl");
                $smarty->assign('sports', $sports);
                $smarty->assign('currentSport', $sport);
                $smarty->assign('user', $userBLL->getUser());
                $smarty->assign("title", 'Upload Video File on TapePlay');

				$smarty->display("home.tpl");
			}

			break;

		case UserMethods::$INFO:
            if(!$userBLL->getUser()) {
                header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
            }

			// check for the need to process the incoming information
			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
				switch ($userBLL->getAccountType())
				{
					case AccountTypeEnum::$COACH:
						// TODO: Process coach information

						// update status to most recently completed step
						$userBLL->updateStatus(\AccountStatusEnum::$STEP3);

						Util::setHeader("user/payment/");
						break;
					case AccountTypeEnum::$SCOUT:
						// TODO: Process scout information

						// update status to most recently completed step
						$userBLL->updateStatus(\AccountStatusEnum::$STEP3);

						// send to payment page
						Util::setHeader("user/payment/");
						break;
					case AccountTypeEnum::$PLAYER:
						// get player basics and add
                        $userBLL->getUser()->setNumber($post["number"]);
                        $userBLL->getUser()->setGradeLevel($post["gradeLevel"]);
                        $userBLL->getUser()->setHeight($post['height']);
                        $userBLL->getUser()->setWeight($post["weight"]);
                        $userBLL->getUser()->setCoachName($post["headCoachName"]);
                        $userBLL->getUser()->setGraduationMonth($post["graduationMonth"]);
                        $userBLL->getUser()->setGraduationYear($post["graduationYear"]);
						$userBLL->getUser()->setPlayingLevel($post["playingLevel"]);

                        if(isset($post['schoolId']) && (int)$post["schoolId"] > 0) {
                            $userBLL->getUser()->getSchool()->setId((int)$post["schoolId"]);
                        }

                        if(isset($post['position'])) {
                            $playerBLL = new PlayerBLL();

                            foreach($post['position'] as $position) {
                                try {
                                    $playerBLL->setPosition($user->getId(), $position);
                                } catch (Exception $e) {
                                }
                            }
                        }

                        if(isset($post['schoolId']) && $post['schoolId'] != '') {
                            // create school and assign to player
                            $schoolBll = new SchoolBLL();
                            $school = $schoolBll->getSchoolById($post["schoolId"]);

                            $userBLL->getUser()->setSchool($school[0]);
                        }

                        //create sport and assign to player
                        $sportBll = new SportBLL();

                        $search = new SearchFilter();
                        $search->setWhere('id', $post['sport']);
                        $search->setWhere('method', 'sports');

                        $sport = $sportBll->get($search);

                        $userBLL->getUser()->setSport($sport[0]);

                        $playerBLL = new PlayerBLL();

                        if($user->getStatus() == \AccountStatusEnum::$COMPLETE) {
                            $playerId = $playerBLL->insert($userId);

                            // get player basics and add
                            $player = new Player();

                            $player->setId($playerId);
                            $player->setNumber($post["number"]);
                            $player->setGradeLevel($post["gradeLevel"]);
                            $player->setHeight($post['height']);
                            $player->setWeight($post["weight"]);
                            $player->setCoachName($post["headCoachName"]);
                            $player->setGraduationMonth($post["graduationMonth"]);
                            $player->setGraduationYear($post["graduationYear"]);
                            $player->setPlayingLevel($post["playingLevel"]);

                            $userBLL->setUser($player);
                        } else {
                            // update status to most recently completed step
                            $userBLL->updateStatus(\AccountStatusEnum::$COMPLETE);
                        }

                        if ($playerBLL->update($userBLL->getUser()))
                        {

                            // INsert player stats if they exist
                            if(isset($post['stat'])) {
                                $userId = $userBLL->getUser()->getId();

                                foreach($post['stat'] as $key=>$stat) {
                                    try {
                                        if($stat != '') {
                                            if(!$playerBLL->setStat($userId, $key, $stat)) {
                                                $failed['userId'] = $userId;
                                                $failed['keyId'] = $key;
                                                $failed['stat'] = $stat;
                                            }
                                        }
                                    } catch(Exception $e) {

                                    }
                                }
                            }

                            // this is the last step in the player signup process.  send to welcome page
                            $_SESSION['message']['message'] = 'Your profile was updated!';
                            $_SESSION['message']['type'] = 'success';

                            $userBLL->setUser($userBLL->getUser());

                            Util::setHeader("account/welcome/");

                            exit;
                        }

						break;
				}
			}
			else
			{
				// determine which page to load
				$template = "user/info/playerInfo.tpl";
				switch ($userBLL->getAccountType())
				{
					case AccountTypeEnum::$COACH:
						$template = "user/info/coachInfo.tpl";
						break;
					case AccountTypeEnum::$SCOUT:
						$template = "user/info/scoutInfo.tpl";
						break;
					case AccountTypeEnum::$PLAYER:
						$template = "user/info/playerInfo.tpl";

                        $startYear = date('Y', strtotime('now'));

                        $search = new SearchFilter();
                        $videoBLL = new VideoBLL();

                        $search->setSort('name', 'uploaded_date');
                        $search->setSort('method', 'videos');
                        $search->setSort('order', 'DESC');
                        $search->setWhere('method', 'videos');
                        $search->setWhere('player_id', $user->getId());

                        $videos = $videoBLL->search($search);

                        $sportId = $videos[0]->getSport()->getId();

                        $statsBll = new StatsBLL();
                        try {
                            $stats = $statsBll->getStatsBySport($sportId);
                        } catch(Exception $e) {
                            $stats = null;
                        }

                        try {
                            $positionBll = new PositionBLL();

                            $positions = $positionBll->getPositionsBySport($sportId);
                        } catch(Exception $e) {

                        }

                        $video = null;

                        $videoBLL = new VideoBLL();

                        $search = new SearchFilter();

                        $search->setSort('name', 'uploaded_date');
                        $search->setSort('method', 'videos');
                        $search->setSort('order', 'DESC');
                        $search->setWhere('method', 'videos');

                        $search->limit = 1;
                        $search->page = 1;

                        if(!isset($_SESSION['last_video']) || (int)$_SESSION['last_video'] <= 0) {
                            $search->setWhere('player_id', $user->getId());
                        } else {
                            $search->setWhere('id', $_SESSION['last_video']);
                        }

                        try {
                            $video = $videoBLL->search($search);

                            $smarty->assign('video', $video[0]);
                        } catch(Exception $e) {

                        }

                        $modder = (ceil(count($stats) / 3) > 1) ? ceil(count($stats) / 3) : 2;

						$smarty->assign("startYear", $startYear);
                        $smarty->assign('statCount', count($stats));
                        $smarty->assign('hash', $inputFilter->createHash());
                        $smarty->assign('positions', $positions);
                        $smarty->assign('modder', $modder);
                        $smarty->assign("title", 'Player Info');

                        $smarty->assign('stats', $stats);

						break;
				}

                if(!isset($_SESSION['postSport']) || $_SESSION['postSport'] == 0 || $_SESSION['postSport'] == '') {
                    $videoBLL = new VideoBLL();

                    $search = new SearchFilter();

                    $search->setSort('name', 'uploaded_date');
                    $search->setSort('method', 'videos');
                    $search->setSort('order', 'DESC');
                    $search->setWhere('method', 'videos');
                    $search->setWhere('player_id', $user->getId());

                    $search->limit = 1;
                    $search->page = 1;

                    if(!isset($_SESSION['last_video']) || (int)$_SESSION['last_video'] <= 0) {
                        $search->setWhere('player_id', $user->getId());
                    } else {
                        $search->setWhere('id', $_SESSION['last_video']);
                    }

                    try {
                        $video = $videoBLL->search($search);

                        $sportId = $video[0]->getSport()->getId();

                        $smarty->assign('video', $video[0]);
                    } catch(Exception $e) {
                        $sportId = 8;
                    }
                }

				$smarty->assign('gradeLevels', $controller->configuration->gradeLevels);
				$smarty->assign('file', $template);
                $smarty->assign('postSport', $sportId);
                $smarty->assign('user', $userBLL->getUser());

				$smarty->display("home.tpl");
			}
			break;

		case UserMethods::$PAYMENT: // http://www.tapeplay.com/user/payment/
            if(!$userBLL->getUser()) {
                header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
            }

			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
				// TODO: Process payment & send to confirm or show error

				// defaulting success to "true"
				$success = true;
				if ($success)
				{
					// update status to most recently completed step
					$userBLL->updateStatus(\AccountStatusEnum::$COMPLETE);

					// payment was successful
					Util::setHeader("/user/confirm/");
				}
				else
				{
					// payment failed, return to payment template
					$smarty->assign("file", "user/payment/payment.tpl");
					$smarty->display("home.tpl");
				}
			}
			else
			{
				// newly-loaded page - load payment template
				$smarty->assign("file", "user/payment/payment.tpl");
                $smarty->assign("title", 'Payment Info');

				$smarty->display("home.tpl");
			}
			break;

		case UserMethods::$CONFIRM: // http://www.tapeplay.com/user/confirm/
            if(!$userBLL->getUser()) {
                header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
            }

			if ($posted && (!isset($post['chosenSport']) || $post['chosenSport'] == ''))
			{
				// get template based on button selected
				$url = "account/welcome/";

				if (isset($_POST["yourAccount"]))
					$url = "account/welcome/";
				else if (isset($_POST["searchPlayers"]))
					$url = "video/search/";

				Util::setHeader($url);
			}
			else
			{
				// load up the confirmation page
				$smarty->assign("file", "user/confirm/confirm.tpl");
                $smarty->assign("title", 'Confirm');

				$smarty->display("home.tpl");
			}

			break;

        case UserMethods::$LOGOUT:
            if(!$userBLL->getUser()) {
                header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
            }

            $userBLL->logout();

            Util::setHeader($baseURL);

            break;

		default: // just redirect to login
			$smarty->assign("file", "user/login/login.tpl");
			$smarty->display("home.tpl");
			break;
	}
}
else
{
	/**
	 * If method isn't set, do a default action;
	 * I think that the best will be a basic view all.
	 */
	$smarty->assign('file', 'user/login/login.tpl');
	$smarty->display('home.tpl');
}