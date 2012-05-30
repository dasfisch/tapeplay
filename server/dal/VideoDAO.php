<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Video.php");
require_once("model/SearchFilter.php");

use tapeplay\server\model\Video;
use tapeplay\server\model\SearchFilter;

class VideoDAO extends BaseDOA
{
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
	 * @param \tapeplay\server\model\Video $video Video that we want to save
	 * @return \tapeplay\server\model\Video Returns video with new id
	 */
	public function insertVideo(Video $video)
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

	public function insertVideoSave($userId, $videoId)
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

	public function insertVideoView($userId, $videoId)
	{
		$this->sql = "INSERT INTO video_views " .
				"(user_id, video_id)" .
				" VALUES " .
				"(:userId, :videoID)";

		$this->prep = $this->dbh->prepare($this->sql);

		$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

		$this->prep->execute();
	}

	/**
	 * Searches the videos for any videos matching the criteria set within the passed filter.
	 * @param \tapeplay\server\model\SearchFilter $filter
	 * @return array The list of videos that match the filter.
	 */
	public function search(SearchFilter $filter)
	{

	}

	/**
	 * @param $userID int The user of the scout or coach
	 * @returns array<\tapeplay\server\model\Video>
	 */
	public function getSavedVideos($userID)
	{

	}

}

?>