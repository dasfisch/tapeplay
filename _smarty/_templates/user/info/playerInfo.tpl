<h1>Player Sign Up</h1>
<p>
	The more you tell us about yourself, the easier it is for coaches and scouts to find what they&rsquo;re looking for.
</p>
<form id="playerInfoForm" name="playerInfoForm" action="{#baseUrl#}user/info/" method="post">
    <input type="hidden" name="sport" value="{$postSport}" />
    <input type="hidden" name="user_id" value="{$userId}" />
    <input type="hidden" name="hash" id="hash" value="{$hash}" />
    <div id="videoInfo">
        <p id="status">
            Video Status: <span class="success italic">Upload complete!</span>
        </p>
        <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage" />
        <div class="info">
            <h2>{$video->getTitle()}</h2>
            <p>{$video->getUploadDate()|date_format:'%B %d, %Y'}</p>
            <p>{$video->getLength()}</p>
        </div>
    </div>
	<ul class="five-column">
		<li>
			<fieldset>
				<legend>Number</legend>
				<div class="input_custom-text input_text80 width100 left">
					<div class="custom-input_center custom-input_partial">
						<span class="custom-input_top"></span>
						<input type="text" name="number" value="##" size="4" />
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
			</fieldset>
		</li>
		<li>
			<fieldset>
				<legend>Level</legend>
				<ul class="font15">
					<li>
						<label for="high-school" class="singleCheck">
							<span class="checkbox"><span class="check"></span></span>
							High School
						</label>
                        <input type="checkbox" id="high-school" class="single" name="playingLevel" value="0" />
					</li>
					<li>
						<label for="college" class="singleCheck">
							<span class="checkbox"><span class="check"></span></span>
							College
						</label>
                        <input type="checkbox" id="college" class="single" name="playingLevel" value="1" />
					</li>
					<li>
						<label for="professional" class="singleCheck">
							<span class="checkbox"><span class="check"></span></span>
							Professional
						</label>
                        <input type="checkbox" id="professional" class="single" name="playingLevel" value="2" />
					</li>
				</ul>
			</fieldset>
		</li>
		<li>
			<fieldset>
				<legend>Grade</legend>
				<fieldset>
					<select class="select-2" name="gradeLevel">
						<option class="default">Select</option>
						{section name=i start=9 loop=17 step=1}
                            <option value="{$smarty.section.i.index}">{$gradeLevels[$smarty.section.i.index]}</option>
                        {/section}
					</select>
				</fieldset>
			</fieldset>
		</li>
		<li>
			<fieldset>
				<legend>Position</legend>
                <ul class="font15">
                    {foreach from=$positions item=position}
                        <li>
                            <label for="professional">
                                <span class="checkbox"><span class="check"></span></span>
                                {$position->getName()}
                            </label>
                            <input type="checkbox" name="position[]" value="{$position->getId()}" />
                        </li>
                    {/foreach}
                </ul>
			</fieldset>
		</li>
		<li>
			<fieldset>
				<legend>Height</legend>
				<fieldset>
					<select class="select-2" class="height" name="height">
						<option class="default">Select</option>
						{section name=i start=48 loop=96 step=1}
                            <option value="{$smarty.section.i.index}">{floor($smarty.section.i.index/12)}" {$smarty.section.i.index % 12}'</option>
                        {/section}
					</select>
				</fieldset>
			</fieldset>
			<fieldset>
				<legend>Weight</legend>
				<div class="input_custom-text input_text36 left">
					<div class="custom-input_center custom-input_partial">
						<span class="custom-input_top"></span>
						<input type="text" name="weight" value="lbs" size="4" />
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
			</fieldset>
		</li>
	</ul>
	<div class="clear"></div>
	<fieldset>
		<legend>School/Team Info</legend>
		<ul>
			<li class="input-field clear">

				<div class="input_custom-text input_text80 width600 left">
					<div class="custom-input_center custom-input_partial">
						<span class="custom-input_top"></span>
						<input type="text" value="School Name" id="schoolSearchInput" name="schoolSearchInput" value="School Name" />
                        <input type="hidden" class="passer" name="schoolId" value="" />
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
			</li>
			<li class="input-field clear">
				<div class="input_custom-text input_text80 width600 left">
					<div class="custom-input_center custom-input_partial">
						<span class="custom-input_top"></span>
						<input type="text" id="lastName" name="headCoachName" value="Head Coach's Name" />
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
			</li>
		</ul>
	</fieldset>
	<fieldset>
		<legend>Graduation Date (optional)</legend>
		<ul class="three-column_sign-up left">
			<li class="left">
				<fieldset>
					<select class="select-7" name="graduationMonth">
						<option class="default">Grad. Month</option>
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
					<select class="select-8" name="graduationYear">
						<option class="default">Grad. Year</option>
						{section name=i start=$startYear loop=$startYear+5 step=1}
                            <option value="{$smarty.section.i.index}">{$smarty.section.i.index}</option>
                        {/section}
					</select>
				</fieldset>
			</li>
		</ul>
	</fieldset>
	<fieldset class="statistics">
		<legend>Statistics (optional)</legend>
		{if isset($stats) && count($stats) > 0}
            <ul class="three-column">
                {assign var=i value=0}
                {foreach from=$stats item=stat}
                    {if $i % $modder == 0 || $i == 0}
                        <!--<li>-->
                    {/if}
                    <li>
                    	
                    	<div class="input_custom-text input_text36 width40 right">
							<div class="custom-input_center custom-input_partial">
								<span class="custom-input_top"></span>
								<input type="text" id="lastName" name="stat[{$stat->getId()}]" value="" />
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
						<span class="right">{$stat->getStatName()}</span>
                   		</li>
                    {if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
                        <!--</li>-->
                    {/if}
                    {$i = $i+1}
                {/foreach}
            </ul>
        {/if}
	</fieldset>
	<fieldset>
		<button value="Join" type="submit" class="button_black_large left button_round">Join</button> 
		<span class="form-steps">Step 3 of 3</span>
	</fieldset>
</form> 
