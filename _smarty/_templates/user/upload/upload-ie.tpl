<h1>Upload Video</h1>
<p>
	Upload highlight tapes, game footage and so on. Stay away from backyard footage&ndash;street games, summer leagues, etc. <a href="{#blogUrl#}/?p=99" target="_blank" title="Read what makes a good video">Read what makes a good video.</a>
</p>
<p>
	<strong>For college recruits</strong>, you should adhere to NCAA rules. That means only footage from regular season games&ndash;competition and highlight tapes, but no skills tapes.
</p>

<form id="uploading" class="uploadForm" method="post" action="{#baseUrl#}user/upload/">
	<ul class="form-fields">
		<li class="input-field clear">
            <div id="progressArea" style="vertical-align: middle;height:30px;">
                <div id="progressMeter" class="panda_upload_progress" style="float:left;"></div>
				<div id="cancelUpload" style="float:left; display:none; margin-left:15px; color:#e18a07;"><a href="#">Cancel Upload</a></div>
                <div id="uploadComplete" class="successMessage" style="float:left;visibility: hidden; margin-left:15px; color:#00ff12;">Upload Complete</div>
            </div>
            <input type="text" class="hidden" style="display: none;" id="fakeupload" name="fakeupload" value="Browse Video File" />
            <div id="uploadInputs" class="input">
                <div class="selectfile">Select a file:</div>
                <!--div id="localUploadButton" class="bigButton black">
                    <div class="topRight whiteBg"></div>
                    <div class="bottomRight whiteBg"></div>
                    <div class="middle">
                        <input type="submit" value="Browse" id="upload_button" name="upload_button" class="large black" />
                    </div>
                    <div class="topLeft whiteBg"></div>
                    <div class="bottomLeft whiteBg"></div>

                </div-->

                <input type="file" class="uploader" onchange="this.form.fakeupload.value = this.value;" />
                <input type="hidden" class="uploader analytics" onchange="this.form.fakeupload.value = this.value;" id="browsed-video" name="panda_video_id"/>
                <input type="hidden" id="upload_filename" class="panda_upload_filename" disabled="disabled"/>

                <script type="text/javascript">

					$(document).ready(function() {
						$('#cancelUpload a').click(function() {
                            _gaq.push(['_trackEvent',
                                  'user-action',           // The top-level name for your online content categories.  Required parameter.
                                  'cancel-upload',  // Sets the value of "Section" to "Life & Style" for this particular aricle.  Required parameter.
                                  'user/upload'
                               ]);

						    // cancel the upload
						    widget.abort();

                            return false;
						});
					});

                    // grabs cloud_id, access_key, and secret_key for Panda
                    var panda_access_details = {$pandaAccessDetails};

                    // set options for <widget> parameter below
                    var html_5_options = {ldelim}{rdelim};
                    var flash_options =
                    {ldelim}
                        add_filename_field: false,
                        button_image_url : "/user/upload/assets/browse_button.png",
                        button_width: 87,
                        button_height: 27,
                        upload_success_handler : uploadSuccessful_Handler,
                        upload_error_handler : uploadError_Handler
                    {rdelim};

                    function uploadError_Handler(file, errorCode, message)
                    {
                        if (errorCode == SWFUpload.FILE_CANCELLED)
                        {
                            $("#localUploadFile").css("display", "block");
                            $("#localUploadButton").css("display", "block");
                            $("#cancelUpload").css("display", "none");
                            $("#pleaseWait").css("display", "none");
                            $(".form-steps").css("visibility", "visible");
                            $(".swfupload").css("visibility", "visible");
                            $(".selectfile").css("visibility", "visible");
                        }
                    }

                    function uploadSuccessful_Handler()
                    {
                        // enable the submit button
                        $("#submitButton").removeAttr("disabled");

                        $("#pleaseWait").css("display", "none");
                        $(".form-steps").css("visibility", "visible");

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
                        $("#pleaseWait").css("display", "block");
                        $(".form-steps").css("visibility", "hidden");

                        $(".swfupload").css("visibility", "hidden");
                        $(".selectfile").css("visibility", "hidden");

                    }

					function uploadCanceled_Handler()
					{
						$("#localUploadFile").css("display", "block");
						$("#localUploadButton").css("display", "block");
						$("#cancelUpload").css("display", "none");
                        $("#pleaseWait").css("display", "none");
                        $(".form-steps").css("visibility", "visible");
                        $(".swfupload").css("visibility", "visible");
                        $(".selectfile").css("visibility", "visible");
					}

                    // creates the uploader component with the customized options
					var widget = new PandaUploader.FlashWidget(flash_options);//new PandaUploader.SmartWidget(html_5_options, flash_options);
                    jQuery("#browsed-video").pandaUploader(panda_access_details, {
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
            <div class="popup-hover pos-3">
				<a href="#" class="open video-title">Examples of video titles</a>
				<div class="popup popup-3">
					<div class="holder">
						<div class="frame">
							<p>Keep it short and sweet. Here is what we recommend for video titles:</p>
							<ul>
								<li>Vs. Midcity Ravens</li>
								<li>Palmetto Golf Championship</li>
								<li>Highlight Tape 1</li>
								<li>Skills Tape 1</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="right character-max">
				32 character max
			</div>
			<div class="clear"></div>
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" name="title" value="Video Title" maxlength="32" />
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
			<button id="submitButton" value="Join" type="submit" class="button_black_large left button_round analytics disabled" id="finished-upload" disabled="disabled">Continue</button>
            <span id="pleaseWait" style="display:none;">Please wait until your video is uploaded.</span>
            {if $user->getStatus() != 3}
			    <span class="form-steps">Step 2 of 3</span>
            {/if}
		</li>
	</ul>
</form>