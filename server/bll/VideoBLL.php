<?php

namespace tapeplay\server\bll;

require_once("bll/BaseBLL.php");
require_once("dal/VideoDAO.php");
require_once("model/Video.php");

use tapeplay\server\dal\VideoDAO;
use tapeplay\server\model\Video;

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
	function insert(Video $video)
	{
		return $this->dal->insert($video);
	}
}
