<?php

require_once("bll/UserBLL.php");

use tapeplay\server\bll\UserBLL;

$smarty = new Smarty();
$smarty->setTemplateDir("./templates");
$smarty->setConfigDir("./templates/config");
$smarty->setCacheDir("./templates/cache");
$smarty->setCompileDir("./templates/compile");


if (isset($_GET["method"]))
{
	switch ($_GET["method"])
	{
		case "forgot": // http://www.tapeplay.com/login/forgot

			$smarty->display("passwordreset.php");
			break;

		case "reset": // http://www.tapeplay.com/login/reset

			$bll = new UserBLL();
			$smarty->assign("success", $bll->resetPassword(1));
			$smarty->display("passwordconf.php");
			break;
		default: // http://www.tapeplay.com/login/
			$smarty->display("login.php");
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