<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");

use tapeplay\server\model\Player;
use tapeplay\server\model\SearchFilter;

require_once "model/Player.php";
/**
 * Contains all database access for managing a player.
 */
class PlayerDAO extends BaseDOA
{
	public function get($id)
	{
		try
		{
			$this->sql = "SELECT
                                users.*, players.*, schools.*
                            FROM
                                users users
                            JOIN
                                players players
                                    ON
                                        players.user_id=users.id
                            JOIN
                                schools schools
                                    ON
                                        schools.id=players.school_id
                            WHERE
                                users.id=:id";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return Player::create($this->prep->fetch());
	}

	/**
	 * Inserts player to get player id.  Only links user id.
	 * @param $userId int
	 * @return int The ID of the user that as created.
	 */
	public function insert($userId)
	{
		$this->sql = "INSERT INTO players " .
				"(user_id)" .
				" VALUES " .
				"(:userId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);

		$this->prep->execute();

		// return the player with his id
		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
	}

	function update(Player $player)
	{
		$this->sql = "UPDATE players SET " .
				" number = :number, " .
				" height = :height, " .
				" grade_level = :grade_level, " .
				" video_access = :video_access, " .
				" position= :position, " .
				" weight = :weight, " .
				" coach_name = :coachName, " .
				" graduation_month = :graduationMonth, " .
				" graduation_year = :graduationYear, " .
				" school_id = :schoolId, " .
				" sport_id = :sportId " .
				" WHERE id = :id";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":id", $player->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":grade_level", $player->getGradeLevel(), \PDO::PARAM_STR);
		$this->prep->bindValue(":video_access", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":position", $player->getPosition(), \PDO::PARAM_STR);
		$this->prep->bindValue(":weight", $player->getWeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":coachName", $player->getCoachName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":graduationMonth", $player->getGraduationMonth(), \PDO::PARAM_INT);
		$this->prep->bindValue(":graduationYear", $player->getGraduationYear(), \PDO::PARAM_INT);
		$this->prep->bindValue(":schoolId", $player->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":sportId", $player->getSport()->getId(), \PDO::PARAM_INT);

		$this->prep->execute();

		return $this->prep->rowCount() > 0;
	}

	/**
	 * @param SearchFilter $filter
	 * @return array An array of players who match the search query.
	 */
	function getPlayers(SearchFilter $filter)
	{
		try
		{
			$this->sql = "SELECT * FROM players p INNER JOIN users u ON p.user_id = u.id LEFT JOIN schools s ON p.school_id = s.id";
			$this->prep = $this->dbh->prepare($this->sql);
			//$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		$playerList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($playerList, Player::create($row));
		}

		return $playerList;
	}


}