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
}
