<?php

namespace tapeplay\server\model;

class IDNamePair
{
	private $_id;
	private $_name;

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function getName()
	{
		return $this->_name;
	}
}
