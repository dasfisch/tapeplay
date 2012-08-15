<div id="main">
	<h2>Video File Upload</h2>

	<p class="uploadNote">
		Upload highlight tapes, game footage, and so on. Stay away from backyard footage–street games, summer leagues, etc. See what <a href="#">makes a good video</a>.
	</p>

	<p class="uploadNote last">
		<span class="bold">For college recruits</span>, you should adhere to the NCAA rules. That means only footage from regular season games–competition and highlight tapes, but no skills tapes.
	</p>

	<form id="uploadForm" name="login" action="{#baseUrl#}user/upload/" method="post">
		<div id="progressArea" style="vertical-align: middle;height:30px;">
			<div id="progressMeter" class="panda_upload_progress" style="float:left;"></div>
			<div id="uploadComplete" class="successMessage" style="float:left;visibility: hidden; margin-left:15px;">Upload Complete!</div>
		</div>
		<div id="uploadInputs" class="input">
            <div id="localUploadFile" class="inputField">
                <div class="left"></div>
                <div class="middle upload">
                    <input type="text" class="standard" id="fakeupload" name="fakeupload" value="Browse Files" />
                </div>
                <div class="right"></div>
            </div>
            <div id="localUploadButton" class="bigButton black">
                <div class="topRight whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Upload" id="upload_button" name="upload_button" class="large black" />
                </div>
                <!--<input type="file" class="uploader" onchange="this.form.fakeupload.value = this.value;" />-->

                <input type="hidden" class="uploader" onchange="this.form.fakeupload.value = this.value;" id="returned_video_id" name="panda_video_id"/>
                <input type="hidden" id="upload_filename" class="panda_upload_filename" disabled="disabled"/>
            </div>
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
					// enable the submit button
					$("input[id=submitButton]").removeAttr("disabled");

					// tell user video upload is complete
					$("#uploadComplete").css("visibility", "visible");
				}

				function newFileSelected_Handler()
				{
					// need to hide upload inputs
					$("#localUploadFile").css("display", "none");
					$("#localUploadButton").css("display", "none");
				}

				// creates the uploader component with the customized options
				jQuery("#returned_video_id").pandaUploader(panda_access_details, {
					onsuccess: uploadSuccessful_Handler,
					onchange: newFileSelected_Handler,
					upload_progress_id: 'progressMeter',
					api_url: '{$APIURL}',
					uploader_dir: '.',
					upload_strategy: new PandaUploader.UploadOnSelect(),
					widget: new PandaUploader.SmartWidget(html_5_options, flash_options),
					allowed_extensions: ['aac', 'avi', '3gp', 'flv', 'mov', 'mp3', 'mp4', 'mpeg', 'ogg', 'wav', 'webm', 'wma', 'wmv'],
					file_size_limit: '250MB'
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
						<input type="hidden" name="videoMonth" class="dropVal" value="" />
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
						<input type="hidden" name="videoYear" class="dropVal" value="" />
					</div>
					<div class="rightMedium"></div>
					<ul class="potentials">
						{$videoYears}
					</ul>
				</div>
				<div class="arrowSmall"></div>
			</div>
           	<div class="sportSelect">
           		<div class="dropper">
           			<div class="leftMedium"></div>
           			<div class="middleMedium middle larger">
           				<p class="value">Pick Your Sport</p>
           				<input type="hidden" name="sport_id" id="sport_id" class="dropVal" value="0" />
           			</div>
           			<div class="rightMedium"></div>
           			<ul class="potentials special">
                       {foreach item=single from=$sports}
                           <li>
                               {$single->getSportName()}
                               <input type="hidden" class="sportId" value="{$single->getId()}" />
                           </li>
                       {/foreach}
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
				<input type="submit" value="Continue" id="submitButton" name="submitButton" class="large black"
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