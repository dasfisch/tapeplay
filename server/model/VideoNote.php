<?php

namespace tapeplay\server\model;

class VideoNote
{
	public static function create($arr)
	{
		$video = new Video();

		return $video;
	}

	private $_id;


	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}
}

?>