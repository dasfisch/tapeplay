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

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }
}

//    {if $player->getGradeLevel() < 13}
//        <h4>Hs</h4>
//        <p>High School Athlete</p>
//    {elseif $player->getGradeLevel() <= 17}
//        <h4>Co</h4>
//        <p>College Athlete</p>
//    {else}
//        <h4>Pr</h4>
//        <p>Professional Athlete</p>
//    {/if}