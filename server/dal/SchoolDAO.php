<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/School.php");

use tapeplay\server\model\School;

/**
 * Manages all db access for anything sport-related
 */
class SchoolDAO extends BaseDOA
{
	/**
	 * @param $partial string The query that the use has entered so far.
	 * @return array The list of schools that match the partial query.
	 */
	public function getSchoolsByName($partial)
	{

		$this->sql = "SELECT TOP 10 * FROM schools WHERE name LIKE '%:partial%'";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":partial", $partial, \PDO::PARAM_STR);

		$this->prep->execute();

		$schoolList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($schoolList, School::create($row));
		}

		return $schoolList;
	}
}