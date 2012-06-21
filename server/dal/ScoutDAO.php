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
	/**
	 * @param $id int The id of the scout to retrieve.
	 * @return null|\tapeplay\server\model\Scout The scout who has incoming id.
	 */
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

	public function insert(Scout $scout)
	{
		try
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
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		// return the scout with his id
		$scout->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);

		return $scout;
	}

	/**
	 * @param \tapeplay\server\model\Scout $scout The scout that needs updated.
	 * @return int The number of rows affected.
	 */
	public function update(Scout $scout)
	{
		try
		{
			$this->sql = "UPDATE scouts SET " .
					" organization = :organization" .
					" title = :title" .
					" recruiting_level = :recruitingLevel" .
					" WHERE id = :id";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $scout->getId(), \PDO::PARAM_INT);
			$this->prep->bindValue(":organization", $scout->getOrganization(), \PDO::PARAM_STR);
			$this->prep->bindValue(":title", $scout->getTitle(), \PDO::PARAM_STR);
			$this->prep->bindValue(":recruitingLevel", $scout->getRecrutingLevel(), \PDO::PARAM_INT);

			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return 0;
		}

		return $this->prep->rowCount();
	}
}
