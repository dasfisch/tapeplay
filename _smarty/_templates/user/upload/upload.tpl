<div id="main">
	<h2>Video File Upload</h2>

	<p class="uploadNote">
		<span class="bold">For professional recruits</span>, upload highlight tapes,
		game footage, and so on. Whatever makes you look good.
	</p>

	<p class="uploadNote last">
		<span class="bold">For college recruits</span>, you have to adhere to the NCAA
		rules. That means you must only upload videos of regularly scheduled (regular
		season) game footage. Stay away from backyard footage - street games, summer
		leagues, etc.
	</p>

	<form id="uploadForm" name="login" action="{$baseUrl}/user/upload/" method="post">
		<div id="progressMeter" class="panda_upload_progress"></div>
		<div id="uploadInputs" class="input">
			<!-- file selector -->
			<div id="upload_button"></div>

			<!-- filename of the selected file (optional) -->
			<input type="hidden" id="upload_filename" class="panda_upload_filename" disabled="disabled"/>

			<!-- field where the video ID will be stored after the upload -->
			<input type="hidden" id="returned_video_id" name="panda_video_id"/>

			<p class="asterisk error">*</p>

			<p class="error">
				We're sorry but you cannot upload this type of file. Video files must be AAC,
				AVI, 3GP, MOV, MP3, MP4, MPEG, OGG, WAV, WEBM, WMA, or WMV.
			</p>

			<script type="text/javascript">

				// grabs cloud_id, access_key, and secret_key for Panda
				var panda_access_details = {$pandaAccessDetails};

				// set options for <widget> parameter below
				var html_5_options = {};
				var flash_options = {};

				function uploadSuccessful_Handler()
				{
					alert("Yay! Video ID " + $('input[id=returned_video_id]').val() + " uploaded...");

					// enable the submit button
					$("input[id=submitButton]").removeAttr("disabled");
				}

				function newFileSelected_Handler()
				{
					// need to hide upload inputs
					$("#uploadInputs").css("visibility", "hidden");
				}

				// creates the uploader component with the customized options
				jQuery("#returned_video_id").pandaUploader(panda_access_details, {
					onsuccess:uploadSuccessful_Handler,
					onchange:newFileSelected_Handler,
					upload_progress_id:'progressMeter',
					api_url:'{$APIURL}',
					uploader_dir:'.',
					upload_strategy:new PandaUploader.UploadOnSelect(),
					widget:new PandaUploader.SmartWidget(html_5_options, flash_options),
					allowed_extensions:['aac', 'avi', '3gp', 'flv', 'mov', 'mp3', 'mp4', 'mpeg', 'ogg', 'wav', 'webm', 'wma', 'wmv'],
					file_size_limit:'250MB'
				});
			</script>
		</div>
		<div class="input lessPadding">
			<p>
				<a>Examples of video titles</a>
			</p>

			<div class="inputField">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="title" name="title" value="Video Title"/>
				</div>
				<div class="right"></div>
			</div>
		</div>
		<div class="input">
			<div class="sportSelect">
				<div class="dropper">
					<div class="leftMedium"></div>
					<div class="middleMedium middle">
						<p class="value">Video Month</p>
					</div>
					<div class="rightMedium"></div>
					<ul class="potentials">
						<li>January</li>
						<li>February</li>
						<li>March</li>
						<li>April</li>
						<li>May</li>
						<li>June</li>
						<li>July</li>
						<li>August</li>
						<li>September</li>
						<li>October</li>
						<li>November</li>
						<li>December</li>
					</ul>
				</div>
				<div class="arrowSmall"></div>
			</div>
			<div class="sportSelect">
				<div class="dropper">
					<div class="leftMedium"></div>
					<div class="middleMedium middle">
						<p class="value">Video Year</p>
					</div>
					<div class="rightMedium"></div>
					<ul class="potentials">
						{$videoYears}
					</ul>
				</div>
				<div class="arrowSmall"></div>
			</div>
		</div>
		<div class="bigButton black">
			<div class="topLeft whiteBg"></div>
			<div class="topRight whiteBg"></div>
			<div class="bottomLeft whiteBg"></div>
			<div class="bottomRight whiteBg"></div>
			<div class="middle">
				<input type="submit" value="Upload" id="submitButton" name="submitButton" class="large black"
					   disabled="disabled"/>
			</div>
		</div>
		<div class="option step">
			Step 2 of 3
		</div>
	</form>
</div>
<div id="ad">
	ad
</div>