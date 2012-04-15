<?php

namespace tapeplay\server\model;

class Player
{
	private $_id;
	private $_number;
	private $_guardianSignup;
	private $_schoolName;
	private $_position;
	private $_account;
	private $_gradeLevel;
	private $_height;
	private $_videoAccess;
	private $_playingLevel;
	private $_sport;
	private $_stats; // array<Stat>


	public function setAccount($account)
	{
		$this->_account = $account;
	}

	public function getAccount()
	{
		return $this->_account;
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

	public function setPlayingLevel($playingLevel)
	{
		$this->_playingLevel = $playingLevel;
	}

	public function getPlayingLevel()
	{
		return $this->_playingLevel;
	}

	public function setSchoolName($schoolName)
	{
		$this->_schoolName = $schoolName;
	}

	public function getSchoolName()
	{
		return $this->_schoolName;
	}

	public function setSport($sport)
	{
		$this->_sport = $sport;
	}

	public function getSport()
	{
		return $this->_sport;
	}

	public function setVideoAccess($videoAccess)
	{
		$this->_videoAccess = $videoAccess;
	}

	public function getVideoAccess()
	{
		return $this->_videoAccess;
	}

	public function setPosition($position)
	{
		$this->_position = $position;
	}

	public function getPosition()
	{
		return $this->_position;
	}

	public function setStats($stats)
	{
		$this->_stats = $stats;
	}

	public function getStats()
	{
		return $this->_stats;
	}
}
