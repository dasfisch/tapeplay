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
            <p>{$video->getUploadDate()|date_format:'%B %d, %Y %I:%M %p'}</p>
            <p>12:00</p>
            <p class="italic">Video file name</p>
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
						<label for="high-school">
							<span class="checkbox"><span class="check"></span></span>
							<input type="checkbox" id="high-school" name="school_level[]" value="high_school" /> 
							High School
						</label>
					</li>
					<li>
						<label for="college">
							<span class="checkbox"><span class="check"></span></span>
							<input type="checkbox" id="college" name="school_level[]" value="college" />
							College
						</label>
					</li>
					<li>
						<label for="professional">
							<span class="checkbox"><span class="check"></span></span>
							<input type="checkbox" id="professional" name="school_level[]" value="professional" />
							Professional
						</label>
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
						{section name=i start=6 loop=16 step=1}
                            <option value="{$smarty.section.i.index}">{$smarty.section.i.index}</option>
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
                                <input type="checkbox" id="professional" name="position[]" value="{$position->getId()}" />
                                {$position->getName()}
                            </label>
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
                            <option value="{$smarty.section.i.index}">{$smarty.section.i.index}</option>
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
				
				<div class="error-alert">
					<ul>
						<li>Enter your first name.</li>
						<li>Do not use numbers.</li>
					</ul>
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
				
				<div class="error-alert">
					<ul>
						<li>Enter your last name.</li>
						<li>Do not use numbers.</li>
					</ul>
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
		<span class="form-steps">Step 1 of 3</span>
	</fieldset>
</form>

<!--<div id="main">
<h2>Player Info</h2>
{include file='common/message.tpl'}
<p class="facebookLogin">
	The more you tell us about yourself, the easier it is for coaches and scouts
	to find what they're looking for.
</p>
<div id="playerInfo">
    <div id="videoInfo">
        <p id="status">
           Video Status: <span class="success italic">Upload complete!</span>
        </p>
        <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage" />
        <div class="info">
            <h4>{$video->getTitle()}</h4>
            <p class="date">{$video->getUploadDate()|date_format:'%B %d, %Y %I:%M %p'}</p>
            <p class="length">12:00</p>
            <p class="bottom italic">Video file name</p>
        </div>
    </div>
    <form id="playerInfoForm" name="playerInfoForm" action="{#baseUrl#}user/info/" method="post">
        <input type="hidden" name="sport" value="{$postSport}" />
        <input type="hidden" name="user_id" value="{$userId}" />
        <div class="input">
            <ul id="basicInfo">
                <li>
                    <div class="inputField">
                        <div class="left"></div>
                        <div class="middle">
                            <input type="text" class="standard" id="number" name="number" value="##"" />
                        </div>
                        <div class="right"></div>
                    </div>
                </li>
                <li>
                    <div class="option">
                        <p class="header">Level</p>

                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">High School</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Collegiate</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Professional</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="sportSelect">
                        <p class="label">Grade</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftMedium"></div>
                                <div class="middleMedium middle">
                                    <p class="value">Grade</p>
                                    <input type="hidden" name="gradeLevel" class="dropVal" value="" />
                                </div>
                                <div class="rightMedium"></div>
                                <ul class="potentials">
                                    <li>8</li>
                                    <li>9</li>
                                    <li>10</li>
                                    <li>11</li>
                                    <li>12</li>
                                </ul>
                            </div>
                            <div class="arrowSmall"></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="option">
                        <p class="header">Position</p>

                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Point Guard</div>
                            <input type="checkbox" class="checkValue hidden" name="position" />
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Shooting Guard</div>
                            <input type="checkbox" class="checkValue hidden" name="position" />
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Small Forward</div>
                            <input type="checkbox" class="checkValue hidden" name="position" />
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Power Forward</div>
                            <input type="checkbox" class="checkValue hidden" name="position" />
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Center</div>
                            <input type="checkbox" class="checkValue hidden" name="position" />
                        </div>
                    </div>
                </li>
                <li>
                    <div class="onTop">
                        <div class="height">
                            <div class="sportSelect">
                                <div class="dropper">
                                    <div class="leftMedium"></div>
                                    <div class="middleMedium middle">
                                        <p class="value">Height</p>
                                        <input type="hidden" name="height" class="dropVal" value="" />
                                    </div>
                                    <div class="rightMedium"></div>
                                    <ul class="potentials">
                                        {section name=i loop=96 start=48 step=1}
                                            <li>
                                                {$smarty.section.i.index}
                                                <input type="hidden" class="value" value="{$smarty.section.i.index}" />
                                            </li>
                                        {/section}
                                    </ul>
                                </div>
                                <div class="arrowSmall"></div>
                            </div>
                        </div>
                        <div class="weight">
                            <div class="inputField">
                                <div class="left"></div>
                                <div class="middle">
                                    <input type="text" class="standard" id="weight" name="weight" value="lbs"/>
                                </div>
                                <div class="right"></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="input">
            <p class="label">School/Team Info</p>

            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard small" id="schoolSearchInput" name="schoolSearchInput" value="School Name" />
                    <input type="hidden" class="passer" name="schoolId" value="" />
                </div>
                <div class="right"></div>
            </div>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="headCoachName" name="headCoachName" value="Head Coach's Name"" />
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="input graduation">
            <p class="label">Graduation Date <span class="regular">(optional)</span></p>

            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Month</p>
                        <input type="hidden" name="graduationMonth" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <li>
                            January
                            <input type="hidden" class="value" value="1" />
                        </li>
                        <li>
                            February
                            <input type="hidden" class="value" value="2" />
                        </li>
                        <li>
                            March
                            <input type="hidden" class="value" value="3" />
                        </li>
                        <li>
                            April
                            <input type="hidden" class="value" value="4" />
                        </li>
                        <li>
                            May
                            <input type="hidden" class="value" value="5" />
                        </li>
                        <li>
                            June
                            <input type="hidden" class="value" value="6" />
                        </li>
                        <li>
                            July
                            <input type="hidden" class="value" value="7" />
                        </li>
                        <li>
                            August
                            <input type="hidden" class="value" value="8" />
                        </li>
                        <li>
                            September
                            <input type="hidden" class="value" value="9" />
                        </li>
                        <li>
                            October
                            <input type="hidden" class="value" value="10" />
                        </li>
                        <li>
                            November
                            <input type="hidden" class="value" value="11" />
                        </li>
                        <li>
                            December
                            <input type="hidden" class="value" value="12" />
                        </li>
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Year</p>
                        <input type="hidden" name="graduationYear" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        {section name=i start=$startYear loop=$startYear+5 step=1}
                            <li>
                                {$smarty.section.i.index}
                                <input type="hidden" class="value" value="{$smarty.section.i.index}" />
                            </li>
                        {/section}
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="input">
            {if isset($stats) && count($stats) > 0}
                <p class="label">Statistics <span class="regular">(optional)</span>:</p>
                <ul id="stats">
                    {assign var=i value=0}
                    {foreach from=$stats item=stat}
                        {if $i % $modder == 0 || $i == 0}
                            <li>
                        {/if}
                                <div class="single">
                                    <p>{$stat->getStatName()}</p>
                                    <div class="inputFieldSmall">
                                        <div class="left"></div>
                                        <div class="middle">
                                            <input type="text" class="standard" id="stat" name="stat[{$stat->getId()}]" value=""/>
                                        </div>
                                        <div class="right"></div>
                                    </div>
                                </div>
                        {if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
                            </li>
                        {/if}
                        {$i = $i+1}
                    {/foreach}
                </ul>
            {/if}
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Submit" id="submit" class="large black"/>
            </div>
        </div>
        <div class="option step">
            Step 3 of 3
        </div>
    </form>
    </div>
</div>-->