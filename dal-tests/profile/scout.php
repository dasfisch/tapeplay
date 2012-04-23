<?php

require_once ("bll/ProfileBLL.php");
require_once ("enum/RecruitingLevelEnum.php");

use tapeplay\server\bll\ProfileBLL;
use tapeplay\server\model\Scout;

$bll = new ProfileBLL();

print "Inserting new scout...<br/>";

$scout = new Scout();
$scout->setOrganization("ESPN Recruiting Services");
$scout->setRecrutingLevel(RecruitingLevelEnum::$PROFESSIONAL);
$scout->setTitle("Master Recruiter");
$scout->setUserId(2);

$id = $bll->createScout($scout);
echo "Scout was inserted.  ID is " . $id;