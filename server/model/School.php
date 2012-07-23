<?php

namespace tapeplay\server\model;

class School
{
	public static function create($arr)
	{
		$school = new School();

		$school->setId($arr["id"]);
		$school->setName($arr["name"]);
		$school->setCity($arr["city"]);
		$school->setState($arr["state"]);
		$school->setDivision($arr["division"]);

		return $school;
	}

	private $id;
	private $name;
	private $city;
	private $state;
	private $division;

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function setDivision($division)
	{
		$this->division = $division;
	}

	public function getDivision()
	{
		return $this->division;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}

    public function encodeJSON()
    {
        foreach ($this as $key => $value)
        {
            $json->$key = $value;
        }

        return $json;
    }

    public function __isset($name) {
        return isset($this->$name);
    }
}
