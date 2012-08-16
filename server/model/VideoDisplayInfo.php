<?php

namespace tapeplay\server\model;

class VideoDisplayInfo
{
	public static function create($arr)
	{
		$videoDisplayInfo = new VideoDisplayInfo();

		/*$user->setId($arr["first_name"]);
		$user->setPandaId($arr["last_name"]);
		$user->setTitle($arr["position"]);
		$user->setUploadDate($arr["height"]);
		$user->setRecordedMonth($arr["recorded_month"]);
		$user->setRecordedYear($arr["recorded_year"]);*/

		return $videoDisplayInfo;
	}

	public function setHeight($height)
	{
		$this->_height = $height;
	}

	public function getHeight()
	{
		return $this->_height;
	}

	public function setMp4Source($mp4Source)
	{
		$this->_mp4Source = $mp4Source;
	}

	public function getMp4Source()
	{
		return $this->_mp4Source;
	}

	public function setOggSource($oggSource)
	{
		$this->_oggSource = $oggSource;
	}

	public function getOggSource()
	{
		return $this->_oggSource;
	}

	public function setWebmSource($webmSource)
	{
		$this->_webmSource = $webmSource;
	}

	public function getWebmSource()
	{
		return $this->_webmSource;
	}

	public function setWidth($width)
	{
		$this->_width = $width;
	}

	public function getWidth()
	{
		return $this->_width;
	}

	private $_width;
	private $_height;
	private $_mp4Source;
	private $_webmSource;
	private $_oggSource;



}

?>