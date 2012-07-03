<?php

namespace tapeplay\server\bll;

require_once("dal/StatsDAO.php");
require_once("bll/BaseBLL.php");

use tapeplay\server\bll\BaseBLL;
use tapeplay\server\model\StatsDAO; //why the fuck is this coming from model???
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

	public function getStats($id)
	{
		return $this->dal->getFull($id);
	}

    public function getPlayerStats($playerId) {
        return $this->dal->getStatsByPlayer($playerId);
    }
}