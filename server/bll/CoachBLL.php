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
class CoachBLL extends BaseBLL
{

	function __construct()
	{
		$this->dal = new CoachDAO();
	}


	//////////////////////////////////////////////////////////
	// Public Methods (API)
	//////////////////////////////////////////////////////////

	/**
	 * Retrieves the coach object based on coach id sent.
	 * @param $id int The ID of the coach that we want to grab.
	 * @return Coach The coach that matches the ID.
	 */
	public function get($id)
	{
		return $this->dal->get($id);
	}

	/**
	 * Inserts coach information into the database.
	 * @param Coach $coach  The coach that we want to insert
	 * @return Coach The completed coach.
	 */
	public function insert(Coach $coach)
	{
		return $this->dal->insert($coach);
	}

	/**
	 * Updates the coach.
	 * @param Coach $coach The coach that needs to be updated.
	 * @return int The number of rows affected (should be 1).
	 */
	public function update(Coach $coach)
	{
		return $this->dal->update($coach);
	}

}
