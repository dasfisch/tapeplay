<?php

namespace tapeplay\server\model;


class Scout
{
	private $_id;
	private $_organization;
	private $_title;
	private $_recrutingLevel;
	private $_user;

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setOrganization($organization)
	{
		$this->_organization = $organization;
	}

	public function getOrganization()
	{
		return $this->_organization;
	}

	public function setRecrutingLevel($recrutingLevel)
	{
		$this->_recrutingLevel = $recrutingLevel;
	}

	public function getRecrutingLevel()
	{
		return $this->_recrutingLevel;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setUser(User $user)
	{
		$this->_user = $user;
	}

	public function getUser()
	{
		return $this->_user;
	}
}
