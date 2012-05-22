<?php

class PandaUtil
{

	public static $S3_BUCKET_URL = "http://s3.amazonaws.com/tpvideosdev/";

	public static $VIDEO_TAG = "<video id='videoPlayer' width='{width}' height='{height}'>{encodings}></video>";
	public static $SOURCE_TAG = "<source src='{source}' type='{type}' />";
	public static $JW_PLAYER = "<script type='text/javascript'>jwplayer('videoPlayer').setup({ flashplayer:'/media/playback/player.swf'});</script>";

	public static function generateTimestamp()
	{
		// needs to be in format of YYYY-MM-DDTHH:MM:SS+00:00
		return date("Y-m-d\Th:i:sP");
	}
}
