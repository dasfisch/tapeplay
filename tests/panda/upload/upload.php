<?php

require_once("enum/PandaVerbTypes.php");
require_once("bll/Panda.php");
require_once("bll/VideoBLL.php");
require_once("model/Video.php");

use tapeplay\server\bll\Panda;
use tapeplay\server\bll\VideoBLL;
use tapeplay\server\model\Video;

// The details of your Panda account
$panda = new Panda();

print "processed=" . $_POST["processed"];
if ($_POST["processed"] == "1")
{
	$video = new Video();
	$video->setId(-1);
	$video->setPandaId($_POST["panda_video_id"]);
	$video->setTitle($_POST["videoTitle"]);
	$video->setRecordedMonth($_POST["recordedMonth"]);
	$video->setRecordedYear($_POST["recordedYear"]);
	$video->setUploadDate(time());
	$video->setActive(true);

	$videoBLL = new VideoBLL();
	$video = $videoBLL->insert($video);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<title>Panda - Upload Test</title>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery.panda.min.js"></script>

	<script type="text/javascript">

		// grabs cloud_id, access_key, and secret_key for Panda
		var panda_access_details = <?php echo json_encode(@$panda->signed_params(PandaVerbTypes::$POST, "/videos.json", array())); ?>;

		// set options for <widget> parameter below
		var html_5_options = {};
		var flash_options = {button_image_url : "/tests/panda/upload/assets/choose_file_button.png"};

		function uploadSuccessful_Handler()
		{
			alert("Yay! Video ID " + $('input[id=returned_video_id]').val() + " uploaded...");

			// disable the submit button
			$("input[id=submitButton]").removeAttr("disabled");
		}

		function newFileSelected_Handler()
		{
			// need to hide upload inputs
			$("#uploadInputs").css("visibility", "hidden");
		}

	</script>
</head>
<body>

<p>Upload your video now.</p>

<form id="uploadForm" action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">

	<input type="hidden" id="processed" name="processed" value="1"/>

	<div id="progressMeter" class="panda_upload_progress"></div>

	<div id="uploadInputs">

		<!-- file selector -->
		<span id="upload_button"></span>

		<!-- filename of the selected file (optional) -->
		<input type="hidden" id="upload_filename" class="panda_upload_filename" disabled="disabled"/>

		<!-- field where the video ID will be stored after the upload -->
		<input type="hidden" id="returned_video_id" name="panda_video_id"/>

		<script type="text/javascript">
			// creates the uploader component with the customized options
			jQuery("#returned_video_id").pandaUploader(panda_access_details, {
				onsuccess:uploadSuccessful_Handler,
				onchange:newFileSelected_Handler,
				upload_progress_id:'progressMeter',
				api_url:'<?php echo $panda->getAPIURL() ?>',
				uploader_dir:'.',
				upload_strategy:new PandaUploader.UploadOnSelect(),
				widget:new PandaUploader.SmartWidget(html_5_options, flash_options),
				allowed_extensions:['aac', 'avi', '3gp', 'flv', 'mov', 'mp3', 'mp4', 'mpeg', 'ogg', 'wav', 'webm', 'wma', 'wmv'],
				file_size_limit:'250MB'
			});
		</script>
	</div>

	<div>
		<label for="videoTitle">Video Title</label>
		<input type="text" id="videoTitle" name="videoTitle" size="25"/>
	</div>

	<div>
		<label for="recordedMonth">Month</label>
		<select id="recordedMonth" name="recordedYear">
			<option value="1">Jan</option>
			<option value="2">Feb</option>
			<option value="3">Mar</option>
			<option value="4">Apr</option>
			<option value="5">May</option>
			<option value="6">Jun</option>
			<option value="7">Jul</option>
			<option value="8">Aug</option>
			<option value="9">Sep</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
		</select>
	</div>

	<div>
		<label for="recordedYear">Year</label>
		<select id="recordedYear" name="recordedYear">
			<?php for ($i = date('Y', strtotime('now')); $i > 1980; $i--): ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
	</div>
	<div>
		<input id="submitButton" name="submitButton" type="button"
			   value="Continue"
			   onclick="document.getElementById('uploadForm').submit()"
			   disabled="disabled"/>
	</div>
</form>

</body>
</html>

