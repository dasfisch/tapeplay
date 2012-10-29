<?php
namespace tapeplay\server\model;

/**
 * Represents an entity that can log into the system.
 */
class User
{
	public static function create($arr)
	{
        $school = new School();
		$user = new User();

		$user->setUserId($arr["id"]);
		$user->setFirstName($arr["first_name"]);
		$user->setLastName($arr["last_name"]);
		$user->setEmail($arr["email"]);
		$user->setHash($arr["hash"]);
		$user->setZipcode($arr["zipcode"]);
		$user->setGender($arr["gender"]);
        $user->setBirthYear($arr["birth_year"]);
        $user->setAge($arr["birth_year"]);
		$user->setLastLogin($arr["last_login"]);
        $user->setAccountType($arr["account_type"]);
		$user->setStatus($arr["status"]);
        $user->setLastUpdate($arr['last_modified']);

        if($arr["deactivation_date"] != '' && $arr["deactivation_date"] != 0) {
            $user->setDeactivated();
        }

		return $user;
	}

    protected  $_age;
	protected  $_userId;
    protected  $_deactivated = false;
    protected  $_firstName;
	protected  $_lastName;
	protected  $_email;
	protected  $_hash;
	protected  $_zipcode;
	protected  $_gender;
	protected  $_birthYear;
	protected  $_lastLogin;
	protected  $_accountType;
	protected  $_optIns;
	protected  $_status;
	protected  $_savedVideos;
    protected  $_lastUpdate;


	public function setAccountType($accountType)
	{
		$this->_accountType = $accountType;
	}

	public function getAccountType()
	{
		return $this->_accountType;
	}

	public function setBirthYear($birthYear)
	{
		$this->_birthYear = $birthYear;
	}

	public function getBirthYear()
	{
		return $this->_birthYear;
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

    public function setAge($birthDate) {
        $this->_age = (int)date('Y', strtotime('now')) - (int)date('Y', $birthDate);
    }

    public function getAge() {
        return $this->_age;
    }

	public function setStatus($status)
	{
		$this->_status = $status;
	}

	public function getStatus()
	{
		return $this->_status;
	}

	public function setSavedVideos($savedVideos)
	{
		$this->_savedVideos = $savedVideos;
	}

	public function getSavedVideos()
	{
		return $this->_savedVideos;
	}

    public function setDeactivated() {
        $this->_deactivated = true;
    }

    public function getDeactivated() {
        return $this->_deactivated;
    }

    public function setLastUpdate($last_update) {
        $this->_lastUpdate = $last_update;
    }

    public function getLastUpdate() {
        return $this->_lastUpdate ;
    }

    public function __toString() {
        $val = '';

        foreach($this as $key=>$val) {
            $val .= $key.'='.$val.';';
        }

        return $val;
    }
}
