<?php

namespace tapeplay\server\model;

class Sport
{
	private $id;
	private $sportName;
	private $active;

    public function create($args) {
        $sport = new Sport();

        $sport->setSportName($args['name']);
        $sport->setId($args['id']);
        $sport->setActive($args['active']);

        return $sport;
    }

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
