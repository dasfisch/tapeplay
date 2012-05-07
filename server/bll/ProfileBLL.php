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
class ProfileBLL extends BaseBLL
{
	private static $SALT = "We've done four already but now we're steady and then they went: One, two, three, four";

	function __construct()
	{
		$this->dal = new UserDAO();
	}

	/**
	 * Passes a hash to the db to try and retrieve a user with a matching hash.
	 * @param $username
	 * @param $password
	 */
	public function authenticate($username, $password)
	{
		// create md5 hash to pass to dal
		$hash = md5($username . ProfileBLL::$SALT . $password);

		$row = $this->dal->authenticate($hash);


	}

	public function createUser(User $user)
	{
		return $this->dal->create($user);
	}

	public function createCoach(Coach $coach)
	{
		//return $this->dal->createPlayer($coach);
	}

	public function createScout(Scout $scout)
	{
		//return $this->dal->createScout($scout);
	}

	/**
	 * @param $partial string The portion of the query that has been entered into the text input box.
	 */
	public function getSchoolsByName($partial)
	{
		//return $this->dal->getSchoolsByName($partial);
	}

	//////////////////////////////////////////////////////////
	// Private Methods
	//////////////////////////////////////////////////////////

}
