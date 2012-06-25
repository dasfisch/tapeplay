<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Video.php");
require_once("model/VideoSummary.php");
require_once("model/SearchFilter.php");

use tapeplay\server\model\Video;
use tapeplay\server\model\VideoSummary;
use tapeplay\server\model\SearchFilter;

class VideoDAO extends BaseDOA
{
	/**
	 * Retrieves a video that has an id that matches the incoming id.
	 * @param $videoId int The requested video's id.
	 * @return \tapeplay\server\model\Video The video that matches the requested id.
	 */
	public function get($videoId)
	{
		$this->sql = "SELECT *, " .
				"(SELECT COUNT(*) FROM video_views WHERE video_id = :videoId) as views, " .
				"(SELECT COUNT(*) FROM video_saves WHERE video_id = :videoId) as saves " .
				"FROM videos " .
				"WHERE id = :videoId";

		print $this->sql;
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

		$this->prep->execute();

		$loadedVideo = new Video();
		$loadedVideo = Video::create($this->prep->fetch());

		return $loadedVideo;
	}

	/**
	 * @param $playerId int The player id
	 * @return array|null The list of videos that this player has uploaded
	 */
	public function getPlayerVideos($playerId)
	{
		try
		{
			$this->sql = "SELECT * FROM videos v INNER JOIN player_videos pv ON v.id = pv.video_id WHERE pv.player_id = :playerId";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		$videoList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($videoList, Video::create($row));
		}

		return $videoList;
	}

	/**
	 * Inserts a video into db and returns the video with its new id.
	 * @param \tapeplay\server\model\Video $video Video that we want to save
	 * @return \tapeplay\server\model\Video Returns video with new id
	 */
	public function insert(Video $video)
	{
		$this->sql = "INSERT INTO videos " .
				"(panda_id, title, uploaded_date, recorded_month, recorded_year, active)" .
				" VALUES " .
				"(:pandaId, :title, :uploadDate, :recordedMonth, :recordedYear, :active)";

		print $this->sql;
		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":pandaId", $video->getPandaId(), \PDO::PARAM_STR);
		$this->prep->bindValue(":title", $video->getTitle(), \PDO::PARAM_STR);
		$this->prep->bindValue(":uploadDate", $video->getUploadDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":recordedMonth", $video->getRecordedMonth(), \PDO::PARAM_INT);
		$this->prep->bindValue(":recordedYear", $video->getRecordedYear(), \PDO::PARAM_INT);
		$this->prep->bindValue(":active", $video->getActive(), \PDO::PARAM_BOOL);

		$this->prep->execute();

		$video->setId(($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1);

		return $video;
	}

	public function remove($id)
	{

	}

	/**
	 * Inserts a save from a user.
	 * @param $userId int The user who saved the video.
	 * @param $videoId int The video that was saved.
	 * @returns int The number of rows affected (should be 1)
	 */
	public function insertSave($userId, $videoId)
	{
		$this->sql = "INSERT INTO video_saves " .
				"(user_id, video_id)" .
				" VALUES " .
				"(:userId, :videoID)";

		$this->prep = $this->dbh->prepare($this->sql);

		$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

		$this->prep->execute();
	}

	/**
	 * Inserts a view from a user.
	 * @param $userId int The user who viewed the video.
	 * @param $videoId int The video that was viewed.
	 * @returns int The number of rows affected (should be 1)
	 */
	public function insertView($userId, $videoId)
	{
		$this->sql = "INSERT INTO video_views " .
				"(user_id, video_id)" .
				" VALUES " .
				"(:userId, :videoID)";

		$this->prep = $this->dbh->prepare($this->sql);

		$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

		$this->prep->execute();

		return $this->prep->rowCount();
	}


	/**
	 * Searches the videos for any videos matching the criteria set within the passed filter.
	 * @param \tapeplay\server\model\SearchFilter $filter
	 * @return array The list of videos that match the filter.
	 */
	public function search(SearchFilter $filter)
	{
		try
		{
			$this->sql = "SELECT * FROM videos";
			$this->prep = $this->dbh->prepare($this->sql);
			//$this->prep->bindValue(":id", $id, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		$videoList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($videoList, Video::create($row));
		}

		return $videoList;
	}

	/**
	 * Retrieves all videos saved by the requested user.
	 * @param $userId int The coach or scout user id.
	 * @return array|null The list of videos that the requested user has saved.
	 */
	public function getSavedVideos($userId)
	{
		try
		{
			$this->sql = "SELECT * FROM videos v INNER JOIN video_saves vs ON v.id = vs.video_id WHERE vs.user_id = :userId";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		$videoList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($videoList, Video::create($row));
		}

		return $videoList;
	}

	/**
	 * Retrieves all videos viewed by the requested user.
	 * @param $userId int The user of the scout or coach
	 * @return array|null The list of videos saved for this player
	 */
	public function getViewedVideos($userId)
	{
		try
		{
			$this->sql = "SELECT * FROM videos v INNER JOIN video_saves vs ON v.id = vs.video_id WHERE vs.user_id = :userId";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		$videoList = array();
		while ($row = $this->prep->fetch())
		{
			array_push($videoList, Video::create($row));
		}

		return $videoList;
	}
}

?>