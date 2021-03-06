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
        if(strlen($partial) === 1) {
		    $this->sql = "SELECT * FROM schools WHERE name REGEXP :partial LIMIT 0,10";

            $this->prep = $this->dbh->prepare($this->sql);
            $this->prep->bindValue(":partial", '^'.$partial.'', \PDO::PARAM_STR);
        } else {
            $this->sql = "SELECT * FROM schools WHERE name LIKE :partial LIMIT 0,10";

            $this->prep = $this->dbh->prepare($this->sql);
            $this->prep->bindValue(":partial", '%'.$partial.'%', \PDO::PARAM_STR);
        }

		$this->prep->execute();

		$schoolList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($schoolList, School::create($row));
		}

		return $schoolList;
	}

    public function getSchoolById($schoolId) {
        $this->sql = "SELECT * FROM schools WHERE id=:id LIMIT 0,10";

        $this->prep = $this->dbh->prepare($this->sql);
        $this->prep->bindValue(":id", $schoolId, \PDO::PARAM_STR);

        $this->prep->execute();

        $schoolList = array();
        while ($row = $this->prep->fetch())
        {
            array_push($schoolList, School::create($row));
        }

        return $schoolList;
    }
}