<?php

namespace tapeplay\server\bll;

require_once("dal/ScoutDAO.php");
require_once("bll/BaseBLL.php");
require_once("model/Scout.php");

use tapeplay\server\dal\ScoutDAO;
use tapeplay\server\model\Scout;

/**
 * Manages all logic associated with a Scout.
 */
class ScoutBLL extends BaseBLL
{

	function __construct()
	{
		$this->dal = new ScoutDAO();
	}


	//////////////////////////////////////////////////////////
	// Public Methods (API)
	//////////////////////////////////////////////////////////

	public function get($id)
	{
		return $this->dal->get($id);
	}

	public function create(Scout $scout)
	{
		return $this->dal->create($scout);
	}

}

?>