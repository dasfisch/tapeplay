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

	/**
	 * @param $id int The id of the scout that is requested.
	 * @return Scout|null The requested scout object.
	 */
	public function get($id)
	{
		return $this->dal->get($id);
	}

	/**
	 * @param \tapeplay\server\model\Scout $scout The scout to insert
	 * @return \tapeplay\server\model\Scout|null The scout object with its new id.
	 */
	public function insert(Scout $scout)
	{
		return $this->dal->insert($scout);
	}

	/**
	 * Updates the scout.
	 * @param \tapeplay\server\model\Scout $scout The scout that needs to be updated.
	 * @return int The number of rows affected (should be 1).
	 */
	public function update(Scout $scout)
	{
		return $this->dal->update($scout);
	}

}

?>