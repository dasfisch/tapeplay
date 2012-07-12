<?php

namespace tapeplay\server\model;
/**
 * Used to compile filter values that a user enters
 * when searching through the videos.
 */
class SearchFilter
{
	private $_playingLevel;
	private $_gradeLevel;
	private $_position;
	private $_height;
    private $_limit;
    private $_page;
    private $_userId;

    private $_like;
    private $_where;

    public function __construct() {
        $this->limit = 20;
        $this->page = 1;
    }

	public function setGradeLevel($gradeLevel)
	{
		$this->_gradeLevel = $gradeLevel;
	}

	public function getGradeLevel()
	{
		return $this->_gradeLevel;
	}

	public function setHeight($height)
	{
		$this->_height = $height;
	}

	public function getHeight()
	{
		return $this->_height;
	}

	public function setPlayingLevel($playingLevel)
	{
		$this->_playingLevel = $playingLevel;
	}

	public function getPlayingLevel()
	{
		return $this->_playingLevel;
	}

	public function setPosition($position)
	{
		$this->_position = $position;
	}

	public function getPosition()
	{
		return $this->_position;
	}

    public function getLike($key=null) {
        return (isset($key) && !empty($key)) ? $this->_like[$key] : $this->_like;
    }

    public function setLike($key, $value) {
        $this->_like[$key] = $value;
    }

    public function getWhere($key=null) {
        return (isset($key) && !empty($key)) ? $this->_where[$key] : $this->_where;
    }

    public function setWhere($key, $value) {
        $this->_where[$key] = $value;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }
}