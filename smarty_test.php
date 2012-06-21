<?php

// load Smarty library
require('Smarty.class.php');
require_once ("bll/VideoBLL.php");
require_once ("bll/PlayerBLL.php");

use tapeplay\server\bll\PlayerBLL;
use tapeplay\server\bll\VideoBLL;
use tapeplay\server\model\Video;
use tapeplay\server\model\Player;

// initialize Smarty
$smarty = new Smarty();
$smarty->setTemplateDir("./templates");
$smarty->setConfigDir("./templates/config");
$smarty->setCacheDir("./templates/cache");
$smarty->setCompileDir("./templates/compile");

// grab user
$playerBLL = new PlayerBLL();
$player = new Player();
$player = $playerBLL->get(1);

// grab video
$bll = new VideoBLL();
$video = new Video();

$video = $bll->get("ba5dc5411fa485fa43056f4f3e18d600");

$smarty->assignByRef("player", $player);
$smarty->assign("player", $player);

$smarty->assignByRef("video", $video);
$smarty->assign("video", $video);

$smarty->display("video.php");

?>