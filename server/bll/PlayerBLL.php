<?php

namespace tapeplay\server\bll;

require_once ("dal/PlayerDAO.php");
require_once ("bll/BaseBLL.php");
require_once ("bll/PositionBLL.php");
require_once ("bll/StatsBLL.php");
require_once ("model/Player.php");

use tapeplay\server\dal\PlayerDAO;
use tapeplay\server\bll\StatsBLL;
use tapeplay\server\bll\PositionBLL;
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

		$player = new Player();
        $player = $this->dal->get($id);

        $stats = $statsBLL->getPlayerStats($id, (int)$player->getSport()->getSportId());

        $player->setStats((array)$stats);

		$positionBLL = new PositionBLL();
		$positions = $positionBLL->getPositionsByPlayer($player->getId());

		$player->getSport()->setPositions($positions);

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

    public function getPlayersByUserId($userId) {
        return $this->dal->getPlayersByUserId($userId);
    }

    public function getPlayersByPlayerId($userId) {
        return $this->dal->getPlayersByPlayerId($userId);
    }

    public function setStat($playerId, $statId, $statValue) {
        return $this->dal->insertPlayerStat($playerId, $statId, $statValue);
    }

    public function setPosition($playerId, $positionId) {
        return $this->dal->insertPlayerPosition($playerId, $positionId);
    }

    public function updatePositions($playerId, $positionId) {
        return $this->dal->insertPlayerPosition($playerId, $positionId);
    }

    public function deletePositions($playerId, $positionId) {
        return $this->dal->deletePlayerPosition($playerId, $positionId);
    }

    public function setMyVideoPrivacy($playerId, $privacy) {
        return $this->dal->setMyVideoPrivacy($playerId, $privacy);
    }

    public function getPlayerUserByPlayerAndSportId($playerId, $sportId) {
        return $this->dal->getPlayersByPlayerAndSportId($playerId, $sportId);
    }
}