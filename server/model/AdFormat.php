<?php

namespace tapeplay\server\model;

class AdFormat
{
	private $_id;
	private $_description;
	private $_width;
	private $_height;

	public function setDescription($description)
	{
		$this->_description = $description;
	}

	public function getDescription()
	{
		return $this->_description;
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

	public function setWidth($width)
	{
		$this->_width = $width;
	}

	public function getWidth()
	{
		return $this->_width;
	}
}
