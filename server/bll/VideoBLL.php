<?php

namespace tapeplay\server\bll;

require_once("bll/BaseBLL.php");
require_once("bll/Panda.php");
require_once("dal/VideoDAO.php");
require_once("model/VideoDisplayInfo.php");
require_once("utility/PandaUtil.php");
require_once("enum/PandaProfileTypes.php");

use tapeplay\server\bll\Panda;
use tapeplay\server\dal\VideoDAO;
use tapeplay\server\model\Video;
use tapeplay\server\model\VideoDisplayInfo;
use tapeplay\server\model\VideoSummary;
use tapeplay\server\model\SearchFilter;

class VideoBLL extends BaseBLL
{

	function __construct()
	{
		$this->dal = new VideoDAO();
	}

	/**
	 * Fetches a video based on the id passed in.
	 * @param $videoId int the id of the video we need to retrieve
	 * @return \tapeplay\server\model\Video The video that matches the id
	 */
	public function get($videoId)
	{
		$video = $this->dal->get($videoId);

		return $video;
	}

	/**
	 * Returns the videos associated with player id passed in.
	 * @param $playerId int The player id
	 * @return array|null The list of videos that this player has uploaded
	 */
	public function getPlayerVideos($playerId)
	{
		return $this->dal->getPlayerVideos($playerId);
	}

	/**
	 * Returns a list of videos that this user has viewed.
	 * @param $userId int The requested user.
	 * @return array|null The list of videos this user has saved.
	 */
	public function getVideoSaves($userId)
	{
		return $this->dal->getSavedVideos($userId);
	}

	/**
	 * Returns the list of videos that this user has viewed.
	 * @param $userId int The requested user.
	 * @return array|null The list of videos viewed by the user.
	 */
	public function getViewedVideos($userId)
	{
		return $this->dal->getViewedVideos($userId);
	}

	/**
	 * Searches the videos for any videos matching the criteria set within the passed filter.
	 * @param $filter \tapeplay\server\model\SearchFilter The filter to use for searching videos.
	 * @return array The list of videos that match the filter.
	 */
	public function search(SearchFilter $filter)
	{
		return $this->dal->search($filter);
	}

    public function getOne(SearchFilter $filter) {
        return $this->dal->search($filter);
    }

	/**
	 * @param \tapeplay\server\model\Video $video The video that needs to be inserted
	 * @param $playerId int The id of the player
	 * @return int The id of the video that was inserted.  -1 if insert fails
	 */
	public function insert(Video $video, $playerId)
	{
		$video = $this->dal->insert($video, $playerId);

		return $video;
	}

	/**
	 * Insert a record of the user saving the video.
	 * @param $userId int
	 * @param $videoId int
	 */
	public function insertSave($userId, $videoId)
	{
		$this->dal->insertSave($userId, $videoId);
	}

    public function removeSavedVideo($userId, $videoId) {
        $this->dal->removeSave($userId, $videoId);
    }

    public function checkForPreviousSave($videoId, $userId) {
        $this->dal->getOneSavedVideo($videoId, $userId);
    }

	/**
	 * Insert a record of the user viewing the video.
	 * @param $userId int
	 * @param $videoId int
	 */
    public function insertView($videoId, $userId=null)
   	{
   		$this->dal->insertView($videoId, $userId);
   	}

	/**
	 * Returns all HTML/JS necessary to display the video.
	 * @param $videoID string The Panda Video ID that we need to get the Amazon S3 encodings
	 * @return string The HTML that contains the HTML5 tag and JWPlayer JavaScript.
	 */
	public function getVideoDisplayInfo($videoID)
	{
		$panda = new Panda();

		// grab the encodings from the REST resources
		$encodings = json_decode(@$panda->get("/videos/" . $videoID . "/encodings.json"));
        if(!isset($encodings) || empty($encodings) || $encodings == '') {
            return;
        }

		$videoDisplayInfo = new VideoDisplayInfo();

        if(isset($encodings) && !isset($encodings->error)) {
            // set info we need to send to Smarty template for showing the video.
            $videoDisplayInfo->setWidth($encodings[0]->width);
            $videoDisplayInfo->setHeight($encodings[0]->height);
            $videoDisplayInfo->setMp4Source($this->getEncoding($encodings, \PandaProfileTypes::$H264));
            $videoDisplayInfo->setWebmSource($this->getEncoding($encodings, \PandaProfileTypes::$WEBM));
            $videoDisplayInfo->setOggSource($this->getEncoding($encodings, \PandaProfileTypes::$OGG));
        }

		return $videoDisplayInfo;
	}

	/**
	 * Returns the email address associated with the requested video id.
	 * @param $pandaId string The video id in question
	 * @return string The email of the user associated with this video
	 */
	public function getUserEmailByPandaId($pandaId)
	{
		return $this->dal->getUserEmailByPandaId($pandaId);
	}

	//////////////////////////////////////////////////////////
	// Private Methods
	//////////////////////////////////////////////////////////

	/**
	 * @param array $encodings The list of encodings retrieved for the video.
	 * @param $type string The name of the encoding that we want to retrieve.
	 * @return string The encoding that matches the requested one.
	 */
	private function getEncoding(array $encodings, $type)
	{
		$sourceUrl = "";

		// loop through encodings and get the correct match
		foreach ($encodings as $encoding)
		{
			if ($encoding->profile_name == $type)
			{
				$sourceUrl = \PandaUtil::$S3_BUCKET_URL . $encoding->path . $encoding->extname;

				break;
			}
		}

		return $sourceUrl;
	}

    public function deleteVideo($videoId) {
        return $this->dal->deleteVideo($videoId);
    }

    public function update(Video $video) {
        return $this->dal->update($video);
    }
}
