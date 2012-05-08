<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Comment.php");

use tapeplay\server\model\Comment;

class CommentDAO extends BaseDOA
{
	function insert(Comment $comment)
	{
		$this->sql = "INSERT INTO comment (comment, created_date, posted_date, video_id, user_id)" .
				" VALUES " .
				" (:comment, :createdDate, :postedDate, :videoId, :userId)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":comment", $comment->getComment(), \PDO::PARAM_STR);
		$this->prep->bindValue(":createdDate", $comment->getCreatedDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":postedDate", $comment->getPostedDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":videoId", $comment->getVideoId(), \PDO::PARAM_INT);
		$this->prep->bindValue(":userId", $comment->getUserId(), \PDO::PARAM_INT);

		$this->prep->execute();

		$comment->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);

		return $comment;
	}

	/**
	 * @param $videoId
	 * @return array The list of comments associated with the given video
	 */
	function getCommentsForVideo($videoId)
	{
		$this->sql = "SELECT * FROM comments WHERE video_id = :videoId";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_STR);

		$this->prep->execute();

		$commentList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($commentList, Comment::create($row));
		}

		return $commentList;
	}

	/**
	 * @param $userId
	 * @return array The list of comments associated with the given user
	 */
	function getCommentsForUser($userId)
		{
			$this->sql = "SELECT * FROM comments WHERE user_id = :userId";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":userId", $userId, \PDO::PARAM_STR);

			$this->prep->execute();

			$commentList = array();
			while ($row = $this->prep->fetch())
			{
				array_push($commentList, Comment::create($row));
			}

			return $commentList;
		}
}
