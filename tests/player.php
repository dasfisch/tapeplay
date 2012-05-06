<?php

require_once ("bll/PlayerBLL.php");
require_once ("model/School.php");

use tapeplay\server\bll\PlayerBLL;
use tapeplay\server\model\Player;
use tapeplay\server\model\School;

$bll = new PlayerBLL();

$school = new School();
$school->setId(1);
$school->setName("North Carolina");

$player = new Player();
$player->setNumber(23);
$player->setGuardianSignup(1);
$player->setSchool($school);
$player->setHeight(15);
$player->setGradeLevel(10);
$player->setVideoAccess(1);

$userID = 1;

$bll->insert($player, $userID);

?>


