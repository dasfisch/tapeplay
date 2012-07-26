<?php

namespace tapeplay\server\bll;

require_once("dal/UserDAO.php");
require_once("bll/BaseBLL.php");
require_once("bll/VideoBLL.php");
require_once("model/Coach.php");
require_once("model/Scout.php");
require_once("model/User.php");
require_once("model/Player.php");
require_once("model/UserSummary.php");
require_once("enum/AccountTypeEnum.php");
require_once("enum/AccountStatusEnum.php");
require_once("utility/Util.php");

use tapeplay\server\dal\UserDAO;
use tapeplay\server\bll\VideoBLL;
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

	private $_accountType = "";
	private $_user; // could be player, scout, or coach object


	//////////////////////////////////////////////////////////
	// Public Properties
	//////////////////////////////////////////////////////////

	public function setAccountType($accountType)
	{
		$this->_accountType = $accountType;
	}

	public function getAccountType()
	{
		return $this->_accountType;
	}

	public function setUser($user)
	{
		$this->_user = $user;

		if ($user)
		{
			$this->_accountType = $user->getAccountType();

			// anytime the user is set, update the session
            unset($_SESSION['user']);

			$_SESSION["user"] = serialize($user);
		}
		else
		{
			// user is null - unset session var
			unset($_SESSION["user"]);
		}
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
	}


	//////////////////////////////////////////////////////////
	// Public Methods
	//////////////////////////////////////////////////////////

	public function isAuthenticated()
	{
		return $this->_user != null;
	}

	public function createHash($username, $password)
	{
		return md5($username . UserBLL::$SALT . $password);
	}

	public function loadUser()
	{
		// grab user from session
		$this->setUser(unserialize($_SESSION['user']));

		// TODO: Do we need to do anything else?
	}

	/**
	 * Passes a hash to the db to try and retrieve a user with a matching hash.
	 * @param $email
	 * @param $password
	 * @return bool
	 */
	public function authenticate($email, $password)
	{
		// create md5 hash to pass to dal
		$hash = $this->createHash($email, $password);

		// returns a user id
		$arr = $this->dal->authenticate($hash);

		if ($arr)
		{
			$userId = $arr["id"];

			// load up appropriate user extension based on account type
			switch ($arr["account_type"])
			{
				case \AccountTypeEnum::$PLAYER:
					$this->setUser($this->dal->getPlayerUser($userId));

					// grab saved videos
					$videoBLL = new VideoBLL();
					$this->getUser()->setSavedVideos($videoBLL->getVideoSaves($this->getUser()->getUserId()));

					break;

				case \AccountTypeEnum::$COACH:
					$this->setUser($this->dal->getCoachUser($userId));
					break;

				case \AccountTypeEnum::$SCOUT:
					$this->setUser($this->dal->getScoutUser($userId));
					break;
			}

			return true;
		}
		else
		{
			// auth failed
			return false;
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

				// everything went well - send email to user
				\Util::sendEmail(\EmailEnum::$PLAYER_JOIN, $user->getEmail());
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
        // We can only destroy the user; we cna't destroy the session as it holds sport data;
        // Possibly switch sports to cookies?
        unset($_SESSION['user']);
	}

	/**
	 * @param $status int The status to update user to
	 * @return bool True if successful, false otherwise
	 */
	public function updateStatus($status)
	{
		return $this->dal->updateStatus($this->getUser()->getUserId(), $status);
	}


	//////////////////////////////////////////////////////////
	// Private Methods
	//////////////////////////////////////////////////////////

}
