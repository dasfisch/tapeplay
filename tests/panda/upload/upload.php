<?php

require_once("enum/PandaVerbTypes.php");
require_once("bll/Panda.php");

use tapeplay\server\bll\Panda;

// The details of your Panda account
$panda = new Panda();

// The S3 bucket where your Panda cloud has been told to store encoded videos
$s3_bucket_name = "tpvideo";

// You may want to change this to your own timezone,
date_default_timezone_set('UTC');

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Panda - Upload Test</title>
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.panda.min.js"></script>
</head>
<body>

<p>Upload your video</p>

<form action="../player.php">
	<!-- file selector -->
	<span id="upload_button"></span>

	<!-- filename of the selected file (optional) -->
	<input type="text" id="upload_filename" class="panda_upload_filename" disabled="true"/>

	<!-- upload progress bar (optional) -->
	<div id="progressMeter" class="panda_upload_progress"></div>

	<!-- field where the video ID will be stored after the upload -->
	<input type="hidden" name="panda_video_id" id="returned_video_id"/>

	<!-- a submit button -->
	<p><input type="submit" value="Upload video"/></p>

	<script>
		// grabs cloud_id, access_key, and secret_key for Panda
		var panda_access_details = <?php echo json_encode(@$panda->signed_params(PandaVerbTypes::$POST, "/videos.json", array())); ?>;

		// set options for <widget> parameter below
		var html_5_options = {};
		var flash_options = {};

		// creates the uploader component with the customized options
		jQuery("#returned_video_id").pandaUploader(panda_access_details, {
			onsuccess: function() { alert("File uploaded successfully");},
			upload_progress_id:'progressMeter',
			api_url:'<?php echo $panda->getAPIURL() ?>',
			uploader_dir:'.',
			upload_strategy: new PandaUploader.UploadOnSubmit({disable_submit_button: true}),
			widget: new PandaUploader.SmartWidget(html_5_options, flash_options),
			allowed_extensions: ['aac', 'avi', '3gp', 'flv', 'mov', 'mp3', 'mp4', 'mpeg', 'ogg', 'wav', 'webm', 'wma', 'wmv'],
			file_size_limit: '250MB'
		});
	</script>
</form>

</body>
</html>

