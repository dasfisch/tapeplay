<?php

class PandaUtil
{

	//public static $S3_BUCKET_URL = "http://s3.amazonaws.com/tpvideos/";

	public static $VIDEO_TAG = <<<EOD
<video id="videoPlayer" width="{width}" height="{height}">
	{encodings}
</video>
EOD;


	public static $SOURCE_TAG = <<<EOD
<source src="{source}" type="{type}" />
EOD;

	public static $JW_PLAYER = <<<EOD
<script type='text/javascript'>
	jwplayer('videoPlayer').setup({
		modes: [
			{ type: "html5" },
			{ type: "flash", src: "/media/playback/player.swf" },
			{ type: "download" }],
		skin: "/media/playback/skin/tapeplayer.zip",
		dock: false,
		"controlbar.position": "over"
	});
</script>
EOD;

	public static function generateTimestamp()
	{
		// needs to be in format of YYYY-MM-DDTHH:MM:SS+00:00
		return date("Y-m-d\Th:i:sP");
	}
}
