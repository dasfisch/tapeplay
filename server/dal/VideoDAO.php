<?php

namespace tapeplay\server\dal;

require_once("dal/BaseDOA.php");
require_once("model/Video.php");
require_once("model/VideoSummary.php");
require_once("model/SearchFilter.php");

use tapeplay\server\model\Video;
use tapeplay\server\model\VideoSummary;
use tapeplay\server\model\SearchFilter;
use \Exception;

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
	 * @param $playerId int The player associated with this video
	 * @return \tapeplay\server\model\Video Returns video with new id
	 */
	public function insert(Video $video, $playerId)
	{
		$this->sql = "INSERT INTO videos " .
				"(panda_id, title, uploaded_date, recorded_month, recorded_year, active, player_id, sport_id)" .
				" VALUES " .
				"(:pandaId, :title, :uploadDate, :recordedMonth, :recordedYear, :active, :playerId, :sportId);";

//
//        echo '<pre>';
//        var_dump($video);
//        var_dump($playerId);
//        exit;

		$this->prep = $this->dbh->prepare($this->sql);
		$this->prep->bindValue(":pandaId", $video->getPandaId(), \PDO::PARAM_STR);
		$this->prep->bindValue(":title", $video->getTitle(), \PDO::PARAM_STR);
		$this->prep->bindValue(":uploadDate", $video->getUploadDate(), \PDO::PARAM_INT);
		$this->prep->bindValue(":recordedMonth", $video->getRecordedMonth(), \PDO::PARAM_INT);
		$this->prep->bindValue(":recordedYear", $video->getRecordedYear(), \PDO::PARAM_INT);
		$this->prep->bindValue(":active", $video->getActive(), \PDO::PARAM_BOOL);
        $this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
        $this->prep->bindValue(":sportId", $video->getSportId(), \PDO::PARAM_INT);

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
	public function insertSave($videoId, $userId)
	{
		$this->sql = "INSERT INTO video_saves " .
				"(user_id, video_id)" .
				" VALUES " .
				"(:userId, :videoId);";

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
	public function insertView($videoId, $userId = null)
	{
		$this->sql = "INSERT INTO video_views " .
				"(user_id, video_id)" .
				" VALUES " .
				"(:userId, :videoId);";

		$this->prep = $this->dbh->prepare($this->sql);

		$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

		$this->prep->execute();

		return $this->prep->rowCount();
	}

	/**
	 * Inserts a link for the incoming player and incoming video
	 * @param $videoId int
	 * @param $playerId int
	 * @return int The number of rows affected (should be 1)
	 */
	public function linkVideoToPlayer($videoId, $playerId)
	{
		$this->sql = "INSERT INTO player_videos" .
				" (player_id, video_id)" .
				" VALUES " .
				" (:playerId, :videoId);";

        $this->prep = $this->dbh->prepare($this->sql);
		$this->prep = $this->dbh->prepare($this->sql);

		$this->prep->bindValue(":playerId", $playerId, \PDO::PARAM_INT);
		$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

		$this->prep->execute();

		return $this->prep->rowCount();
	}


	/**
	 * Searches the videos for any videos matching the criteria set within the passed filter.
	 * @param \tapeplay\server\model\SearchFilter $filter
	 * @return array The list of videos that match the filter.
     *
     * @TODO: WE NEEDS TO ENSURE WE ARE DOING alias.column AS _aliasName_, otherwise we are getting
     * collision in PDO. Need to talk to Tony, asap.
	 */
	public function search(SearchFilter $filter)
	{
		try
		{
            $limit = $filter->limit;
            $page = $filter->page;

            $startLimit = ($page * $limit) - $limit;

            $where = !is_null($filter->getWhere()) ? $this->_setWhere($filter->getWhere()) : null;
            $like = !is_null($filter->getLike()) ? $this->_setLike($filter->getLike()) : null;

            if((isset($where) && $where != '') && isset($like) && $like != '') {
                $where.= ' AND ';
            }

			$this->sql = "SELECT
                                videos.*,
                                (SELECT COUNT(*) FROM videos ".$where." ".$like.") AS videoCount,
                                (SELECT COUNT(*) FROM video_views WHERE video_id = videos.id) AS views,
                                (SELECT COUNT(*) FROM video_saves WHERE video_id = videos.id) AS saves,
                                users.*,
                                players.*,
                                schools.id AS schoolId,
                                schools.name AS schoolName,
                                schools.city AS schoolCity,
                                schools.state AS schoolState,
                                schools.division AS schoolDivision,
                                sports.id AS sport_id,
                                sports.name AS sport_name,
                                sports.active AS sport_active
                            FROM
                                videos videos
                            JOIN
                                players players
                                    ON
                                        players.id=videos.player_id
                            JOIN
                                users users
                                    ON
                                        users.id=players.id
                            JOIN
                                sports sports
                                    ON
                                        sports.id=players.sport_id
                            JOIN
                                schools schools
                                    ON
                                        schools.id=players.school_id
                            LEFT JOIN
                                video_views view
                                    ON
                                        view.video_id=videos.id
                            LEFT JOIN
                                video_saves saves
                                    ON
                                        saves.video_id=videos.id
                            ".$where."
                            ".$like."
                            GROUP BY
                                videos.id
                            LIMIT ".$startLimit.",".$limit;

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
			$this->sql = "SELECT
			                    videos.id
                            FROM
                                videos videos
                            INNER JOIN
                                video_saves vs
                                    ON
                                        vs.video_id = videos.id
                            WHERE
                                vs.user_id = :userId";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

        $search = new SearchFilter();

        while($row = $this->prep->fetch()) {
            $ids[] = (int)$row['id'];
        }

        if(isset($ids) && count($ids) > 0) {
            $search->setWhere('videos.id', $ids);

            return $this->search($search);
        }

//		$videoList = array();
//		while ($row = $this->prep->fetch())
//		{
//			array_push($videoList, Video::create($row));
//		}
//
//		return $videoList;
	}

	/**
	 * @param $videoId
	 * @param $userId
	 */
	public function getOneSavedVideo($videoId, $userId)
	{
		try
		{
			$this->sql = "SELECT * FROM video_saves WHERE user_id=:userId AND video_id=:videoId";

			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":userId", $userId, \PDO::PARAM_INT);
			$this->prep->bindValue(":videoId", $videoId, \PDO::PARAM_INT);

			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		while ($row = $this->prep->fetch())
		{
			Throw new Exception('You have already saved this video!');
		}
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

	public function getUserEmailByPandaId($pandaId)
	{
		try
		{
			$this->sql = "select u.email from videos v INNER JOIN players p ON v.player_id = p.id INNER JOIN users u ON p.user_id = u.id WHERE v.panda_id = :pandaId";
			$this->prep = $this->dbh->prepare($this->sql);
			$this->prep->bindValue(":pandaId", $pandaId, \PDO::PARAM_STR);
			$this->prep->execute();
		}
		catch (\PDOException $exception)
		{
			\TPErrorHandling::handlePDOException($exception->errorInfo);
			return null;
		}

		$row = $this->prep->fetch();

		// return the email address
		return $row[0];
	}
}
