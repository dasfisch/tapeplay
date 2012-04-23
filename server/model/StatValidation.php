<?php

namespace tapeplay\server\model;

class StatValidation
{
	private $id;
	private $validationName;
	private $regex;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setRegex($regex)
	{
		$this->regex = $regex;
	}

	public function getRegex()
	{
		return $this->regex;
	}

	public function setValidationName($validationName)
	{
		$this->validationName = $validationName;
	}

	public function getValidationName()
	{
		return $this->validationName;
	}
}
