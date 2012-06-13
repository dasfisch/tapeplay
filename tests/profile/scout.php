<?php

require_once ("bll/UserBLL.php");
require_once ("enum/RecruitingLevelEnum.php");

use tapeplay\server\bll\ScoutBLL;
use tapeplay\server\model\Scout;

$bll = new ScoutBLL();

print "Inserting new scout...<br/>";

$scout = new Scout();
$scout->setOrganization("ESPN Recruiting Services");
$scout->setRecrutingLevel(RecruitingLevelEnum::$PROFESSIONAL);
$scout->setTitle("Master Recruiter");
$scout->setUserId(2);

$id = $bll->create($scout);
echo "Scout was inserted.  ID is " . $id;