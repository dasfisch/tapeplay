<?php
namespace tapeplay\server\bll;

require_once("dal/StatsDAO.php");
require_once("bll/BaseBLL.php");

use tapeplay\server\bll\BaseBLL;
use tapeplay\server\dal\StatsDAO;
use tapeplay\server\model\Stat;

/**
 * Manages all logic associated with the user's profile.
 */
class StatsBLL extends BaseBLL
{
	private static $SALT = "We've done four already but now we're steady and then they went: One, two, three, four";

	function __construct()
	{
		$this->dal = new StatsDAO();
	}

	public function getStatsBySport($id)
	{
		return $this->dal->getStatsBySport($id);
	}

    public function getPlayerStats($playerId, $sport) {
        return $this->dal->getStatsByPlayer($playerId, $sport);
    }

    public function updatePlayerStat($stat, $playerId) {
        return $this->dal->updatePlayerStat($stat, $playerId);
    }
}
