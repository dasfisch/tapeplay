<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Comment.php");

use tapeplay\server\model\Comment;

class CommentDAO extends BaseDOA
{
	function insert(Comment $comment)
	{
		$this->sql = "INSERT INTO comment (comment, created_date, posted_date, video_id, user_id) VALUES (:comment, :created_date, :posted_date, :video_id, :user_id)";
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep>execute(array($comment));

		/*$this->prep->bindValue(":comment", $player->getNumber(), \PDO::PARAM_STR);
		$this->prep->bindValue(":created_date", $player->getGuardianSignup(), \PDO::PARAM_INT);
		$this->prep->bindValue(":posted_date", $player->getSchoolName(), \PDO::PARAM_INT);
		$this->prep->bindValue(":video_id", $player->getHeight(), \PDO::PARAM_INT);
		$this->prep->bindValue(":user_id", $player->getGradeLevel(), \PDO::PARAM_INT);

		$this->prep->execute();*/
	}
}
