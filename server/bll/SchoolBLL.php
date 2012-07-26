<?php

namespace tapeplay\server\bll;

require_once("dal/SchoolDAO.php");
require_once("model/School.php");

use tapeplay\server\dal\SchoolDAO;
use tapeplay\server\model\School;

/**
 * Manages all logic associated with the user's profile.
 */
class SchoolBLL extends BaseBLL
{

	function __construct()
	{
		$this->dal = new SchoolDAO();
	}

	/**
	 * @param $partial string The portion of the query that has been entered into the text input box.
	 */
	public function getSchoolsByName($partial)
	{
		return $this->dal->getSchoolsByName($partial);
	}

    public function getSchoolById($schoolId) {
        return $this->dal->getSchoolById($schoolId);
    }

//    public function getSchools() {
//        return $this->dal->getSchools();
//    }

	//////////////////////////////////////////////////////////
	// Private Methods
	//////////////////////////////////////////////////////////

}
