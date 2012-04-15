<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Video.php");
require_once("model/SearchFilter.php");

use tapeplay\server\model\Video;
use tapeplay\server\model\SearchFilter;

class VideoDAO extends BaseDOA
{
	public function get($id)
	{

	}

	public function insert(Video $video)
	{
		$this->sql = "INSERT INTO videos " .
					 "(url_code, base_file_name, title, length, uploaded, recorded, thumbnail_id, views, active)" .
					 " VALUES " .
				 	 "(:urlCode, :baseFileName, :title, :length, :uploaded, :recorded, :thumbnailID, :views, :active)";

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":urlCode", $video->getUrlCode(), \PDO::PARAM_STR);
		$this->prep->bindValue(":baseFileName", $video->getBaseFileName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":title", $video->getTitle(), \PDO::PARAM_STR);
		$this->prep->bindValue(":length", $video->getLength(), \PDO::PARAM_INT);
		$this->prep->bindValue(":uploaded", $video->getUploaded(), \PDO::PARAM_INT);
		$this->prep->bindValue(":recorded", $video->getRecorded(), \PDO::PARAM_INT);
		$this->prep->bindValue(":thumbnailID", $video->getThumbnailFileName(), \PDO::PARAM_STR);
		$this->prep->bindValue(":views", $video->getViews(), \PDO::PARAM_INT);
		$this->prep->bindValue(":active", $video->getActive(), \PDO::PARAM_BOOL);

		$this->prep->execute();

		return ($this->prep->rowCount() > 0) ? $this->dbh->lastInsertId() : -1;
	}

	public function remove($id)
	{

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
	 * @param $userID The user of the scout or coach
	 * @returns array<\tapeplay\server\model\Video>
	 */
	public function getSavedVideos($userID)
	{

	}

}

?>