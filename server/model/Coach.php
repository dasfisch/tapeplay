<?php

namespace tapeplay\server\model;

require_once("model/School.php");
require_once("model/User.php");

use tapeplay\server\model\User;

class Coach extends User
{
	private $_id;
	private $_school;
	private $_schoolPosition;

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
}
