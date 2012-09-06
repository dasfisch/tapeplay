<h1>Video File Upload</h1>
<p>
	Upload highlight tapes, game footage and so on. Stay away from backyard footage&ndash;street games, summer leagues, etc. <a href="#">See what makes a good video</a>
</p>
<p>
	<strong>For college recruits</strong>, you should to adhere to NCAA rules. That means only footage from regular season games&ndash;competition and highlight tapes, but no skills tapes. 
</p>

<form id="uploading" method="post" action="{#baseUrl#}user/upload/">
	<ul class="form-fields">
		<li class="input-field clear">

            <div id="progressArea" style="vertical-align: middle;height:30px;">
                <div id="progressMeter" class="panda_upload_progress" style="float:left;"></div>
                <div id="uploadComplete" class="successMessage" style="float:left;visibility: hidden; margin-left:15px;">Upload Complete!</div>
            </div>
			<div class="input_custom-text input_text80 upload width440 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" id="lastName" name="lastName" value="Browse Video File" />
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
			<div class="error-alert">
				<ul>
					<li>We&rsquo;re sorry but you cannot upload this type of file. Video files must be AAC, AVI, 3GP, MOV, MP3, MP4, MPEG, OGG, WAV, WEBM, WMA, or WMV.m</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
			<a href="#" class="clear">Examples of video titles</a>
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
					<li>Enter your first and last name here.</li>
					<li>Do not use numbers.</li>
				</ul>
			</div>
			
		</li>
		<li class="input-field clear">
			<ul class="three-column_sign-up left">
				<li class="left">
					<fieldset>
						<select class="select-7" name="videoMonth">
							<option class="default">Video Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
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
            <fieldset>
                <select class="select-3" name="sport_id">
                    <option class="default">Pick a Sport</option>
                    {foreach item=single from=$sports}
                        <option value="{$single->getId()}">{$single->getSportName()}</option>
                    {/foreach}
                </select>
            </fieldset>
        </li>
		<li class="input-field clear">
			<button value="Join" type="submit" class="button_black_large left button_round">Continue</button> 
			<span class="form-steps">Step 2 of 3</span>
		</li>
	</ul>
</form>

<!--<div id="main">
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
                <input type="file" class="uploader" onchange="this.form.fakeupload.value = this.value;" />

                <input type="hidden" class="uploader" onchange="this.form.fakeupload.value = this.value;" id="returned_video_id" name="panda_video_id"/>
                <input type="hidden" id="upload_filename" class="panda_upload_filename" disabled="disabled"/>
            </div>
            <p class="asterisk error">*</p>
            <p class="error">
                We&rsquo;re sorry but you cannot upload this type of file. Video files must be AAC, AVI, 3GP, MOV, MP3, MP4, MPEG, OGG, WAV, WEBM, WMA, or WMV.
            </p>
-->
			<script type="text/javascript">
/*
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
/*
			</script>
		<!--</div>
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
</div>-->