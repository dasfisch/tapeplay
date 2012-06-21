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

	public function insert(Coach $coach)
	{
		$this->sql = "INSERT INTO coaches " .
				"(school_id, school_position, collegiate_level, association, user_id)" .
				" VALUES " .
				"(:schoolId, :schoolPosition, :collegiateLevel, :association, :userId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":schoolId", $coach->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":schoolPosition", $coach->getSchoolPosition(), \PDO::PARAM_INT);
		$this->prep->bindValue(":collegiateLevel", $coach->getCollegiateLevel(), \PDO::PARAM_INT);
		$this->prep->bindValue(":association", $coach->getAssociation(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $coach->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		// return the scout with his id
		$coach->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);
	}

	/**
	 * @param \tapeplay\server\model\Coach $coach
	 * @return int The number of rows affected.
	 */
	public function update(Coach $coach)
	{
		try
		{
			$this->sql = "UPDATE coaches SET " .
					" school_id = :schoolId" .
					" school_position = :schoolPosition" .
					" collegiate_level = :collegiateLevel" .
					" association = :association" .
					" WHERE id = :id";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $coach->getId(), \PDO::PARAM_INT);
			$this->prep->bindValue(":schoolId", $coach->getSchool()->getId(), \PDO::PARAM_INT);
			$this->prep->bindValue(":schoolPosition", $coach->getSchoolPosition(), \PDO::PARAM_INT);
			$this->prep->bindValue(":collegiateLevel", $coach->getCollegiateLevel(), \PDO::PARAM_INT);
			$this->prep->bindValue(":association", $coach->getAssociation(), \PDO::PARAM_INT);

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
