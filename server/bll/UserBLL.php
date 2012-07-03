<?php

namespace tapeplay\server\bll;

require_once("dal/UserDAO.php");
require_once("bll/BaseBLL.php");
require_once("model/Coach.php");
require_once("model/Scout.php");
require_once("model/User.php");
require_once("model/UserSummary.php");

use tapeplay\server\dal\UserDAO;
use tapeplay\server\model\Coach;
use tapeplay\server\model\Scout;
use tapeplay\server\model\User;
use tapeplay\server\model\UserSummary;

/**
 * Manages all logic associated with the user's profile.
 */
class UserBLL extends BaseBLL
{
	//////////////////////////////////////////////////////////
	// Static Stuff
	//////////////////////////////////////////////////////////

	private static $SALT = "We've done four already but now we're steady and then they went: One, two, three, four";


	//////////////////////////////////////////////////////////
	// Private Fields
	//////////////////////////////////////////////////////////

	private $_isAuthenticated = false;
	private $_userId = -1;

	//////////////////////////////////////////////////////////
	// Public Properties
	//////////////////////////////////////////////////////////

	public function setIsAuthenticated($isAuthenticated)
	{
		$this->_isAuthenticated = $isAuthenticated;
	}

	public function getIsAuthenticated()
	{
		return $this->_isAuthenticated;
	}

	public function setUserId($userId)
	{
		$this->_userId = $userId;
	}

	public function getUserId()
	{
		return $this->_userId;
	}


	//////////////////////////////////////////////////////////
	// Initialization
	//////////////////////////////////////////////////////////

	function __construct()
	{
		$this->dal = new UserDAO();
	}


	//////////////////////////////////////////////////////////
	// Public Methods
	//////////////////////////////////////////////////////////

	public function getFull($id)
	{
		return $this->dal->getFull($id);
	}

	/**
	 * Passes a hash to the db to try and retrieve a user with a matching hash.
	 * @param $username
	 * @param $password
	 */
	public function authenticate($username, $password)
	{
		// create md5 hash to pass to dal
		$hash = md5($username . UserBLL::$SALT . $password);

		// returns a user id
		return $this->dal->authenticate($hash);
	}

	public function insert(User $user)
	{
		$userId = $this->dal->insert($user);

		if ($userId > 0)
		{
			// store id in bll
			$this->_userId = $userId;
		}

		return $userId;
	}

	public function resetPassword($userId)
	{
		// TODO: Reset this bitch's password
		return true;
	}

	public function logout()
	{
		// TODO: Implement logout logic
	}


	//////////////////////////////////////////////////////////
	// Private Methods
	//////////////////////////////////////////////////////////

}
