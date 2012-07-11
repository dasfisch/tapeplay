<?php

namespace tapeplay\server\bll;

require_once ("dal/PlayerDAO.php");
require_once ("bll/BaseBLL.php");
require_once ("bll/StatsBLL.php");
require_once ("model/Player.php");

use tapeplay\server\dal\PlayerDAO;
use tapeplay\server\bll\StatsBLL;
use tapeplay\server\model\Player;

class PlayerBLL extends BaseBLL
{
	function __construct()
	{
		$this->dal = new PlayerDAO();
	}

	public function get($id)
	{
        $statsBLL = new StatsBLL();
        $stats = $statsBLL->getPlayerStats($id);

		$player = $this->dal->get($id);

        $player->setStats((array)$stats);

        return $player;
	}

	/**
	 * Creates a player object that is linked to the user ID sent.
	 * @param $userID int The ID of the user associated with this player
	 * @return int The ID of the inserted player
	 */
	public function insert($userID)
	{
		return $this->dal->insert($userID);
	}

	public function update(Player $player)
	{
		return $this->dal->update($player);
	}
}