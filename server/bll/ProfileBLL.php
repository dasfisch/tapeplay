<?php

namespace tapeplay\server\bll;

require_once("dal/ProfileDAO.php");
require_once("bll/BaseBLL.php");
require_once("model/Coach.php");
require_once("model/Scout.php");
require_once("model/User.php");
require_once("model/UserSummary.php");

use tapeplay\server\dal\ProfileDAO;
use tapeplay\server\model\Coach;
use tapeplay\server\model\Scout;
use tapeplay\server\model\User;
use tapeplay\server\model\UserSummary;

/**
 * Manages all profile database access.  Login, Signup, Forgot Password, Update Profile all
 * fall in this class.
 */
class ProfileBLL extends BaseBLL
{
	private static $SALT = "We've done four already but now we're steady and then they went: One, two, three, four";

	function __construct()
	{
		$this->dal = new ProfileDAO();
	}

	public function authenticate($username, $password)
	{
		// create md5 hash to pass to dal
		$hash = md5($username . ProfileBLL::$SALT . $password);

		$this->dal->authenticate($hash);
	}

	public function createUser(User $user)
	{
		return $this->dal->createUser($user);
	}

	public function createCoach(Coach $coach)
	{
		return $this->dal->createCoach($coach);
	}

	public function createScout(Scout $scout)
	{
		return $this->dal->createScout($scout);
	}


	//////////////////////////////////////////////////////////
	// Private Methods
	//////////////////////////////////////////////////////////

}
