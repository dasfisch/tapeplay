<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");

use tapeplay\server\model\Player;
use tapeplay\server\model\SearchFilter;

require "model/Player.php";
/**
 * Contains all database access for managing a player.
 */
class PlayerDAO extends BaseDOA
{
	function insert(Player $player, $userID)
	{
		$this->sql = "INSERT INTO players (number, guardian_signup, school_name, height, grade_level, video_access, user_id) VALUES (:number, :guardian_signup, :school_name, :height, :grade_level, :video_access, :user_id)";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":guardian_signup", $player->getGuardianSignup(), \PDO::PARAM_INT);
		$this->prep->bindValue(":school_name", $player->getSchoolName(), \PDO::PARAM_INT);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":grade_level", $player->getGradeLevel(), \PDO::PARAM_STR);
		$this->prep->bindValue(":video_access", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":user_id", $userID, \PDO::PARAM_INT);

		$this->prep->execute();

	}

	function update(Player $player)
	{
		$this->sql = "UPDATE players SET number = :number, guardian_signup = :guardian_signup, school_name = :school_name, height = :height, grade_level = :grade_level, video_access = :video_access, user_id = :user_id)";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":guardian_signup", $player->getGuardianSignup(), \PDO::PARAM_INT);
		$this->prep->bindValue(":school_name", $player->getSchoolName(), \PDO::PARAM_INT);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":grade_level", $player->getGradeLevel(), \PDO::PARAM_STR);
		$this->prep->bindValue(":video_access", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":user_id", $userID, \PDO::PARAM_INT);

		$this->prep->execute();
	}

	/**
	 * @param \tapeplay\server\model\SearchFilter $filter
	 * @return An array of players who match the search query.
	 */
	function getPlayers(SearchFilter $filter)
	{
		/*$this->sql = "SELECT * FROM players";
		$this->prep = $this->dbh->prepare()
		$this->prep->execute();*/
	}


}

?>