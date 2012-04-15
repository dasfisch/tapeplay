<?php

namespace tapeplay\server\bll;

require_once("bll/BaseBLL.php");
require_once("dal/UserDAO.php");
require_once("model/User.php");
require_once("model/UserSummary.php");

use tapeplay\server\dal\UserDAO;
use tapeplay\server\model\User;
use tapeplay\server\model\UserSummary;

class UserBLL extends BaseBLL
{
	function __construct()
	{
		$this->dal = new UserDAO();
	}

	/**
	 * @param \tapeplay\server\model\User $user
	 * @return mixed -1 if insert fails, ID of row otherwise.
	 */
	function stepOneInsert(User $user)
	{
		return $this->dal->stepOneInsert($user);
	}
}
