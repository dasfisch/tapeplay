<?php

namespace tapeplay\server\model;

require_once("model/School.php");
require_once("model/User.php");

use tapeplay\server\model\User;

class Coach extends User
{
	public static function create($arr)
	{
		$coach = new Coach();

		// set user attributes
		$coach->setUserId($arr["id"]);
		$coach->setFirstName($arr["first_name"]);
		$coach->setLastName($arr["last_name"]);
		$coach->setEmail($arr["email"]);
		$coach->setHash($arr["hash"]);
		$coach->setZipcode($arr["zipcode"]);
		$coach->setGender($arr["gender"]);
		$coach->setBirthYear($arr["birth_date"]);
		$coach->setLastLogin($arr["last_login"]);
		$coach->setAccountType($arr["account_type"]);

		// set coach attributes
		$coach->setSchoolPosition($arr["school_position"]);
		$coach->setCollegiateLevel($arr["collegiate_level"]);
		$coach->setAssociation($arr["association"]);

		// set school
		$school = new School();
		$school->setName($arr["name"]);
		$school->setCity($arr["city"]);
		$school->setState($arr["state"]);
		$school->setDivision($arr["division"]);

		$coach->setSchool($school);

		return $coach;
	}

	private $_id;
	private $_school;
	private $_schoolPosition;
	private $_collegiateLevel;
	private $_association;

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setSchool(School $school)
	{
		$this->_school = $school;
	}

	public function getSchool()
	{
		return $this->_school;
	}

	public function setSchoolPosition($schoolPosition)
	{
		$this->_schoolPosition = $schoolPosition;
	}

	public function getSchoolPosition()
	{
		return $this->_schoolPosition;
	}

	public function setAssociation($association)
	{
		$this->_association = $association;
	}

	public function getAssociation()
	{
		return $this->_association;
	}

	public function setCollegiateLevel($collegiateLevel)
	{
		$this->_collegiateLevel = $collegiateLevel;
	}

	public function getCollegiateLevel()
	{
		return $this->_collegiateLevel;
	}
}
