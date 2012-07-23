<?php
use tapeplay\server\bll\SchoolBLL;
use tapeplay\server\bll\StatsBLL;
use tapeplay\server\bll\VideoBLL;

require_once ("enum/controllers/AccountMethods.php");
require_once ("enum/AccountTypeEnum.php");
require_once("bll/SchoolBLL.php");
require_once("bll/StatsBLL.php");
require_once("bll/VideoBLL.php");

global $controller, $inputFilter, $route, $smarty, $userBLL;


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

if(!$userBLL->getUser()) {
    header('Location:'.$controller->configuration->URLs['baseUrl'].'user/login/');
}

if (isset($route->method))
{
	switch ($route->method)
	{
		case AccountMethods::$WELCOME: // http://www.tapeplay.com/account/welcome

			if ($posted)
			{

			}
			else
			{
				// determine which page to load
				$template = "user/login";

                /**
                 * @TODO: On user creation, player does not get created due to lack of sport;
                 * make column null true.
                 */

				switch ($userBLL->getAccountType())
				{
					case AccountTypeEnum::$PLAYER:
						$template = "account/welcome/playerWelcome.tpl";
						break;

					case AccountTypeEnum::$COACH:
						$template = "account/welcome/coachWelcome.tpl";
						break;

					case AccountTypeEnum::$SCOUT:
						$template = "account/welcome/scoutWelcome.tpl";
						break;
				}

//                echo $template;exit;

                $user = $userBLL->getUser();

                $videoBll = new VideoBLL();
                $videos = $videoBll->getVideoSaves($user->getUserId());
                $videoCount = (isset($videos[0]->count) && (int)$videos[0]->count > 0) ? (int)$videos[0]->count : 0;

                $statsBll = new StatsBLL();
                $stats = $statsBll->getPlayerStats((int)$user->getId(), (int)$user->getSport()->getSportId());

				// now display the template based on above selection
                $smarty->assign('hash', $inputFilter->createHash());
				$smarty->assign("savedVideoNumber", $videoCount);
                $smarty->assign("savedVideos", $videos);
                $smarty->assign("stats", $stats);
                $smarty->assign("statCount", count($stats));
                $smarty->assign("modder", ceil(count($stats) / 3));
				$smarty->assign("user", $user);
				$smarty->assign('file', $template);

				$smarty->display("home.tpl");
			}

			break;

	}
}
else
{
	/**
	 * If method isn't set, do a default action;
	 * I think that the best will be a basic view all.
	 */
}
