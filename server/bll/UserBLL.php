<?php

namespace tapeplay\server\bll;

require_once("dal/UserDAO.php");
require_once("bll/BaseBLL.php");
require_once("model/Coach.php");
require_once("model/Scout.php");
require_once("model/User.php");
require_once("model/Player.php");
require_once("model/UserSummary.php");
require_once("enum/AccountTypeEnum.php");

use tapeplay\server\dal\UserDAO;
use tapeplay\server\model\Coach;
use tapeplay\server\model\Scout;
use tapeplay\server\model\User;
use tapeplay\server\model\Player;
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
	private $_user; // could be player, scout, or coach object


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

	public function setUser($user)
	{
		$this->_user = $user;
	}

	public function getUser()
	{
		return $this->_user;
	}


	//////////////////////////////////////////////////////////
	// Initialization
	//////////////////////////////////////////////////////////

	function __construct()
	{
		$this->dal = new UserDAO();

		$this->_user = new User();
	}


	//////////////////////////////////////////////////////////
	// Public Methods
	//////////////////////////////////////////////////////////

	/**
	 * @param $id int The ID of the user that we are retrieving from session.
	 * @return User Returns player, coach or scout, based on account type of user
	 */
	public function loadUser($id)
	{
		switch ($_SESSION['account_type'])
		{
			case \AccountTypeEnum::$PLAYER:
				$this->setUser($this->dal->getPlayerUser($id));
				break;

			case \AccountTypeEnum::$COACH:
				$this->setUser($this->dal->getCoachUser($id));
				break;

			case \AccountTypeEnum::$SCOUT:
				$this->setUser($this->dal->getScoutUser($id));
				break;
		}
	}

	/**
	 * Passes a hash to the db to try and retrieve a user with a matching hash.
	 * @param $username
	 * @param $password
	 * @return int
	 */
	public function authenticate($username, $password)
	{
		// create md5 hash to pass to dal
		$hash = md5($username . UserBLL::$SALT . $password);

		// returns a user id
		$arr = $this->dal->authenticate($hash);

		if ($arr)
		{
			// set session variables
			$_SESSION["user_id"] = $arr["id"];
			$_SESSION["account_type"] = $arr["account_type"];

			return $arr["id"];
		}
		else
		{
			return -1;
		}

	}

	public function insert(User $user)
	{
		$userId = $this->dal->insert($user);

		// make sure user was created
		if ($userId > 0)
		{
			// store the user id
			$user->setUserId($userId);

			// create player object and insert player
			$playerBLL = new PlayerBLL();
			$playerId = $playerBLL->insert($userId);

			// make sure player was created
			if ($playerId > 0)
			{
				// create player object based on user that was created
				$player = new Player($user);
				$player->setId($playerId);

				// set BLL "user" to be this player
				$this->setUser($player);
			}
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
