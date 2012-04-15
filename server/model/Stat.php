<?php

namespace tapeplay\server\model;

class Stat
{
	private $id;
	private $sport;
	private $statName;
	private $statValidation;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setSport($sport)
	{
		$this->sport = $sport;
	}

	public function getSport()
	{
		return $this->sport;
	}

	public function setStatName($statName)
	{
		$this->statName = $statName;
	}

	public function getStatName()
	{
		return $this->statName;
	}

	public function setStatValidation($statValidation)
	{
		$this->statValidation = $statValidation;
	}

	public function getStatValidation()
	{
		return $this->statValidation;
	}
}
