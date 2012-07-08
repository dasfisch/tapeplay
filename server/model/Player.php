<?php

namespace tapeplay\server\model;

require_once("model/School.php");
require_once("model/User.php");
require_once("model/Stat.php");
require_once("model/Sport.php");

use tapeplay\server\model\School;
use tapeplay\server\model\Sport;
use tapeplay\server\model\Stat;
use tapeplay\server\model\User;

class Player extends User
{
	public static function create($arr)
	{
		$player = new Player();

		// set user attributes
		$player->setUserId($arr["id"]);
		$player->setFirstName($arr["first_name"]);
		$player->setLastName($arr["last_name"]);
		$player->setEmail($arr["email"]);
		$player->setHash($arr["hash"]);
		$player->setZipcode($arr["zipcode"]);
		$player->setGender($arr["gender"]);
		$player->setAge($arr["birth_date"]);
		$player->setLastLogin($arr["last_login"]);
		$player->setAccountType($arr["account_type"]);

		// set player attributes
		$player->setNumber($arr["number"]);
		$player->setHeight($arr["height"]);
		$player->setGradeLevel($arr["grade_level"]);
		$player->setVideoAccess($arr["video_access"]);
		$player->setPosition($arr["position"]);

		// set school
		$school = new School();
		$school->setName($arr["name"]);
		$school->setCity($arr["city"]);
		$school->setState($arr["state"]);
		$school->setDivision($arr["division"]);

		$player->setSchool($school);

		return $player;
	}

	private $_id;
	private $_number;
	private $_guardianSignup;
	private $_position;
	private $_gradeLevel;
	private $_height;
	private $_videoAccess;
	private $_sport;
	private $_stats; // array<Stat>
	private $_school;
	private $_weight;
	private $_coachName;
	private $_graduationMonth;
	private $_graduationYear;
	private $_status;

	function __construct(User $user = null)
	{
		if ($user)
		{
			// set all user properties in this player
			$this->setUserId($user->getUserId());
			$user->setFirstName($user->getFirstName());
			$user->setLastName($user->getLastName());
			$user->setEmail($user->getEmail());
			$user->setHash($user->getHash());
			$user->setZipcode($user->getZipcode());
			$user->setGender($user->getGender());
			$user->setBirthYear($user->getBirthYear());
			$user->setAge($user->getAge());
			$user->setLastLogin($user->getLastLogin());
			$user->setAccountType($user->getAccountType());
		}
	}


	public function setGradeLevel($gradeLevel)
	{
		$this->_gradeLevel = $gradeLevel;
	}

	public function getGradeLevel()
	{
		return $this->_gradeLevel;
	}

	public function setGuardianSignup($guardianSignup)
	{
		$this->_guardianSignup = $guardianSignup;
	}

	public function getGuardianSignup()
	{
		return $this->_guardianSignup;
	}

	public function setHeight($height)
	{
		$this->_height = $height;
	}

	public function getHeight()
	{
		return $this->_height;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setNumber($number)
	{
		$this->_number = $number;
	}

	public function getNumber()
	{
		return $this->_number;
	}

	public function setPosition($position)
	{
		$this->_position = $position;
	}

	public function getPosition()
	{
		return $this->_position;
	}

	public function setSchool(School $school)
	{
		$this->_school = $school;
	}

	public function getSchool()
	{
		return $this->_school;
	}

	public function setSport(Sport $sport)
	{
		$this->_sport = $sport;
	}

	public function getSport()
	{
		return $this->_sport;
	}

	public function setStats(array $stats)
	{
		$this->_stats = $stats;
	}

	public function getStats()
	{
		return $this->_stats;
	}

	public function setVideoAccess($videoAccess)
	{
		$this->_videoAccess = $videoAccess;
	}

	public function getVideoAccess()
	{
		return $this->_videoAccess;
	}

	public function setWeight($weight)
	{
		$this->_weight = $weight;
	}

	public function getWeight()
	{
		return $this->_weight;
	}

	public function setCoachName($coachName)
	{
		$this->_coachName = $coachName;
	}

	public function getCoachName()
	{
		return $this->_coachName;
	}

	public function setGraduationMonth($graduationMonth)
	{
		$this->_graduationMonth = $graduationMonth;
	}

	public function getGraduationMonth()
	{
		return $this->_graduationMonth;
	}

	public function setGraduationYear($graduationYear)
	{
		$this->_graduationYear = $graduationYear;
	}

	public function getGraduationYear()
	{
		return $this->_graduationYear;
	}

	public function setStatus($status)
	{
		$this->_status = $status;
	}

	public function getStatus()
	{
		return $this->_status;
	}
}
