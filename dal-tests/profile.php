<?php

require_once ("bll/ProfileBLL.php");
require_once ("enum/AccountTypeEnum.php");

use tapeplay\server\bll\ProfileBLL;
use tapeplay\server\model\User;
use tapeplay\server\model\UserSummary;

$bll = new ProfileBLL();

$user = new User();

print "Inserting new user...<br/>";

$user->setId(-1);
$user->setFirstName("Michael");
$user->setLastName("Jordan");
$user->setEmail("airness@mj.com");
$user->setPassword("HASH GOES HERE");
$user->setZipcode("60601");
$user->setGender("M");
$user->setBirthDate(1225886400);
$user->setOrganization("Chicago Bulls");
$user->setTitle("Basketball Superstar");
$user->setLastLogin(1225886400);
$user->setAccountType(AccountTypeEnum::$PLAYER);

$id = $bll->createUser($user);

echo "User was inserted.  ID is " . $id;