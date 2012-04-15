<?php

namespace tapeplay\server\model;

/**
 * Represents an entity that can log into the system.
 */
class User
{
	private $_id;
	private $_firstName;
	private $_lastName;
	private $_email;
	private $_password;
	private $_zipcode;
	private $_gender;
	private $_birthDate;
	private $_lastLogin;
	private $_organization;
	private $_title;
	private $_accountType;


	public function setAccountType($accountType)
	{
		$this->_accountType = $accountType;
	}

	public function getAccountType()
	{
		return $this->_accountType;
	}

	public function setBirthDate($birthDate)
	{
		$this->_birthDate = $birthDate;
	}

	public function getBirthDate()
	{
		return $this->_birthDate;
	}

	public function setEmail($email)
	{
		$this->_email = $email;
	}

	public function getEmail()
	{
		return $this->_email;
	}

	public function setFirstName($firstName)
	{
		$this->_firstName = $firstName;
	}

	public function getFirstName()
	{
		return $this->_firstName;
	}

	public function setGender($gender)
	{
		$this->_gender = $gender;
	}

	public function getGender()
	{
		return $this->_gender;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setLastLogin($lastLogin)
	{
		$this->_lastLogin = $lastLogin;
	}

	public function getLastLogin()
	{
		return $this->_lastLogin;
	}

	public function setLastName($lastName)
	{
		$this->_lastName = $lastName;
	}

	public function getLastName()
	{
		return $this->_lastName;
	}

	public function setOrganization($organization)
	{
		$this->_organization = $organization;
	}

	public function getOrganization()
	{
		return $this->_organization;
	}

	public function setPassword($password)
	{
		$this->_password = $password;
	}

	public function getPassword()
	{
		return $this->_password;
	}

	public function setZipcode($zipcode)
	{
		$this->_zipcode = $zipcode;
	}

	public function getZipcode()
	{
		return $this->_zipcode;
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
