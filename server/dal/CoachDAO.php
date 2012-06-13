<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Coach.php");

use tapeplay\server\model\Coach;

/**
 * Manages all db access for anything user-related.
 */
class CoachDAO extends BaseDOA
{

	public function get($id)
	{
		try
		{
			$this->sql = "SELECT * FROM coaches c INNER JOIN users u ON c.user_id = u.id LEFT JOIN schools s ON c.school_id = s.id WHERE c.id = :id";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return Coach::create($this->prep->fetch());
	}

	public function create(Coach $coach)
	{
		$this->sql = "INSERT INTO coaches " .
				"(school_id, school_position, user_id)" .
				" VALUES " .
				"(:schoolId, :schoolPosition, :userId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":schoolId", $coach->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":schoolPosition", $coach->getSchoolPosition(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $coach->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		// return the scout with his id
		$coach->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);
	}
}
