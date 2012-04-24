<?php

require_once ("bll/PlayerBLL.php");

use tapeplay\server\bll\PlayerBLL;
use tapeplay\server\model\Player;

$bll = new PlayerBLL();

$player = new Player();
$player->setNumber(23);
$player->setGuardianSignup(1);
$player->setSchoolName("North Carolina");
$player->setHeight(15);
$player->setGradeLevel(10);
$player->setVideoAccess(1);

$userID = 999;

$bll->insert($player, $userID);

?>


