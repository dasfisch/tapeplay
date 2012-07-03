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

	public function insert(Player $player)
	{
		$this->sql = "INSERT INTO players " .
				"(number, height, grade_level, video_access, position, user_id, school_id)" .
				" VALUES " .
				"(:number, :height, :gradeLevel, :videoAccess, :position, :userId, :schoolId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":gradeLevel", $player->getGradeLevel(), \PDO::PARAM_INT);
		$this->prep->bindValue(":videoAccess", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":position", $player->getPosition(), \PDO::PARAM_INT);
		$this->prep->bindValue(":schoolId", $player->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $player->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		// return the player with his id
		$player->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);
	}

	function update(Player $player)
	{
		$this->sql = "UPDATE players SET " .
				"number = :number, guardian_signup = :guardian_signup, school_id = :school_id, height = :height, grade_level = :grade_level, video_access = :video_access, user_id = :user_id" .
				" WHERE id = :id";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":id", $player->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":school_id", $player->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":grade_level", $player->getGradeLevel(), \PDO::PARAM_STR);
		$this->prep->bindValue(":video_access", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":user_id", $player->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
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