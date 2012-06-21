<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Coach.php");
require_once("model/Player.php");
require_once("model/Scout.php");
require_once("model/User.php");
require_once("model/School.php");
require_once("model/UserSummary.php");

use tapeplay\server\model\User;
use tapeplay\server\model\Coach;
use tapeplay\server\model\Player;
use tapeplay\server\model\Scout;
use tapeplay\server\model\School;

/**
 * Manages all db access for anything user-related.
 */
class UserDAO extends BaseDOA
{

	/**
	 * Fetches the base information for a user.
	 * @param $id int The id of the user
	 */
	public function getSummary($id)
	{

	}

	/**
	 * @param $hash string The hash of the current user
	 * @return \tapeplay\server\model\User The retrieved user
	 */
	public function getFull($hash)
	{
		try
		{
			$this->sql = "SELECT * FROM users WHERE id = :id";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $hash, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return User::create($this->prep->fetch());
	}

	/**
	 * Inserts the base user information.
	 * @param \tapeplay\server\model\User $user Inserts passed user into database
	 * @return User The user that was passed in
	 */
	public function create(User $user)
	{
		try
		{
			$this->sql = "INSERT INTO users " .
					"(first_name, last_name, email, hash, zipcode, gender, birth_date, last_login, account_type)" .
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

		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		// assign the user to this id
		$user->setUserId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);

		return $user;
	}

	/**
	 * @param \tapeplay\server\model\User $user
	 * @return bool Returns true if successful
	 */
	public function update(User $user)
	{
		try
		{
			$this->sql = "UPDATE users " .
					" SET " .
					"(first_name:firstName, :lastName, :email, :password, :zipcode, :gender, :birthDate, :lastLogin, :accountType)" .
					" WHERE " .
					"id = :id";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $user->getUserId(), \PDO::PARAM_INT);
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
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return false;
		}

		return ($this->prep->rowCount() > 0);
	}

	/**
	 * Removes the user and associated entities from the database.
	 * @param $id int The ID of the user to be deleted
	 */
	public function remove($id)
	{

	}

	/**
	 * Uses the password to get an MD5 password hash to compare to the hashes in the database.
	 * @param $hash string The password of the user.
	 * @return int The row from the user.
	 */
	public function authenticate($hash)
	{
		$user = new User();

		$this->sql = "SELECT id FROM users WHERE hash = :hash";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->setFetchMode(\PDO::FETCH_INTO, $user);
		$this->prep->bindValue(":hash", $hash, \PDO::PARAM_STR);
		$this->prep->execute();

		if ($this->prep->rowCount() > 0)
		{
			$row = $this->prep->fetch();
			return $row["id"];
		}
		else
		{
			return -1;
		}
	}

	/**
	 * Checks the database for a match.
	 * @param $email string The email we need to check.
	 * @return bool True if email exists in db, false otherwise.
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
	 * @param $id int The id of the user.
	 * @return array An array of tapeplay\server\model\UserSummary
	 */
	public function getRelatedUsers($id)
	{

	}
}
