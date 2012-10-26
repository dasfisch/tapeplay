<div class="account-page">
	<div id="content-left-column">
	    <h1>Welcome {$user->getFirstName()}</h1>
	    <input type="hidden" id="hash" value="{$hash}" />
	    <input type="hidden" id="user-id" value="{$user->getUserId()}" />
	    <ul class="accordion">
			<li class="active">
				<a class="opener">{$myVideoWording} ({$videoCount})</a>
				<div class="slide">
					<div class="holder scrollable-area">
						<ul id="videos">
							{if isset($videos) && !empty($videos)}
	                        	{foreach $videos as $video}
									<li>
                                        <a href="{#baseUrl#}videos/view/{$video->getId()}/">
                                            {if isset($fileExists) && $fileExists == true}
                                                <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" width="125" height="94" alt="image description" />
                                            {else}
                                                <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" width="125" height="94" alt="image description" />
                                            {/if}
                                            <div class="text-holder">
                                                <div class="videoInfo">
                                                    <strong class="title">{$video->getTitle()}</strong>
                                                    <div class="category">{$video->getSport()->getSportName()}</div>
                                                    <div class="date">
                                                        {if $video->getRecordedMonth() != 0}
                                                            {$video->getRecordedMonthName()}
                                                        {/if}
                                                        {if $video->getRecordedYear() != 0}
                                                            {$video->getRecordedYear()}
                                                        {/if}
                                                    </div>
                                                    <div class="time"></div>
                                                    <em class="info">Views: {$video->getViews()}</em>
                                                </div>
                                                <div class="accountInfo hidden">
                                                    <div class="input_custom-text input_text80 width450 left">
                                                        <div class="custom-input_center custom-input_partial">
                                                            <span class="custom-input_top"></span>
                                                            <input type="text" class="standard" id="_title" name="title" value="{$video->getTitle()}" />
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
                                                    <!--<ul class="three-column_sign-up left">
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
                                                    </ul>-->
                                                </div>
                                                <div class="btn-holder">
                                                    <a class="btn edit videoEdit"><span>Edit</span></a><br />
                                                    <a class="btn delete deleteVideo" id="video-{$video->getId()}"><span>Delete</span></a>
                                                </div>
                                            </div>
                                            <input type="hidden" class="video-id" value="{$video->getId()}" />
                                        </a>
									</li>
								{/foreach}
	                        {/if}
						</ul>
					</div>
				</div>
			</li>
			<li>
				<a class="opener">Account</a>
				<div class="slide slider_account">
					<ul>
						<li>
							<div class="text-holder">
								<strong class="title">Name</strong>
								<div class="category">{$user->getFirstName()} {$user->getLastName()}</div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 width450 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="text" class="standard" id="_firstName" name="firstName" value="{$user->getFirstName()}" />
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
                                    <div class="input_custom-text input_text80 width450 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="text" class="standard" id="_lastName" name="lastName" value="{$user->getLastName()}" />
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
               	                </div>
								<div class="btn-holder">
									<a class="btn edit userEdit"><span>Edit</span></a><br />
								</div>
							</div>
						</li>
						<li>
							<div class="text-holder">
								<strong class="title">Email Address</strong>
								<div class="category">{$user->getEmail()}</div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 width450 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="text" class="standard" id="_email" name="email" value="{$user->getEmail()}" />
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
               	                </div>
								<div class="btn-holder">
									<a class="btn edit userEdit"><span>Edit</span></a><br />
								</div>
							</div>
						</li>
						<li>
							<div class="text-holder">
								<strong class="title">Password</strong>
								<div class="category">********</div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 width450 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="password" class="standard" id="_hash" name="password" value="********" />
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
               	                </div>
								<div class="btn-holder">
									<a class="btn edit userEdit"><span>Edit</span></a><br />
								</div>
							</div>
						</li>
						<li>
							<div class="text-holder">
								<strong class="title">Birth Year / Sex / Zip Code</strong>
								<div class="category">
                                    {$selected|date_format:'%Y'} / {$user->getGender()} / {$user->getZipcode()}</div>
                                <div class="two-column accountInfo hidden">
                                    <div>
                                        <fieldset>
                                            <legend>Birth Year</legend>
                                                {html_select_date
                                                start_year=$thirteenBelow
                                                display_days=false
                                                display_months=false
                                                end_year="-50"
                                                prefix='_birth'
                                                all_extra='class="select-2" id="_birthYear"'
                                                reverse_years=true
                                                time=$selected
                                            }
                                        </fieldset>
                                        <fieldset>
                                            <legend>Gender</legend>
                                            <select class="select-2" name="_gender" id="_gender">
                                               <option value="M"{if $user->getGender() == 'M'} selected{/if}>Male</option>
                                               <option value="F"{if $user->getGender() == 'F'} selected{/if}>Female</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div>
                                        <legend>Zip Code</legend>
                                        <div class="input_custom-text input_text36 width40">
                                            <div class="custom-input_center custom-input_partial">
                                                <span class="custom-input_top"></span>
                                                <input type="text" class="standard" id="_zipcode" name="zipcode" value="{$user->getZipcode()}" />
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
                                    </div>
               	                </div>
								<div class="btn-holder">
									<a class="btn edit userEdit"><span>Edit</span></a><br />
								</div>
							</div>
						</li>
						<li>
							<div class="text-holder">
								<strong class="title">Deactivate Account</strong>
								<div class="btn-holder btn-lightbox">
									<a href="#popup" class="btn edit deactivate show-lightbox"><span>Deactivate</span></a><br />
								</div>
								<div class="popup-holder">
									<div id="popup" class="lightbox">
										<h2>Have you lost interest? Is there someone else? </h2>
										<p>If you deactivate your account, please know&hellip;</p>
										<ul>
											<li><strong>Like a jilted lover, we&rsquo;ll hold onto your account info for 30 days.</strong> Just in case you reconsider. You can reactivate your account by logging in during those 30 days. After that, we&rsquo;ll find some way to get over you and your account info will be deleted.</li>
											<li><strong>Your account will be removed from TapePlay within a few minutes</strong> but some of your info may be viewable for a few days after deactivation.</li>
											<li><strong>We have no control over content indexed by search engines</strong> like Google, Yahoo and Bing.</li>
										</ul>
										<p>We&rsquo;ll always look back on these times as special.</p>
										<div class="buttons-holder">
											<a class="btn-deactivate">Deactivate</a>
											<a class="btn-cancel">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>

				</div>
			</li>
            {foreach $playerInfo as $player}
                <li class="parentHolder">
                    <input type="hidden" class="player-id" value="{$player->getId()}" />
                    <a class="opener">{$player->getSport()->getSportName()}</a>
                    <div class="slide slider_sport">
                        <ul>
                            <li>
                                <div class="text-holder">
                                    <strong class="title">Level / Grade / Number</strong>
                                    <div class="category">
                                        {if $player->getPlayingLevel() == 0}
                                            High School
                                        {elseif $player->getPlayingLevel() == 1}
                                            College
                                        {elseif $player->getPlayingLevel() == 2}
                                            Professional
                                        {/if}
                                        / {$player->getGradeLevel()} / #{$player->getNumber()}</div>
                                    <div class="two-column accountInfo hidden">
                                        <div>
                                            <legen>Playing Level</legen>
                                            <fieldset>
                                                <ul class="font15">
                                                    <li>
                                                        <label for="high-school" class="singleCheck">
                                                            <span class="checkbox"><span class="check"></span></span>
                                                            <span class="display">High School</span>
                                                        </label>
                                                        <input type="checkbox" class="single" name="playingLevel" id="_playingLevel" value="0"
                                                            {if $player->getPlayingLevel() == 0}checked{/if}
                                                                />
                                                    </li>
                                                    <li>
                                                        <label for="college" class="singleCheck">
                                                            <span class="checkbox"><span class="check"></span></span>
                                                            <span class="display">College</span>
                                                        </label>
                                                        <input type="checkbox" class="single" name="playingLevel" id="_playingLevel" value="1"
                                                            {if $player->getPlayingLevel() == 1}checked{/if}
                                                        />
                                                    </li>
                                                    <li>
                                                        <label for="professional" class="singleCheck">
                                                            <span class="checkbox"><span class="check"></span></span>
                                                            <span class="display">Professional</span>
                                                        </label>
                                                        <input type="checkbox" class="single" name="playingLevel" id="_playingLevel" value="2"
                                                            {if $player->getPlayingLevel() == 2}checked{/if}
                                                        />
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </div>
                                        <div>
                                            <fieldset>
                                                <legend>Grade Level</legend>
                                                <select class="select-2" name="gradeLevel" id="_gradeLevel">
                                                    <option>Select a Grade</option>
                                                    {section name=i start=9 loop=17 step=1}
                                                        <option value="{$smarty.section.i.index}"
                                                            {if $player->getGradeLevel() == $smarty.section.i.index}selected {/if}
                                                                >{$gradeLevels[$smarty.section.i.index]}</option>
                                                     {/section}
                                                </select>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Number</legend>
                                                <div class="input_custom-text input_text36 width40 left">
                                                    <div class="custom-input_center custom-input_partial">
                                                        <span class="custom-input_top"></span>
                                                        <input type="text" class="standard" id="_number" name="number" value="{$player->getNumber()}" />
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
                                        </div>
                                    </div>
                                    <div class="btn-holder">
                                        <a class="btn edit playerEdit"><span>Edit</span></a><br />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-holder">
                                    <strong class="title">Position / Height / Weight</strong>
                                    <div class="category">
                                    {foreach from=$player->getPosition() key=key item=position}
                                        {if $player->getPosition()|@count gt 0}
                                            {if $key lt $player->getPosition()|@count - 1}
                                                {$position->getName()},
                                            {else}
                                                {$position->getName()} /
                                            {/if}
                                        {/if}
                                    {/foreach}
                                    {$player->getFriendlyHeight()} / {$player->getWeight()} lbs</div>
                                    <div class="two-column accountInfo hidden">
                                        <div>
                                            <fieldset>
                                                <legend>Positions</legend>
                                                <ul class="font15">
                                                    {foreach from=$player->getSport()->getPositions() key=key item=position}
                                                        <li>
                                                            <label
                                                                {foreach from=$player->getPosition() key=key item=myPosition}
                                                                    {if $position->getId() == $myPosition->getId()}class="on"{/if}
                                                                {/foreach}>
                                                                <span class="checkbox"><span class="check"></span></span>
                                                                <span class="display">{$position->getName()}</span>
                                                            </label>
                                                            <input type="checkbox" name="playingLevel" id="_position" value="{$position->getId()}"
                                                                {foreach from=$player->getPosition() key=key item=myPosition}
                                                                    {if $position->getId() == $myPosition->getId()}checked {/if}
                                                                {/foreach}
                                                                    />
                                                        </li>
                                                    {/foreach}
                                                </ul>
                                            </fieldset>
                                        </div>
                                        <div>
                                            <fieldset>
                                                <legend>Height</legend>
                                                <select class="select-2" class="height" id="_height" name="height">
                                                    <option class="default">Select</option>
                                                    {section name=i start=48 loop=96 step=1}
                                                        <option value="{$smarty.section.i.index}"{if $player->getHeight() == $smarty.section.i.index} selected="selected"{/if}>
                                                            {floor($smarty.section.i.index/12)}' {$smarty.section.i.index % 12}"
                                                        </option>
                                                    {/section}
                                                </select>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Weight</legend>
                                                <div class="input_custom-text input_text36 width40">
                                                    <div class="custom-input_center custom-input_partial">
                                                        <span class="custom-input_top"></span>
                                                        <input type="text" class="standard" id="_weight" name="weight" value="{$player->getWeight()}" />
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
                                        </div>
                                    </div>
                                    <div class="btn-holder">
                                        <a class="btn edit playerEdit"><span>Edit</span></a><br />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-holder">
                                    <strong class="title">School Name</strong>
                                    <div class="category">{$player->getSchool()->getName()}</div>
                                    <div class="accountInfo hidden">
                                        <div class="input_custom-text input_text80 left">
                                            <div class="custom-input_center custom-input_partial">
                                                <span class="custom-input_top"></span>
                                                {assign var=school value=$player->getSchool()->getName()}
                                                <input type="text" class="standard small schoolSearchInput" name="schoolName"
                                                       value="{if isset($school) && $school != ''}{$school}{else}Please select a school!{/if}" />
                                                <input type="hidden" class="passer" value="" />
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
                                    </div>
                                    <div class="btn-holder">
                                        <a class="btn edit schoolEdit"><span>Edit</span></a><br />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-holder">
                                    <strong class="title">Head Coach&rsquo;s Name</strong>
                                    <div class="category">{$player->getCoachName()}</div>
                                    <div class="accountInfo hidden">
                                        <div>
                                            <fieldset>
                                                <legend>Coach's Name</legend>
                                                <div class="input_custom-text input_text80 left">
                                                    <div class="custom-input_center custom-input_partial">
                                                        <span class="custom-input_top"></span>
                                                        <input type="text" class="standard small" id="_coachName" name="coachName" value="{$player->getCoachName()}" />
                                                        <input type="hidden" class="passer" value="" />
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
                                        </div>
                                    </div>
                                    <div class="btn-holder">
                                        <a class="btn edit schoolEdit"><span>Edit</span></a><br />
                                    </div>
                                    <div class="btn-holder">
                                        <a class="btn edit playerEdit"><span>Edit</span></a><br />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-holder">
                                    <strong class="title">Statistics</strong>
                                    {if $player->getStats()|@count gt 0}
                                        <ul class="three-column">
                                            {foreach from=$player->getStats() item=stat}
                                                {if $stat->getStatValue() !== '' && $stat->getStatValue() > 0}
                                                    <li>
                                                        <div class="stat" style="padding-bottom: 10px; text-align: left;">
                                                            <p>
                                                                <span class="statName">{$stat->getStatName()}</span>
																<br/>
                                                                <span class="bold">{$stat->getStatValue()}</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                {/if}
                                            {/foreach}
                                        </ul>
                                    {/if}
                                    <div class="statHidden hidden">
                                        <ul class="three-column">
                                            {foreach $player->getSport()->getStats() as $key=>$stat}
                                                <li>
                                                    <p>
                                                        {$stat->getStatName()}<br/>
                                                    </p>
                                                    <div class="input_custom-text input_text36 left">
                                                        <div class="custom-input_center custom-input_partial">
                                                            <span class="custom-input_top"></span>
                                                            {assign var=inputSet value=false}
                                                            {if $player->getStats()|@count gt 0}
                                                                {foreach $player->getStats() as $myStat}
                                                                    {if $myStat->getId() == $stat->getId()}
                                                                        <input type="text" class="standard small" id="stat" name="stat-{$stat->getId()}"
                                                                            {if $myStat->getStatValue() != '' && $myStat->getStatValue() > 0}value="{$myStat->getStatvalue()}"{/if} />
                                                                        {$inputSet=true}
                                                                        {continue}
                                                                    {/if}
                                                                {/foreach}
                                                            {/if}
                                                            {if $inputSet === false}
                                                                <input type="text" class="standard small" id="stat" name="stat-{$stat->getId()}" />
                                                            {/if}
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
                                            {/foreach}
                                        </ul>
                                    </div>
                                    <div class="btn-holder">
                                        <a class="btn edit statButton"><span>Edit</span></a><br />
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            {/foreach}
			<li>
				<a class="opener">Privacy</a>
				<div class="slide slider_privacy">
					<p>
						Who can view my videos?<br />
                        <input type="radio" name="visibility" class="videoOptin" value="0"
                            {if $privacy == 0}checked {/if}
                            /> <label>Anybody</label><br />
   	                    <input type="radio" name="visibility" class="videoOptin" value="1"
                            {if $privacy == 1}checked {/if}
                            /> <label>Scouts and Coaches</label><br />
   	                    <input type="radio" name="visibility" class="videoOptin" value="2"
                            {if $privacy == 2}checked {/if}
                            /> <label>Nobody</label><br />
					</p>
                    <!--<p>
                        <input type="checkbox" name="allowFacebook" class="optin" value="3"
                            {foreach from=$optins key=key item=optin}
                                {if $optin.0 == 3}checked {/if}
                            {/foreach}
                            />
   	                    <label for="allowFacebook">Allow TapePlay to import my Facebook info</label>
   	                </p>-->
   	                <p>
   	                    <input type="checkbox" name="relevantAdvertising" class="optin" value="2"
                            {foreach from=$optins key=key item=optin}
                                {if $optin.0 == 2}checked {/if}
                            {/foreach}
                            />
   	                    <label for="relevantAdvertising">
   	                        Use my account info for relevant advertising. Ads help us pay the bills so
                            we can keep improving TapePlay for you.
   	                    </label>
   	                </p>
   	                <!--<p>
   	                    <input type="checkbox" name="sendRecommendations" class="optin" value="1"
                           {foreach from=$optins key=key item=optin}
                               {if $optin.0 == 1}checked {/if}
                           {/foreach}
                           />
   	                    <label for="sendRecommendations">Send me recommendations about how to use TapePlay</label>
   	                </p>-->
				</div>
			</li>
		</ul>
	</div>
	<div id="content-right-column" class="right">
	    {include file='common/sidebar/account.tpl'}
	</div>
</div>