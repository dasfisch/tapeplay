<?php

//all include, globals (not opposed to not using globals)
require_once("bll/VideoBLL.php");
require_once("model/Video.php");
require_once("model/VideoNote.php");
require_once("model/SearchFilter.php");

use tapeplay\server\bll\VideoBLL;
use tapeplay\server\model\Video;
use tapeplay\server\model\VideoNote;
use tapeplay\server\model\SearchFilter;

$bll = new VideoBLL();

$smarty = new Smarty();
$smarty->setTemplateDir("./templates");
$smarty->setConfigDir("./templates/config");
$smarty->setCacheDir("./templates/cache");
$smarty->setCompileDir("./templates/compile");

/**
 * This will be the catcher; part of the rewrite rules;
 *
 * The url will be like this:
 *      http://www.tapeplay.com/__CLASS__/__METHOD__/__ID__?params....
 *          eg: http://www.tapeplay.com/videos/view/23
 *              http://www.tapeplay.com/videos/view/23?utm=google.com&etc=soforth
 *              http://www.tapeplay.com/videos/notes
 *
 */
if (isset($_GET["method"]))
{
	switch ($_GET["method"])
	{
		case 'notes': // http://www.tapeplay.com/videos/notes
			/**
			 * Get video based on video_id; needs some validation;
			 * Get Notes based on video_id; needs some validation;
			 */

			$video = $bll->search($_GET["id"]);
			;

			//$smarty->assign('notes', $notes);
			$smarty->assign("video", $video);
			$smarty->display("videonotes.php");

			break;
		case 'upload': //http://www.tapeplay.com/videos/browse

			$smarty->display("videoupload.php");

			break;
		default: // http://www.tapeplay.com/videos/view
			/**
			 * Get first 20 videos (or whatever);
			 * Display them;
			 */
			$filter = new SearchFilter();
			$videos = $bll->search($filter);

			$smarty->assign("videos", $videos);
			$smarty->display("video.php");

			break;
	}
}
else
{
	/**
	 * If method isn't set, do a default action;
	 * I think that the best will be a basic view all.
	 */
}