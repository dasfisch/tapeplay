<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Sport.php");

use tapeplay\server\model\Sport;

/**
 * Manages all db access for anything sport-related
 */
class SportDAO extends BaseDOA
{

	/**
	 * Fetches the sport details
	 * @param $id The id of the sport
	 */
	function get($id)
	{
		$this->sql = "SELECT * FROM sports WHERE id = :id";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
		$this->prep->execute();
	}

	/**
	 * Gets the active sports
	 */
	function getActive()
	{
		$this->sql = "SELECT * FROM sports WHERE active = 1";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->execute();
	}

	function getSportStats($id)
	{

	}
}