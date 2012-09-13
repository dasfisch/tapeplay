<?php

namespace tapeplay\server\bll;

require_once("dal/CoachDAO.php");
require_once("bll/BaseBLL.php");
require_once("model/Coach.php");

use tapeplay\server\dal\CoachDAO;
use tapeplay\server\model\Coach;

/**
 * Manages all logic associate with a Coach.
 */
class PositionBLL extends BaseBLL
{

	function __construct()
	{
		$this->dal = new PositionDAO();
	}


	//////////////////////////////////////////////////////////
	// Public Methods (API)
	//////////////////////////////////////////////////////////

	/**
	 * Retrieves the coach object based on coach id sent.
	 * @param $id int The ID of the coach that we want to grab.
	 * @return Coach The coach that matches the ID.
	 */
	public function getPositionsBySport($sportid)
	{
		return $this->dal->get($sportId);
	}
}
