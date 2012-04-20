<?php

namespace tapeplay\server\model;

require_once("model/User.php");

use tapeplay\server\model\User;

class Scout extends User
{
	private $_id;
	private $_organization;
	private $_title;
	private $_recrutingLevel;

	public function setUserId($id)
	{
		$this->_id = $id;
	}

	public function getUserId()
	{
		return $this->_id;
	}

	public function setOrganization($organization)
	{
		$this->_organization = $organization;
	}

	public function getOrganization()
	{
		return $this->_organization;
	}

	public function setRecrutingLevel($recrutingLevel)
	{
		$this->_recrutingLevel = $recrutingLevel;
	}

	public function getRecrutingLevel()
	{
		return $this->_recrutingLevel;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getTitle()
	{
		return $this->_title;
	}
}
