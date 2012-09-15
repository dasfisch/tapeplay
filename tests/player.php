<?php

require_once ("bll/PlayerBLL.php");
require_once ("model/School.php");

use tapeplay\server\bll\PlayerBLL;
use tapeplay\server\model\Player;
use tapeplay\server\model\School;

$bll = new PlayerBLL();

$player = $bll->get(14);

print_r($player);


