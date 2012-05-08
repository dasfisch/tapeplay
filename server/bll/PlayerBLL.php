<?php

namespace tapeplay\server\bll;

require_once ("dal/PlayerDAO.php");
require_once ("bll/BaseBLL.php");
require_once ("model/Player.php");

use tapeplay\server\dal\PlayerDAO;
use tapeplay\server\model\Player;

class PlayerBLL extends BaseBLL
{
	function __construct()
	{
		$this->dal = new PlayerDAO();
	}

	public function insert(Player $player, $userID)
	{
		return $this->dal->insert($player, $userID);
	}

	public function update(Player $player)
	{
		$this->dal->update($player);
	}
}

?>