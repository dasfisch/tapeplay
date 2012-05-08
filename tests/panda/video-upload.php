<?php

require_once("bll/Panda.php");

use tapeplay\server\bll\Panda;

// The details of your Panda account
$panda = new Panda(array(
	'api_host' => 'api.pandastream.com', // Use api.eu.pandastream.com if your account is in the EU
	'cloud_id' => 'd4a9dbbf62283685c237bc487936a06c',
	'access_key' => '2ab6113b810253bfc761',
	'secret_key' => '423c86a2837251d5e713',
));

// The S3 bucket where your Panda cloud has been told to store encoded videos
$s3_bucket_name = "tapeplay";

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

<form action="player.php">
	<!-- file selector -->
	<span id="upload_button"></span>

	<!-- filename of the selected file (optional) -->
	<input type="text" id="upload_filename" class="panda_upload_filename" disabled="true"/>

	<!-- upload progress bar (optional) -->
	<div id="upload_progress" class="panda_upload_progress"></div>

	<!-- field where the video ID will be stored after the upload -->
	<input type="hidden" name="panda_video_id" id="returned_video_id"/>

	<!-- a submit button -->
	<p><input type="submit" value="Upload video"/></p>

	<script>
		var panda_access_details = <?php echo json_encode(@$panda->signed_params("POST", "/videos.json", array())); ?>;
		jQuery("#returned_video_id").pandaUploader(panda_access_details, {
			upload_progress_id:'upload_progress',
			api_url:'<?php echo $panda->getAPIURL() ?>',
			uploader_dir:'/tests/panda/temp' // This is the default value
		});
	</script>
</form>

</body>
</html>

