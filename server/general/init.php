<?php

class init
{
	public static function init(Smarty $smarty)
	{
		$smarty->setTemplateDir("./templates");
		$smarty->setConfigDir("./templates/config");
		$smarty->setCacheDir("./templates/cache");
		$smarty->setCompileDir("./templates/compile");
	}

}