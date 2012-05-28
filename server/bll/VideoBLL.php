<?php

namespace tapeplay\server\bll;

require_once("bll/BaseBLL.php");
require_once("bll/Panda.php");
require_once("dal/VideoDAO.php");
require_once("model/Video.php");
require_once("utility/PandaUtil.php");
require_once("enum/PandaProfileTypes.php");

use tapeplay\server\dal\VideoDAO;
use tapeplay\server\model\Video;
use tapeplay\server\bll\Panda;

class VideoBLL extends BaseBLL
{

	function __construct()
	{
		$this->dal = new VideoDAO();
	}

	/**
	 * @param \tapeplay\server\model\Video $video The video that needs to be inserted
	 * @return int The id of the video that was inserted.  -1 if insert fails
	 */
	public function insert(Video $video)
	{
		return $this->dal->insert($video);
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
