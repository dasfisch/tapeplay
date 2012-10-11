<div class="account-page">
	<div id="content-left-column">
	    <h1>Welcome, {$user->getFirstName()}</h1>
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
                                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" width="125" height="94" alt="image description" />
                                            <div class="text-holder">
                                                <strong class="title">{$video->getTitle()}</strong>
                                                <div class="category">{$video->getSport()->getSportName()}</div>
                                                <span class="date">
                                                    {if $video->getRecordedMonth() != 0}
                                                        {$video->getRecordedMonth()} /
                                                    {/if}
                                                    {if $video->getRecordedYear() != 0}
                                                        {$video->getRecordedYear()}
                                                    {/if}
                                                </span>
                                                <div class="time"></div>
                                                <em class="info">Views: {$video->getViews()}, Saves: {$video->getSaves()}</em>
                                                <div class="btn-holder">
                                                    <a class="btn edit"><span>Edit</span></a><br />
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
								<div class="category">{$user->getBirthYear()} / {$user->getGender()} / {$user->getZipcode()}</div>
                                <div class="accountInfo hidden">
                                    <fieldset>
                                           {html_select_date
                                               start_year=$thirteenBelow
                                               display_days=false
                                               display_months=false
                                               end_year="-50"
                                               prefix='_birth'
                                               all_extra='class="select-5" id="_birthYear"'
                                               reverse_years=true
                                               time=$selected
                                           }
                                    </fieldset>
                                </div>
                                <div class="accountInfo hidden">
                                    <fieldset>
                                        <select class="select-6" name="_gender" id="_gender">
                                           <option value="M"{if $user->getGender() == 'M'} selected{/if}>Male</option>
                                           <option value="F"{if $user->getGender() == 'F'} selected{/if}>Female</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 width450 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="password" class="standard" id="_zipcode" name="zipcode" value="{$user->getZipcode()}" />
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
                                    <div class="accountInfo hidden">
                                        <fieldset>
                                            <select class="select-6" name="gradeLevel" id="_gradeLevel">
                                                <option>Select a Grade</option>
                                                {section name=i start=9 loop=17 step=1}
                                                    <option value="{$smarty.section.i.index}"
                                                        {if $player->getGradeLevel() == $smarty.section.i.index}selected {/if}
                                                            >{$gradeLevels[$smarty.section.i.index]}</option>
                                                 {/section}
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="accountInfo hidden">
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
                                    </div>
                                    <div class="accountInfo hidden">
                                        <div class="input_custom-text input_text80 width450 left">
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
                                    {$player->getHeight()} / {$player->getWeight()} lbs</div>
                                    <div class="accountInfo hidden">
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
                                    </div>
                                    <div class="accountInfo hidden">
                                        <fieldset>
                                            <select class="select-5" class="height" id="_height" name="height">
                                                <option class="default">Select</option>
                                                {section name=i start=48 loop=96 step=1}
                                                    <option value="{$smarty.section.i.index}"{if $player->getHeight() == $smarty.section.i.index} selected="selected"{/if}>
                                                        {floor($smarty.section.i.index/12)}' {$smarty.section.i.index % 12}"
                                                    </option>
                                                {/section}
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="accountInfo hidden">
                                        <div class="input_custom-text input_text80 width185 left">
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
                                                <input type="text" class="standard small" id="schoolSearchInput" name="schoolName"
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
                                            {assign var=i value=0}
                                            {assign var=statCount value=$player->getStats()|@count}
                                            {math assign=modder equation='statCount / 3' statCount=$statCount}
                                            {foreach from=$player->getStats() item=stat}
                                                {if $i%$modder|ceil == 0 || $i == 0}
                                                    <li>
                                                {/if}
                                                    <div class="stat">
                                                        <p>
                                                            {$stat->getStatName()}:
                                                            <span class="bold">{$stat->getStatValue()}</span>
                                                        </p>
                                                    </div>
                                                {if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
                                                    </li>
                                                {/if}
                                                {$i=$i+1}
                                            {/foreach}
                                        </ul>
                                    {/if}
                                    <div class="statHidden hidden">
                                        {assign var=j value=0}
                                        {assign var=statCount value=$player->getSport()->getStats()|@count}
                                        {math assign=hiddenModder equation='statCount / 3' statCount=$statCount}
                                        <ul class="three-column">
                                            {foreach $player->getSport()->getStats() as $stat}
                                                {if $j%$hiddenModder|ceil == 0 || $j == 0}
                                                    <li>
                                                {/if}
                                                    <p>
                                                        {$stat->getStatName()}:
                                                    </p>
                                                    <div class="input_custom-text input_text36 left">
                                                        <div class="custom-input_center custom-input_partial">
                                                            <span class="custom-input_top"></span>
                                                            {assign var=inputSet value=true}
                                                            {foreach from=$player->getStats() item=myStat}
                                                                {if $myStat->getId() == $stat->getId()}
                                                                    <input type="text" class="standard small" id="stat" name="stat-{$stat->getId()}"
                                                                        value="{$myStat->getStatvalue()}" />
                                                                    {$inputSet=false}
                                                                    {continue}
                                                                {/if}
                                                            {/foreach}
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
                                                {if ($j%$hiddenModder == $hiddenModder - 1 && $j > $hiddenModder) || $j == ($statCount - 1)}
                                                    </li>
                                                {/if}
                                                {$j=$j+1}
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
                    <p>
                        <input type="checkbox" name="allowFacebook" class="optin" value="3"
                            {foreach from=$optins key=key item=optin}
                                {if $optin.0 == 3}checked {/if}
                            {/foreach}
                            />
   	                    <label for="allowFacebook">Allow TapePlay to import my Facebook info</label>
   	                </p>
   	                <p>
   	                    <input type="checkbox" name="relevantAdvertising" class="optin" value="2"
                            {foreach from=$optins key=key item=optin}
                                {if $optin.0 == 2}checked {/if}
                            {/foreach}
                            />
   	                    <label for="relevantAdvertising">
   	                        Use my account info for relevant advertising.
   	                        <a class="infoOpen">Why?</a>
   	                        <div class="infoBubble">
   	                            <div class="topLeft black"></div>
   	                            <div class="directionTopRight"></div>
   	                            <div class="middle">
   	                                <p>
   	                                    Help us out by using your account info for relevant
   	                                    advertising. Ads help us pay the bills so we can
   	                                    keep improving TapePlay for you.
   	                                </p>
   	                            </div>
   	                            <div class="bottomLeft"></div>
   	                            <div class="bottomRight"></div>
   	                            <div class="direction"></div>
   	                        </div>
   	                    </label>
   	                </p>
   	                <p>
   	                    <input type="checkbox" name="sendRecommendations" class="optin" value="1"
                           {foreach from=$optins key=key item=optin}
                               {if $optin.0 == 1}checked {/if}
                           {/foreach}
                           />
   	                    <label for="sendRecommendations">Send me recommendations about how to use TapePlay</label>
   	                </p>
				</div>
			</li>
		</ul>
	</div>
	<div id="content-right-column" class="right">
	    {include file='common/sidebar/account.tpl'}
	</div>
</div>