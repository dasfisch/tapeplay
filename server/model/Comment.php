<?php

namespace tapeplay\server\model;

class Comment
{
	private $id;
	private $comment;
	private $createdDate;
	private $postedDate;
	private $video;
	private $user;

	public function setUser($account)
	{
		$this->user = $account;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setComment($comment)
	{
		$this->comment = $comment;
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function setCreatedDate($createdDate)
	{
		$this->createdDate = $createdDate;
	}

	public function getCreatedDate()
	{
		return $this->createdDate;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setPostedDate($postedDate)
	{
		$this->postedDate = $postedDate;
	}

	public function getPostedDate()
	{
		return $this->postedDate;
	}

	public function setVideo($video)
	{
		$this->video = $video;
	}

	public function getVideo()
	{
		return $this->video;
	}
}
