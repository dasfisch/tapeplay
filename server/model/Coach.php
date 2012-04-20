<?php

namespace tapeplay\server\model;

require_once("model/School.php");
require_once("model/User.php");

use tapeplay\server\model\User;

class Coach
{
	private $_id;
	private $_school;
	private $_schoolPosition;
	private $_user;


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

	public function setUser(User $user)
	{
		$this->_user = $user;
	}

	public function getUser()
	{
		return $this->_user;
	}
}
