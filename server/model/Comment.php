<?php

namespace tapeplay\server\model;

class Comment
{
	public static function create($arr)
	{
		$comment = new Comment();

		$comment->setId($arr["id"]);
		$comment->setComment($arr["comment"]);
		$comment->setCreatedDate($arr["created_date"]);
		$comment->setPostedDate($arr["posted_date"]);
		$comment->setVideoId($arr["video_id"]);
		$comment->setUserId($arr["user_id"]);

		return $comment;
	}

	private $_id;
	private $_comment;
	private $_createdDate;
	private $_postedDate;
	private $_videoId;
	private $_userId;

	public function setUserId($account)
	{
		$this->_userId = $account;
	}

	public function getUserId()
	{
		return $this->_userId;
	}

	public function setComment($comment)
	{
		$this->_comment = $comment;
	}

	public function getComment()
	{
		return $this->_comment;
	}

	public function setCreatedDate($createdDate)
	{
		$this->_createdDate = $createdDate;
	}

	public function getCreatedDate()
	{
		return $this->_createdDate;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setPostedDate($postedDate)
	{
		$this->_postedDate = $postedDate;
	}

	public function getPostedDate()
	{
		return $this->_postedDate;
	}

	public function setVideoId($video)
	{
		$this->_videoId = $video;
	}

	public function getVideoId()
	{
		return $this->_videoId;
	}
}
