<?php

namespace tapeplay\server\model;

class Stat
{
	private $_id;
	private $_sport;
	private $_statName;
	private $_statValidation;
    private $_statValue;

    public function create($statistics) {
        $stat = new Stat();

        $stat->setId($statistics[1]);
        $stat->setSport($statistics['name']);
        $stat->setStatName($statistics['stat_name']);
        $stat->setStatValidation($statistics['regex']);
        $stat->setStatValue($statistics['value']);

        return $stat;
    }

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

    public function setSport($sport)
   	{
   		$this->_sport = $sport;
   	}

   	public function getSport()
   	{
   		return $this->_sport;
   	}

	public function setStatName($statName)
	{
		$this->_statName = $statName;
	}

	public function getStatName()
	{
		return $this->_statName;
	}

    public function setStatValidation($statValidation)
   	{
   		$this->_statValidation = $statValidation;
   	}

   	public function getStatValidation()
   	{
   		return $this->_statValidation;
   	}

    public function setStatValue($statistic)
   	{
   		$this->_statValue = $statistic;
   	}

   	public function getStatValue()
   	{
   		return $this->_statValue;
   	}
}
