<?php

namespace tapeplay\server\model;

class VideoSummary
{
	public static function create($arr)
	{
		$videoSummary = new VideoSummary();

		/*$user->setId($arr["first_name"]);
		$user->setPandaId($arr["last_name"]);
		$user->setTitle($arr["position"]);
		$user->setUploadDate($arr["height"]);
		$user->setRecordedMonth($arr["recorded_month"]);
		$user->setRecordedYear($arr["recorded_year"]);*/

		return $videoSummary;
	}

	public function setFirstName($firstName)
	{
		$this->_firstName = $firstName;
	}

	public function getFirstName()
	{
		return $this->_firstName;
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

	public function setLastName($lastName)
	{
		$this->_lastName = $lastName;
	}

	public function getLastName()
	{
		return $this->_lastName;
	}

	public function setPosition($position)
	{
		$this->_position = $position;
	}

	public function getPosition()
	{
		return $this->_position;
	}

	public function setVideoId($videoId)
	{
		$this->_videoId = $videoId;
	}

	public function getVideoId()
	{
		return $this->_videoId;
	}

	public function setVideoImage($videoImage)
	{
		$this->_videoImage = $videoImage;
	}

	public function getVideoImage()
	{
		return $this->_videoImage;
	}

	public function setVideoMonth($videoMonth)
	{
		$this->_videoMonth = $videoMonth;
	}

	public function getVideoMonth()
	{
		return $this->_videoMonth;
	}

	public function setVideoYear($videoYear)
	{
		$this->_videoYear = $videoYear;
	}

	public function getVideoYear()
	{
		return $this->_videoYear;
	}

	private $_id;
	private $_firstName;
	private $_lastName;
	private $_position;
	private $_height;
	private $_videoMonth;
	private $_videoYear;
	private $_videoImage;
	private $_videoId;

}

?>