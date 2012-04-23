<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Coach.php");
require_once("model/Player.php");
require_once("model/Scout.php");
require_once("model/User.php");
require_once("model/UserSummary.php");

use tapeplay\server\model\User;
use tapeplay\server\model\Coach;
use tapeplay\server\model\Player;
use tapeplay\server\model\Scout;

/**
 * Manages all db access for anything user-related.
 */
class ProfileDAO extends BaseDOA
{

	/**
	 * Fetches the base information for a user.
	 * @param $id The id of the user
	 */
	public function getSummary($id)
	{

	}

	/**
	 * Fetches full user.
	 * @param $id The id of the user
	 */
	public function getFull($id)
	{

	}

	/**
	 * Inserts the base user information.
	 * @param \tapeplay\server\model\User $user Inserts passed user into database
	 * @return int The ID that was assigned to this user in the db.
	 */
	public function createUser(User $user)
	{
		$this->sql = "INSERT INTO users " .
				"(first_name, last_name, email, hash, zipcode, gender, birthdate, last_login, account_type)" .
				" VALUES " .
				"(:firstName, :lastName, :email, :hash, :zipcode, :gender, :birthDate, :lastLogin, :accountType)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":firstName", $user->getFirstName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":lastName", $user->getLastName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
		$this->prep->bindValue(":hash", $user->getHash(), \PDO::PARAM_STR);
		$this->prep->bindValue(":zipcode", $user->getZipcode(), \PDO::PARAM_STR);
		$this->prep->bindValue(":gender", $user->getGender(), \PDO::PARAM_STR);
		$this->prep->bindValue(":birthDate", $user->getBirthDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":lastLogin", $user->getLastLogin(), \PDO::PARAM_INT);
		$this->prep->bindValue(":accountType", $user->getAccountType(), \PDO::PARAM_INT);

		$this->prep->execute();

		// return the user's id
		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
	}

	/**
	 * Updates the database with changes from the passed user.
	 * @param \tapeplay\server\model\User $user The user to be modified
	 */
	public function update(User $user)
	{
		$this->sql = "UPDATE users " .
				" SET " .
				"(first_name:firstName, :lastName, :email, :password, :zipcode, :gender, :birthDate, :lastLogin, :accountType)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":firstName", $user->getFirstName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":lastName", $user->getLastName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
		$this->prep->bindValue(":password", $user->getHash(), \PDO::PARAM_STR);
		$this->prep->bindValue(":zipcode", $user->getZipcode(), \PDO::PARAM_STR);
		$this->prep->bindValue(":gender", $user->getGender(), \PDO::PARAM_STR);
		$this->prep->bindValue(":birthDate", $user->getBirthDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":lastLogin", $user->getLastLogin(), \PDO::PARAM_INT);
		$this->prep->bindValue(":accountType", $user->getAccountType(), \PDO::PARAM_INT);

		$this->prep->execute();
	}

	/**
	 * Removes the user and associated entities from the database.
	 * @param $id The ID of the user to be deleted
	 */
	public function remove($id)
	{

	}

	/**
	 * Uses the password to get an MD5 password hash to compare to the hashes in the database.
	 * @param $pass The password of the user.
	 * @return The id of the user that is authenticated.
	 */
	public function authenticate($hash)
	{
		$user = new User();

		$this->sql = "SELECT count(*) FROM users WHERE hash = :hash";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->setFetchMode(\PDO::FETCH_INTO, $user);
		$this->prep->bindValue(":hash", $pass, \PDO::PARAM_STR);
		$this->prep->execute();

		return $user;
	}

	/**
	 * Checks the database for a match.
	 * @param $email The email we need to check.
	 * @return True if email exists in db, false otherwise.
	 */
	public function isEmailValid($email)
	{
		$user = new User();

		$this->sql = "SELECT count(*) FROM users WHERE email = :email";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->setFetchMode(\PDO::FETCH_INTO, $user);
		$this->prep->bindValue(":email", $email, \PDO::PARAM_STR);
		$this->prep->execute();

		return ($this->prep->rowCount() > 0);
	}

	/**
	 * Deactivates the account
	 * @param $id
	 */
	public function deactivate($id)
	{

	}

	/**
	 * Returns the related users that this user can connect with.
	 * @param $id The id of the user.
	 * @return An array of tapeplay\server\model\UserSummary
	 */
	public function getRelatedUsers($id)
	{

	}


	//////////////////////////////////////////////////////////
	// Scout Methods
	//////////////////////////////////////////////////////////

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

		// return the user's id
		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
	}


	//////////////////////////////////////////////////////////
	// Coach Methods
	//////////////////////////////////////////////////////////

	public function createCoach(Coach $coach)
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

		// return the user's id
		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
	}


	//////////////////////////////////////////////////////////
	// Coach Methods
	//////////////////////////////////////////////////////////

	public function createPlayer(Player $player)
	{
		$this->sql = "INSERT INTO players " .
				"(number, guardian_signup, height, grade_level, video_access, position, user_id, school_id)" .
				" VALUES " .
				"(:number, :guardianSignup, :height, :gradeLevel, :videoAccess, :position, :userId, :schoolId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":number", $player->getNumber(), \PDO::PARAM_INT);
		$this->prep->bindValue(":guardianSignup", $player->getGuardianSignup(), \PDO::PARAM_BOOL);
		$this->prep->bindValue(":height", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":gradeLevel", $player->getGradeLevel(), \PDO::PARAM_INT);
		$this->prep->bindValue(":videoAccess", $player->getVideoAccess(), \PDO::PARAM_INT);
		$this->prep->bindValue(":position", $player->getPosition(), \PDO::PARAM_INT);
		$this->prep->bindValue(":schoolId", $player->getSchool()->getId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $player->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		// return the user's id
		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
	}
}
