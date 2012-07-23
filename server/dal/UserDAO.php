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
	 * Returns a Player, Coach, or Scout object based on account type
	 * @param $userId int The ID of the user.
	 * @return \tapeplay\server\model\User The retrieved user
	 */
	public function getPlayerUser($userId)
	{
		try
		{
            $this->sql = 'SELECT
                                u.*,
                                p.id AS player_id, p.number, p.height, p.grade_level, p.video_access,
                                p.position, p.weight, p.coach_name, p.graduation_month, p.graduation_year,
                                s.id AS schoolId, s.name as schoolName, s.city as schoolCity,
                                s.state as schoolState, s.division AS schoolDivision,
                                sp.id AS sport_id,
                                sp.name AS sport_name
                            FROM
                                users u
                            INNER JOIN
                                players p
                                    ON
                                        p.user_id=u.id
                            LEFT JOIN
                                schools s
                                    ON
                                        p.school_id=s.id
                            LEFT JOIN
                                sports sp
                                    ON
                                        sp.id = p.sport_id
                            WHERE u.id = :id';

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $userId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

        return Player::create($this->prep->fetch());

        /**
         * @TODO: Need to figure out how to have multiple sports;
         * Logic needs to go for updates.
         */
//        while($row = $this->prep->fetch()) {
//            echo '<pre>';
//            var_dump($row);
//            echo '</pre>';
//        }
//
//        exit;
	}

	public function getCoachUser($userId)
	{
		try
		{
			$this->sql = "SELECT u.*, " .
					" c.id AS coach_id, c.school_position, c.collegiate_level, c.association, " .
					" s.id AS school_id, s.name as school_name, s.city as school_city, s.state as school_state, s.division AS school_division " .
					" FROM users u INNER JOIN coaches c ON u.id = c.user_id LEFT JOIN schools s ON c.school_id = s.id" .
					" WHERE u.id = :id";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $userId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return Coach::create($this->prep->fetch());
	}

	public function getScoutUser($userId)
	{
		try
		{
			$this->sql = "SELECT u.*, " .
					"s.*" .
					" FROM users u INNER JOIN scouts s ON u.id = s.user_id " .
					"WHERE u.id = :id";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $userId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		return Scout::create($this->prep->fetch());
	}

	/**
	 * Inserts the base user information.
	 * @param \tapeplay\server\model\User $user Inserts passed user into database
	 * @return User The user that was passed in
	 */
	public function insert(User $user)
	{
		try
		{
			$this->sql = "INSERT INTO users " .
					"(first_name, last_name, email, hash, zipcode, gender, birth_year, last_login, account_type)" .
					" VALUES " .
					"(:firstName, :lastName, :email, :hash, :zipcode, :gender, :birthYear, :lastLogin, :accountType)";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":firstName", $user->getFirstName(), \PDO::PARAM_STR);
			$this->prep->bindValue(":lastName", $user->getLastName(), \PDO::PARAM_STR);
			$this->prep->bindValue(":email", $user->getEmail(), \PDO::PARAM_STR);
			$this->prep->bindValue(":hash", $user->getHash(), \PDO::PARAM_STR);
			$this->prep->bindValue(":zipcode", $user->getZipcode(), \PDO::PARAM_STR);
			$this->prep->bindValue(":gender", $user->getGender(), \PDO::PARAM_STR);
			$this->prep->bindValue(":birthYear", $user->getBirthYear(), \PDO::PARAM_INT);
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
		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
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
					"(first_name:firstName, :lastName, :email, :password, :zipcode, :gender, :birthYear, :lastLogin, :accountType)" .
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
			$this->prep->bindValue(":birthYear", $user->getBirthYear(), \PDO::PARAM_INT);
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
	 * @return array Returns the id and account type for this user.
	 */
	public function authenticate($hash)
	{
		$user = new User();

		$this->sql = "SELECT id, account_type FROM users WHERE hash = :hash";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":hash", $hash, \PDO::PARAM_STR);
		$this->prep->execute();

		if ($this->prep->rowCount() > 0)
		{
			$row = $this->prep->fetch();
			return $row;
		}
		else
		{
			return null;
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

	public function updateStatus($userId, $status)
	{
		try
		{
			$this->sql = "UPDATE users " .
					" SET " .
					"status = :status" .
					" WHERE " .
					"id = :id";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":id", $userId, \PDO::PARAM_INT);
			$this->prep->bindValue(":status", $status, \PDO::PARAM_INT);

			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return false;
		}

		return ($this->prep->rowCount() > 0);
	}
}
