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

	public function get($id)
	{
		try
		{
			$this->sql = "SELECT * FROM scouts s INNER JOIN users u ON s.user_id = u.id WHERE s.id = :id";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return Scout::create($this->prep->fetch());
	}

	public function create(Scout $scout)
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
		$scout->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);

		return $scout;
	}
}
