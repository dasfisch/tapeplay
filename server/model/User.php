<?php

namespace tapeplay\server\model;

/**
 * Represents an entity that can log into the system.
 */
class User
{
	protected  $_userId;
	protected  $_firstName;
	protected  $_lastName;
	protected  $_email;
	protected  $_hash;
	protected  $_zipcode;
	protected  $_gender;
	protected  $_birthDate;
	protected  $_lastLogin;
	protected  $_accountType;
	protected  $_optIns;


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

	public function setUserId($id)
	{
		$this->_userId = $id;
	}

	public function getUserId()
	{
		return $this->_userId;
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

	public function setHash($password)
	{
		$this->_hash = $password;
	}

	public function getHash()
	{
		return $this->_hash;
	}

	public function setZipcode($zipcode)
	{
		$this->_zipcode = $zipcode;
	}

	public function getZipcode()
	{
		return $this->_zipcode;
	}

	public function setOptIns(array $optIns)
	{
		$this->_optIns = $optIns;
	}

	public function getOptIns()
	{
		return $this->_optIns;
	}
}
