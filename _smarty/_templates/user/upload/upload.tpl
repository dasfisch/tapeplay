<h1 xmlns="http://www.w3.org/1999/html">Video File Upload</h1>
<p>
	Upload highlight tapes, game footage and so on. Stay away from backyard footage&ndash;street games, summer leagues, etc. <a href="{#blogUrl#}/?p=99" target="_blank">See what makes a good video</a>
</p>
<p>
	<strong>For college recruits</strong>, you should to adhere to NCAA rules. That means only footage from regular season games&ndash;competition and highlight tapes, but no skills tapes.
</p>

<form id="uploading" class="uploadForm" method="post" action="{#baseUrl#}user/upload/">
	<ul class="form-fields">
		<li class="input-field clear">

            <div id="progressArea" style="vertical-align: middle;height:30px;">
                <div id="progressMeter" class="panda_upload_progress" style="float:left;"></div>
				<div id="cancelUpload" style="float:left; display:none; margin-left:15px; color:#e18a07;"><a href="#">Cancel Upload</a></div>
                <div id="uploadComplete" class="successMessage" style="float:left;visibility: hidden; margin-left:15px; color:#00ff12;">Upload Complete.</div>
            </div>
			<div class="input_custom-text input_text80 upload width440 left" id="localUploadFile">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" id="fakeupload" name="fakeupload" value="Browse Video File" />
					<span class="custom-input_bottom"></span>
				</div>

				<div class="custom-input_left custom-input_partial">
					<span class="custom-input_top"></span>
					<span class="custom-input_bottom"></span>
				</div>

				<div class="custom-input_right custom-input_partial">
					<span class="custom-input_top"></span>
					<span class="custom-input_bottom"></span>
				</div>

			</div>
            <div id="uploadInputs" class="input">
                <div id="localUploadButton" class="bigButton black">
                    <div class="topRight whiteBg"></div>
                    <div class="bottomRight whiteBg"></div>
                    <div class="middle">
                        <input type="submit" value="Upload" id="upload_button" name="upload_button" class="large black" />
                    </div>
                    <input type="file" class="uploader" onchange="this.form.fakeupload.value = this.value;" />

                    <input type="hidden" class="uploader" onchange="this.form.fakeupload.value = this.value;" id="returned_video_id" name="panda_video_id"/>
                    <input type="hidden" id="upload_filename" class="panda_upload_filename" disabled="disabled"/>
                </div>
                <script type="text/javascript">

					$(document).ready(function() {
						$('#cancelUpload a').click(function() {
						    // cancel the upload
						    widget.abort();
						    return false;
						});
					});

                    // grabs cloud_id, access_key, and secret_key for Panda
                    var panda_access_details = {$pandaAccessDetails};

                    // set options for <widget> parameter below
                    var html_5_options = {};
                    var flash_options = {};

                    function uploadSuccessful_Handler()
                    {
                        // enable the submit button
                        $("#submitButton").removeAttr("disabled");

                        // tell user video upload is complete
						$("#cancelUpload").css("display", "none");
                        $("#uploadComplete").css("visibility", "visible");
						$("#submitButton").css("background-color", "#000");
						$("#submitButton").css("color", "#fff");
                    }

                    function newFileSelected_Handler()
                    {
                        // need to hide upload inputs
                        $("#localUploadFile").css("display", "none");
                        $("#localUploadButton").css("display", "none");

						$("#cancelUpload").css("display", "block");
                    }

					function uploadCanceled_Handler()
					{
						$("#localUploadFile").css("display", "block");
						$("#localUploadButton").css("display", "block");
						$("#cancelUpload").css("display", "none");
					}

                    // creates the uploader component with the customized options
					var widget = new PandaUploader.SmartWidget(html_5_options, flash_options);
                    jQuery("#returned_video_id").pandaUploader(panda_access_details, {
                        onsuccess: uploadSuccessful_Handler,
                        onchange: newFileSelected_Handler,
						onabort: uploadCanceled_Handler,
                        upload_progress_id: 'progressMeter',
                        api_url: '{$APIURL}',
                        uploader_dir: '.',
                        upload_strategy: new PandaUploader.UploadOnSelect(),
                        widget: widget,
                        allowed_extensions: ['aac', 'avi', '3gp', 'flv', 'mov', 'mp3', 'mp4', 'mpeg', 'ogg', 'wav', 'webm', 'wma', 'wmv'],
                        file_size_limit: '250MB'
                    });
                </script>
            </div>
			<div class="error-alert">
				<ul>
					<li>We&rsquo;re sorry but you cannot upload this type of file. Video files must be AAC, AVI, 3GP, MOV, MP3, MP4, MPEG, OGG, WAV, WEBM, WMA, or WMV.m</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
            <div class="infoOpen videoTitle">
                Examples of video titles
                <div class="infoBubble above">
                    <div class="directionBottomLeft"></div>
                    <div class="topLeft"></div>
                    <div class="topRight"></div>
                    <div class="middle">
                        <p>
                            Keep it short and sweet. Here is what we recommend for the video titles:
                        </p>
                        <ul>
                            <li>Vs. Midcity Ravens</li>
                            <li>Palmetto Golf Championship</li>
                            <li>Highlight Tape 1</li>
                            <li>Skills Tape 1</li>
                        </ul>
                    </div>
                    <div class="bottomLeft"></div>
                    <div class="bottomRight"></div>
                </div>
            </div>
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" name="title" value="Video Title"/>
					<span class="custom-input_bottom"></span>
				</div>

				<div class="custom-input_left custom-input_partial">
					<span class="custom-input_top"></span>
					<span class="custom-input_bottom"></span>
				</div>

				<div class="custom-input_right custom-input_partial">
					<span class="custom-input_top"></span>
					<span class="custom-input_bottom"></span>
				</div>
			</div>
			<div class="error-alert">
				<ul>
					<li>Enter a title for your video.</li>
				</ul>
			</div>

		</li>
		<li class="input-field clear">
            <fieldset>
                <select class="select-9" name="sport_id">
                    <option class="default">Pick a Sport</option>
                    {foreach item=single from=$sports}
                        {if $sport.id == $single->getId()}
                            <option value="{$single->getId()}" selected>{$single->getSportName()}</option>
                        {else}
                            <option value="{$single->getId()}">{$single->getSportName()}</option>
                        {/if}
                    {/foreach}
                </select>
            </fieldset>
        </li>
		<li class="input-field clear">
			<ul class="three-column_sign-up left">
				<li class="left">
					<fieldset>
						<select class="select-7" name="videoMonth">
							<option class="default">Video Month</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
					</fieldset>
				</li>
				<li class="left">
					<fieldset>
						<select class="select-8" name="videoYear">
							<option class="default">Video Year</option>
							{$videoYears}
						</select>
					</fieldset>
				</li>
			</ul>
		</li>
		<li class="input-field clear">
			<button id="submitButton" value="Join" type="submit" class="button_black_large left button_round disabled" disabled="disabled">Continue</button>
			<span class="form-steps">Step 2 of 3</span>
		</li>
	</ul>
</form>