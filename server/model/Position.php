<?php

namespace tapeplay\server\model;

class Position
{
	public static function create($arr)
	{
		$position = new Position();

		$position->setId($arr["id"]);
		$position->setName($arr["name"]);

		return $position;
	}

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
