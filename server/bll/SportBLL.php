<?php

namespace tapeplay\server\bll;

require_once("dal/SportDAO.php");
require_once("bll/BaseBLL.php");

use tapeplay\server\bll\BaseBLL;
use tapeplay\server\dal\SportDAO;
use tapeplay\server\model\Sport;
use tapeplay\server\model\SearchFilter;

class SportBLL extends BaseBLL
{
	private static $SALT = "We've done four already but now we're steady and then they went: One, two, three, four";

	function __construct()
	{
		$this->dal = new SportDAO();
	}

	public function get(SearchFilter $search)
	{
		return $this->dal->get($search);
	}
}
