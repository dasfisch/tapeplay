<?php

namespace tapeplay\server\model;

class Video
{
	private $_id;
	private $_pandaId;
	private $_title;
	private $_length;
	private $_recordedMonth;
	private $_recordedYear;
	private $_uploadDate;
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

	public function setPandaId($pandaId)
	{
		$this->_pandaId = $pandaId;
	}

	public function getPandaId()
	{
		return $this->_pandaId;
	}

	public function setLength($length)
	{
		$this->_length = $length;
	}

	public function getLength()
	{
		return $this->_length;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setRecordedMonth($uploadMonth)
	{
		$this->_recordedMonth = $uploadMonth;
	}

	public function getRecordedMonth()
	{
		return $this->_recordedMonth;
	}

	public function setRecordedYear($uploadYear)
	{
		$this->_recordedYear = $uploadYear;
	}

	public function getRecordedYear()
	{
		return $this->_recordedYear;
	}

	public function setViews($views)
	{
		$this->_views = $views;
	}

	public function getViews()
	{
		return $this->_views;
	}

	public function setUploadDate($uploaded)
	{
		$this->_uploadDate = $uploaded;
	}

	public function getUploadDate()
	{
		return $this->_uploadDate;
	}
}

?>