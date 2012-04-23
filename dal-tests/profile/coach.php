<?php

require_once ("bll/ProfileBLL.php");
require_once ("enum/SchoolPositionEnum.php");

use tapeplay\server\bll\ProfileBLL;
use tapeplay\server\model\Coach;
use tapeplay\server\model\School;

$bll = new ProfileBLL();

print "Inserting new coach...<br/>";


$school = new School();
$school->setId(1);

$coach = new Coach();
$coach->setSchool($school);
$coach->setSchoolPosition(SchoolPositionEnum::$HEAD_COACH);
$coach->setUserId(1);

$id = $bll->createCoach($coach);
echo "Coach was inserted.  ID is " . $id;