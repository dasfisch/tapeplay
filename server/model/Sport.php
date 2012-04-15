<?php

namespace tapeplay\server\model;

class Sport
{
	private $id;
	private $sportName;
	private $active;

	public function setSportName($sportName)
	{
		$this->sportName = $sportName;
	}

	public function getSportName()
	{
		return $this->sportName;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setActive($active)
	{
		$this->active = $active;
	}

	public function getActive()
	{
		return $this->active;
	}
}
