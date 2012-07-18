<?php

//all include, globals (not opposed to not using globals)
require_once("utility/Util.php");
require_once("enum/PandaVerbTypes.php");
require_once("enum/controllers/UserMethods.php");
require_once("enum/AccountTypeEnum.php");
require_once("bll/Panda.php");
require_once("bll/UserBLL.php");
require_once("bll/VideoBLL.php");
require_once("bll/PlayerBLL.php");
require_once("model/Video.php");
require_once("model/User.php");
require_once("model/Player.php");
require_once("model/Coach.php");
require_once("model/Scout.php");
require_once("model/VideoNote.php");
require_once("model/SearchFilter.php");
require_once("model/School.php");

use tapeplay\server\bll\Panda;
use tapeplay\server\bll\VideoBLL;
use tapeplay\server\bll\UserBLL;
use tapeplay\server\bll\PlayerBLL;
use tapeplay\server\model\User;
use tapeplay\server\model\Player;
use tapeplay\server\model\Coach;
use tapeplay\server\model\Scout;
use tapeplay\server\model\Video;
use tapeplay\server\model\School;

global $controller, $route, $smarty, $userBLL;


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

// setup form postback url
$baseURL = $_SERVER['REQUEST_URI'];

// check for method so we can see which page to load
if (isset($route->method))
{
	switch ($route->method)
	{
		case UserMethods::$LOGIN: // http://www.tapeplay.com/user/login/

			if ($posted)
			{
				if ($userBLL->authenticate($_POST["username"], $_POST["password"]))
				{
					// we are authenticated - grab user from db

					// check step that user is on to make sure they have completed login
					$status = $userBLL->getUser()->getStatus();
					$accountType = $userBLL->getAccountType();
					switch ($status)
					{
						case AccountStatusEnum::$STEP1: // need to transfer to step 2
							if ($accountType == AccountTypeEnum::$PLAYER)
							{
								Util::setHeader("user/upload/");
							}
							else if ($accountType == AccountTypeEnum::$COACH || $accountType == AccountTypeEnum::$SCOUT)
							{
								Util::setHeader("user/info/");
							}
							break;

						case AccountStatusEnum::$STEP2:
							print "step2";
							if ($accountType == AccountTypeEnum::$PLAYER)
							{
								print "step 2";
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
					// authentication failed
					$smarty->assign("file", "user/login/login.tpl");
					$smarty->display("home.tpl");
				}
			}
			else
			{
				if (!isset($_SESSION["userId"]))
				{
					$smarty->assign("file", "user/login/login.tpl");
					$smarty->display("home.tpl");
				}
				else
				{
					// redirect to another page (home page)
					Util::setHeader("index.php");
				}
			}
			break;

		case UserMethods::$SIGNUP: // http://www.tapeplay.com/user/signup/
			if ($posted)
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
				$smarty->display("home.tpl");
			}
			break;

		case UserMethods::$PERSONAL: // http://www.tapeplay.com/user/personal/
			// check for the need to process the incoming information
			if ($posted)
			{
				// create hash
				$hash = $userBLL->createHash($_POST["email"], $_POST["password"]);
				// create user object based on data entered
				$user = new User();
				$user->setAccountType($userBLL->getAccountType());
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
					$userBLL->updateStatus(\AccountStatusEnum::$STEP1);

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
							Util::setHeader("user/signup/");
							break;
					}
				}
				else
				{
					// user was not created.  show current page again.
					$smarty->assign('file', "user/personal/");
					$smarty->display("home.tpl");
					//
				}
			}
			else
			{
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

				$thisYear = date('Y', strtotime('now'));
				$thirteenYearsBeforeNow = $thisYear - 13;
				$fiftyYearsBeforeNow = $thisYear - 50;

				$birthYears = "";
				for ($i = $thirteenYearsBeforeNow; $i > $fiftyYearsBeforeNow; $i--)
					$birthYears .= "<li>" . $i . "</li>";

				// now display the template based on above selection
				$smarty->assign("birthYears", $birthYears);
				$smarty->assign('file', $template);
				$smarty->display("home.tpl");
			}

			break;

		case UserMethods::$UPLOAD: // http://www.tapeplay.com/user/upload/

			// need instance of Panda
			$panda = new Panda();

			if ($posted)
			{
				// TODO: Process uploaded video
				$video = new Video();

				$video->setPandaId($_POST["panda_video_id"]); // panda id
				$video->setTitle($_POST["title"]);
				$video->setRecordedMonth($_POST["videoMonth"]);
				$video->setRecordedYear($_POST["videoYear"]);
				$video->setUploadDate(time()); // default to NOW

				$videoBLL = new VideoBLL();
				$videoId = $videoBLL->insert($video, $userBLL->getUser()->getId());

				if ($videoId > 0)
				{
					// update status
					$userBLL->updateStatus(\AccountStatusEnum::$STEP2);

					// insert succeeded - go to info page
					Util::setHeader("user/info/");
				}
			}
			else
			{
				// get json encode of panda access details
				$pandaAccessDetails = json_encode(@$panda->signed_params(PandaVerbTypes::$POST, "/videos.json", array()));

				// get video years
				$videoYears = "";
				for ($i = date('Y', strtotime('now')); $i > 1980; $i--)
					$videoYears .= "<li>" . $i . "</li>";

				// send user to upload page
				$smarty->assign("pandaAccessDetails", $pandaAccessDetails);
				$smarty->assign("APIURL", $panda->getAPIURL());
				$smarty->assign("videoYears", $videoYears);
				$smarty->assign("file", "user/upload/upload.tpl");
				$smarty->display("home.tpl");
			}

			break;

		case UserMethods::$INFO: // http://www.tapeplay.com/user/info/

			// check for the need to process the incoming information
			if ($posted)
			{

				switch ($userBLL->getAccountType())
				{
					case AccountTypeEnum::$COACH:
						// TODO: Process coach information

						// update status to most recently completed step
						$userBLL->updateStatus(\AccountStatusEnum::$STEP2);

						Util::setHeader("user/payment/");
						break;
					case AccountTypeEnum::$SCOUT:
						// TODO: Process scout information

						// update status to most recently completed step
						$userBLL->updateStatus(\AccountStatusEnum::$STEP2);

						// send to payment page
						Util::setHeader("user/payment/");
						break;
					case AccountTypeEnum::$PLAYER:

						// get player basics and add
						$userBLL->getUser()->setNumber($_POST["number"]);
						$userBLL->getUser()->setGradeLevel($_POST["gradeLevel"]);
						$userBLL->getUser()->setPosition("SG");
						$userBLL->getUser()->setHeight(55);
						$userBLL->getUser()->setWeight($_POST["weight"]);
						$userBLL->getUser()->setCoachName($_POST["headCoachName"]);
						$userBLL->getUser()->setGraduationMonth($_POST["graduationMonth"]);
						$userBLL->getUser()->setGraduationYear($_POST["graduationYear"]);

						// create school and assign to player
						$school = new School();
						$school->setId($_POST["schoolId"]);
						$userBLL->getUser()->setSchool($school);

						$playerBLL = new PlayerBLL();

						if ($playerBLL->update($userBLL->getUser()))
						{
							// update status to most recently completed step
							$userBLL->updateStatus(\AccountStatusEnum::$STEP3);

							// this is the last step in the player signup process.  send to welcome page
							Util::setHeader("account/welcome/");
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

						$gradYears = "";
						$thisYear = date('Y', strtotime('now'));
						$fiveYearsFromNow = $thisYear + 5;

						for ($i = $thisYear; $i <= $fiveYearsFromNow; $i++)
							$gradYears .= "<li>" . $i . "</li>";

						$smarty->assign("graduationYears", $gradYears);
						break;
				}

				$smarty->assign('file', $template);
				$smarty->display("home.tpl");
			}
			break;

		case UserMethods::$PAYMENT: // http://www.tapeplay.com/user/payment/

			if ($posted)
			{
				// TODO: Process payment & send to confirm or show error

				// defaulting success to "true"
				$success = true;
				if ($success)
				{
					// update status to most recently completed step
					$userBLL->updateStatus(\AccountStatusEnum::$STEP3);

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
				$smarty->display("home.tpl");
			}
			break;

		case UserMethods::$CONFIRM: // http://www.tapeplay.com/user/confirm/

			if ($posted)
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
				$smarty->display("home.tpl");
			}

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