<?php

require_once ("bll/UserBLL.php");
require_once ("enum/AccountTypeEnum.php");
require_once ("model/User.php");

use tapeplay\server\bll\UserBLL;
use tapeplay\server\model\User;
use tapeplay\server\model\UserSummary;

$bll = new UserBLL();

$user = new User();

print "Inserting new user...<br/>";

$user->setUserId(-1);
$user->setFirstName("Michael");
$user->setLastName("Jordan");
$user->setEmail("airness@mj.com");
$user->setHash("HASH GOES HERE");
$user->setZipcode("60601");
$user->setGender("M");
$user->setBirthDate(1225886400);
$user->setLastLogin(1225886400);
$user->setAccountType(AccountTypeEnum::$PLAYER);

$newlyCreatedUser = new User();
$newlyCreatedUser = $bll->createUser($user);

if ($newlyCreatedUser)
	echo "User was inserted. " . $newlyCreatedUser->getUserId() . " is the new ID for " . $newlyCreatedUser->getFirstName();
