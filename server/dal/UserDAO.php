<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/User.php");
require_once("model/UserSummary.php");

use tapeplay\server\model\User;

/**
 * Manages all db access for anything user-related.
 */
class UserDAO extends BaseDOA
{

	/**
	 * Fetches the base information for a user.
	 * @param $id The id of the user
	 */
	function getSummary($id)
	{

	}

	/**
	 * Fetches full user.
	 * @param $id The id of the user
	 */
	function getFull($id)
	{

	}

	/**
	 * Inserts the base user information.
	 * @param \tapeplay\server\model\User $user Inserts passed user into database
	 * @return int The ID that was assigned to this user in the db.
	 */
	function stepOneInsert(User $user)
	{
		$this->sql = "INSERT INTO users " .
				"(first_name, last_name, email, password, zipcode, gender, birthdate, organization, title, last_login, account_type)" .
				" VALUES " .
				"(:firstName, :lastName, :email, :password, :zipcode, :gender, :birthDate, :organization, :title, :lastLogin, :accountType)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":firstName", $user->getFirstName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":lastName", $user->getLastName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
		$this->prep->bindValue(":password", $user->getPassword(), \PDO::PARAM_STR);
		$this->prep->bindValue(":zipcode", $user->getZipcode(), \PDO::PARAM_STR);
		$this->prep->bindValue(":gender", $user->getGender(), \PDO::PARAM_STR);
		$this->prep->bindValue(":birthDate", $user->getBirthDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":organization", $user->getOrganization(), \PDO::PARAM_STR);
		$this->prep->bindValue(":title", $user->getTitle(), \PDO::PARAM_STR);
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
	function update(User $user)
	{
		$this->sql = "UPDATE users " .
				" SET " .
				"(first_name:firstName, :lastName, :email, :password, :zipcode, :gender, :birthDate, :organization, :title, :lastLogin, :accountType)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":firstName", $user->getFirstName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":lastName", $user->getLastName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
		$this->prep->bindValue(":password", $user->getPassword(), \PDO::PARAM_STR);
		$this->prep->bindValue(":zipcode", $user->getZipcode(), \PDO::PARAM_STR);
		$this->prep->bindValue(":gender", $user->getGender(), \PDO::PARAM_STR);
		$this->prep->bindValue(":birthDate", $user->getBirthDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":organization", $user->getOrganization(), \PDO::PARAM_STR);
		$this->prep->bindValue(":title", $user->getTitle(), \PDO::PARAM_STR);
		$this->prep->bindValue(":lastLogin", $user->getLastLogin(), \PDO::PARAM_INT);
		$this->prep->bindValue(":accountType", $user->getAccountType(), \PDO::PARAM_INT);

		$this->prep->execute();
	}

	/**
	 * Removes the user and associated entities from the database.
	 * @param $id The ID of the user to be deleted
	 */
	function remove($id)
	{

	}

	/**
	 * Uses the password to get an MD5 password hash to compare to the hashes in the database.
	 * @param $pass The password of the user.
	 * @return The id of the user that is authenticated.
	 */
	function authenticate($pass)
	{
		$user = new User();

		$this->sql = "SELECT count(*) FROM users WHERE password = :password";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->setFetchMode(\PDO::FETCH_INTO, $user);
		$this->prep->bindValue(":password", $pass, \PDO::PARAM_STR);
		$this->prep->execute();

		return $user;
	}

	/**
	 * Checks the database for a match.
	 * @param $email The email we need to check.
	 * @return True if email exists in db, false otherwise.
	 */
	function isEmailValid($email)
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
	function deactivate($id)
	{

	}

	/**
	 * Returns the related users that this user can connect with.
	 * @param $id The id of the user.
	 * @return An array of tapeplay\server\model\UserSummary
	 */
	function getRelatedUsers($id)
	{

	}
}
