<?php


$smarty = new Smarty();
$smarty->setTemplateDir("./templates");
$smarty->setConfigDir("./templates/config");
$smarty->setCacheDir("./templates/cache");
$smarty->setCompileDir("./templates/compile");


if (isset($_GET["method"]))
{
	switch ($_GET["method"])
	{
		case 'invite': // http://www.tapeplay.com/invite/confirm

	}
}
else
{
	/**
	 * If method isn't set, do a default action;
	 * I think that the best will be a basic view all.
	 */
}