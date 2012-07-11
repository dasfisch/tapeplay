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
		$player->setAge($arr["birth_year"]);
		$player->setLastLogin($arr["last_login"]);
		$player->setAccountType($arr["account_type"]);
		$player->setStatus($arr["status"]);

		// set player attributes
		$player->setId($arr["player_id"]);
		$player->setNumber($arr["number"]);
		$player->setHeight($arr["height"]);
		$player->setGradeLevel($arr["grade_level"]);
		$player->setVideoAccess($arr["video_access"]);
		$player->setPosition($arr["position"]);
		$player->setPosition($arr["weight"]);
		$player->setPosition($arr["coach_name"]);
		$player->setPosition($arr["graduationMonth"]);
		$player->setPosition($arr["graduationYear"]);

		// set school
		$school = new School();
		$school->setId($arr["school_id"]);
		$school->setName($arr["school_name"]);
		$school->setCity($arr["school_city"]);
		$school->setState($arr["school_state"]);
		$school->setDivision($arr["school_division"]);

		$player->setSchool($school);

		$sport = new Sport();
		$sport->setId($arr["sport_id"]);
		$sport->setSportName($arr["sport_name"]);

		return $player;
	}

	private $_id;
	private $_number;
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

	function __construct(User $user = null)
	{
		$this->setSport(new Sport());
		$this->setSchool(new School());

		if ($user)
		{
			// set all user properties in this player
			$this->setUserId($user->getUserId());
			$this->setFirstName($user->getFirstName());
			$this->setLastName($user->getLastName());
			$this->setEmail($user->getEmail());
			$this->setHash($user->getHash());
			$this->setZipcode($user->getZipcode());
			$this->setGender($user->getGender());
			$this->setBirthYear($user->getBirthYear());
			$this->setAge($user->getAge());
			$this->setLastLogin($user->getLastLogin());
			$this->setAccountType($user->getAccountType());
			$this->setStatus($user->getStatus());
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
}
