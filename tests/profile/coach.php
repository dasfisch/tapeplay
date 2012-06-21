<?php

require_once ("bll/UserBLL.php");
require_once ("enum/SchoolPositionEnum.php");

use tapeplay\server\bll\CoachBLL;
use tapeplay\server\model\Coach;
use tapeplay\server\model\School;

$bll = new CoachBLL();

print "Inserting new coach...<br/>";


$school = new School();
$school->setId(1);

$coach = new Coach();
$coach->setSchool($school);
$coach->setSchoolPosition(SchoolPositionEnum::$HEAD_COACH);
$coach->setUserId(1);

$id = $bll->update($coach);
echo "Coach was inserted.  ID is " . $id;