<?php

//all include, globals (not opposed to not using globals)
require_once("bll/VideoBLL.php");
require_once("model/Video.php");
require_once("model/VideoNote.php");
require_once("model/SearchFilter.php");

use tapeplay\server\bll\UserBLL;

$userBLL = new UserBLL();

$smarty = new Smarty();
$smarty->setTemplateDir("./templates");
$smarty->setConfigDir("./templates/config");
$smarty->setCacheDir("./templates/cache");
$smarty->setCompileDir("./templates/compile");

/**
 * This will be the catcher; part of the rewrite rules;
 *
 * The url will be like this:
 *      http://www.tapeplay.com/__CLASS__/__METHOD__/__ID__?params....
 *          eg: http://www.tapeplay.com/videos/view/23
 *              http://www.tapeplay.com/videos/view/23?utm=google.com&etc=soforth
 *              http://www.tapeplay.com/videos/notes
 *
 */
if (isset($_GET["method"]))
{
	switch ($_GET["method"])
	{
		case 'signgup': // http://www.tapeplay.com/signup/player/step1

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