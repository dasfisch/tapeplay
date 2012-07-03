<?php

require_once ("enum/controllers/AccountMethods.php");
require_once ("enum/AccountTypeEnum.php");

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

// check for account type in session
$accountType = (isset($_SESSION["accountType"]) ? $_SESSION["accountType"] : "");

// setup form postback url
$baseURL = $_SERVER['REQUEST_URI'];

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

				switch ($accountType)
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

				// now display the template based on above selection
				$smarty->assign("baseURL", $baseURL);
				$smarty->assign('file', $template);
				$smarty->display("index.tpl");
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