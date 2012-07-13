<?php

namespace tapeplay\server\bll;

require_once("bll/BaseBLL.php");
require_once("bll/Panda.php");
require_once("dal/VideoDAO.php");
require_once("utility/PandaUtil.php");
require_once("enum/PandaProfileTypes.php");

use tapeplay\server\bll\Panda;
use tapeplay\server\dal\VideoDAO;
use tapeplay\server\model\Video;
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
		$video = new Video();
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
		//return $this->dal->getPlayerVideos($playerId);

		$v1 = new VideoSummary();
		$v1->setFirstName("Michael");
		$v1->setLastName("Jordan");
		$v1->setPosition("SG");
		$v1->setHeight("6'6");
		$v1->setVideoImage("https://s3.amazonaws.com/tpvideosdev/ba5dc5411fa485fa43056f4f3e18d600_1.jpg");
		$v1->setVideoId("ba5dc5411fa485fa43056f4f3e18d600");

		$v2 = new VideoSummary();
		$v2->setFirstName("Scottie");
		$v2->setLastName("Pippen");
		$v2->setPosition("SF");
		$v2->setHeight("6'6");
		$v2->setVideoImage("https://s3.amazonaws.com/tpvideosdev/b93c9758c0865632b5f14ebec7802f88_3.jpg");
		$v2->setVideoId("b93c9758c0865632b5f14ebec7802f88");

		$arr = array($v1, $v2);

		return $arr;
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
	public function getFullVideoHTML($videoID)
	{
		$panda = new Panda();

		// grab the encodings from the REST resources
		$encodings = json_decode(@$panda->get("/videos/" . $videoID . "/encodings.json"));
        if(!isset($encodings) || empty($encodings) || $encodings == '') {
            return;
        }

		// get video width and height based on first encoding
		$width = $encodings[0]->width;
		$height = $encodings[0]->height;

		// grab mp4 webm, and ogg
		$sourceHTML = "";
		$sourceHTML .= $this->getEncoding($encodings, \PandaProfileTypes::$H264);
		$sourceHTML .= $this->getEncoding($encodings, \PandaProfileTypes::$WEBM);
		$sourceHTML .= $this->getEncoding($encodings, \PandaProfileTypes::$OGG);

		// insert video attributes and source into video tag
		$html = \PandaUtil::$VIDEO_TAG;
		$html = str_replace("{encodings}", $sourceHTML, $html);
		$html = str_replace("{width}", $width, $html);
		$html = str_replace("{height}", $height, $html);

		// grab the jquery call to the jwplayer
		$js = \PandaUtil::$JW_PLAYER;

		return $html . $js;
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
		$html = "";

		// loop through encodings and get the correct match
		foreach ($encodings as $encoding)
		{
			if ($encoding->profile_name == $type)
			{
				// get default template for the source tag
				$html = \PandaUtil::$SOURCE_TAG;

				// place the video location here
				$html = str_replace("{source}", \PandaUtil::$S3_BUCKET_URL . $encoding->path . $encoding->extname, $html);

				// remove the "." from the extension and add extension
				$html = str_replace("{type}", $encoding->mime_type, $html);

				break;
			}
		}

		return $html;
	}
}
