<?php

namespace tapeplay\server\model;

require_once("model/User.php");

use tapeplay\server\model\User;

class Scout extends User
{
	public static function create($arr)
	{
		$scout = new Scout();

		// set user attributes
		$scout->setUserId($arr["id"]);
		$scout->setFirstName($arr["first_name"]);
		$scout->setLastName($arr["last_name"]);
		$scout->setEmail($arr["email"]);
		$scout->setHash($arr["hash"]);
		$scout->setZipcode($arr["zipcode"]);
		$scout->setGender($arr["gender"]);
		$scout->setBirthYear($arr["birth_date"]);
		$scout->setLastLogin($arr["last_login"]);
		$scout->setAccountType($arr["account_type"]);

		// set scout attributes
		$scout->setOrganization($arr["organization"]);
		$scout->setTitle($arr["title"]);
		$scout->setRecrutingLevel($arr["recruiting_level"]);

		return $scout;
	}

	private $_id;
	private $_organization;
	private $_title;
	private $_recrutingLevel;

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
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
