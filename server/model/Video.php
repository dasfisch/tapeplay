<?php

namespace tapeplay\server\model;

class Video
{
	private $_id;
	private $_url_code;
	private $_baseFileName;
	private $_title;
	private $_length;
	private $_uploadMonth;
	private $_uploadYear;
	private $_uploaded;
	private $_recorded;
	private $_thumbnailFileName;
	private $_views;
	private $_active;
	private $_comments;


	public function setActive($active)
	{
		$this->_active = $active;
	}

	public function getActive()
	{
		return $this->_active;
	}

	public function setBaseFileName($baseFileName)
	{
		$this->_baseFileName = $baseFileName;
	}

	public function getBaseFileName()
	{
		return $this->_baseFileName;
	}

	public function setComments(array $comments)
	{
		$this->_comments = $comments;
	}

	public function getComments()
	{
		return $this->_comments;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setLength($length)
	{
		$this->_length = $length;
	}

	public function getLength()
	{
		return $this->_length;
	}

	public function setThumbnailFileName($thumbnailFileName)
	{
		$this->_thumbnailFileName = $thumbnailFileName;
	}

	public function getThumbnailFileName()
	{
		return $this->_thumbnailFileName;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setRecorded($uploadDate)
	{
		$this->_recorded = $uploadDate;
	}

	public function getRecorded()
	{
		return $this->_recorded;
	}

	public function setUploadMonth($uploadMonth)
	{
		$this->_uploadMonth = $uploadMonth;
	}

	public function getUploadMonth()
	{
		return $this->_uploadMonth;
	}

	public function setUploadYear($uploadYear)
	{
		$this->_uploadYear = $uploadYear;
	}

	public function getUploadYear()
	{
		return $this->_uploadYear;
	}

	public function setUrlCode($url_code)
	{
		$this->_url_code = $url_code;
	}

	public function getUrlCode()
	{
		return $this->_url_code;
	}

	public function setViews($views)
	{
		$this->_views = $views;
	}

	public function getViews()
	{
		return $this->_views;
	}

	public function setUploaded($uploaded)
	{
		$this->_uploaded = $uploaded;
	}

	public function getUploaded()
	{
		return $this->_uploaded;
	}
}

?>