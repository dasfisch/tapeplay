<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Sport.php");

use tapeplay\server\model\Sport;
use tapeplay\server\model\SearchFilter;

/**
 * Manages all db access for anything sport-related
 */
class SportDAO extends BaseDOA
{

	/**
	 * Fetches the sport details
	 * @param $id The id of the sport
	 */
	function get(SearchFilter $search)
	{
        $where = $this->_setWhere($search);

		$this->sql = "SELECT
		                    *
                        FROM
                            sports"
                        .$where;

		$this->prep = $this->dbh->prepare($this->sql);
		//$this->prep->bindValue(":id", $id, \PDO::PARAM_INT); //make sure this works like where maker
		$this->prep->execute();

        while($value = $this->prep->fetch()) {
            $sports[] = Sport::create($value);
        }

        return $sports;
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