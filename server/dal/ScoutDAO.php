<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Scout.php");

use tapeplay\server\model\Scout;

/**
 * Manages all db access for anything user-related.
 */
class ScoutDAO extends BaseDOA
{

	public function createScout(Scout $scout)
	{
		$this->sql = "INSERT INTO scouts " .
				"(organization, title, recruiting_level, user_id)" .
				" VALUES " .
				"(:organization, :title, :recruitingLevel, :userId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":organization", $scout->getOrganization(), \PDO::PARAM_STR);
		$this->prep->bindValue(":title", $scout->getTitle(), \PDO::PARAM_STR);
		$this->prep->bindValue(":recruitingLevel", $scout->getRecrutingLevel(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $scout->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		// return the scout with his id
		$scout->setId( ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);

		return $scout;
	}
}
