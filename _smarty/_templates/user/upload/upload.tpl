<h1>Video File Upload</h1>
<p>
	Upload highlight tapes, game footage and so on. Stay away from backyard footage&ndash;street games, summer leagues, etc. <a href="#">See what makes a good video</a>
</p>
<p>
	<strong>For college recruits</strong>, you should to adhere to NCAA rules. That means only footage from regular season games&ndash;competition and highlight tapes, but no skills tapes. 
</p>

<form>
	<ul class="form-fields">
		<li class="input-field clear">
			
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
			<a href="#" class="button_black_large button_round left upload"">Browse</a>
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
					<input type="text" name="search" value="Video Title"/>
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
						<select class="select-8" name="gender">
							<option class="default">Video Year</option>
							{$videoYears}
						</select>
					</fieldset>
				</li>
			</ul>
		</li>
		<li class="input-field clear">
			<button value="Join" type="submit" class="button_black_large left button_round">Continue</button> 
			<span class="form-steps">Step 2 of 3</span>
		</li>
	</ul>
</form>
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
*/
			</script>