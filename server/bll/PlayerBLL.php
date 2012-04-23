<?php

namespace tapeplay\server\bll;

require_once ("dal/PlayerDAO.php");
require_once ("model/Player.php");

use tapeplay\server\dal\PlayerDAO;
use tapeplay\server\model\Player;

class PlayerBLL extends BaseBLL
{
	function __construct()
	{
		$this->dal = new PlayerDAO();
	}

	function insert(Player $player, $userID)
	{
		return $this->dal->insert($player, $userID);
	}

	function update(Player $player)
	{
		$this->dal->update($player);
	}
}

?>