<div class="account-page">
	<div id="content-left-column">
	    <h1>Welcome, {$user->getFirstName()} {$user->getLastName()}</h1>
	    <input type="hidden" id="hash" value="{$hash}" />
	    <input type="hidden" id="user-id" value="{$user->getUserId()}" />
	    <ul class="accordion">
			<li class="active">
				<a class="opener">{$myVideoWording} ({$videoCount})</a>
				<div class="slide">
					<div class="holder scrollable-area">
						<ul>
							{if isset($videos) && !empty($videos)}
	                        	{foreach $videos as $video}
									<li>
                                        <a href="{#baseUrl#}videos/view/{$video->getId()}">
                                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" width="125" height="94" alt="image description" />
                                            <div class="text-holder">
                                                <strong class="title">{$video->getTitle()}</strong>
                                                <div class="category">{$user->getSport()->getSportName()}</div>
                                                <span class="date">{$video->getUploadDate()|date_format:"%B, %Y"}</span>
                                                <div class="time">12:00</div>
                                                <em class="info">Views: {$video->getViews()}, Saves: {$video->getSaves()}</em>
                                                <div class="btn-holder">
                                                    <a class="btn edit"><span>Edit</span></a><br />
                                                    <a class="btn delete"><span>Delete</span></a>
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
			<li>
				<a class="opener">{$user->getSport()->getSportName()}</a>
				<div class="slide slider_sport">
					<ul>
						<li>
							<div class="text-holder">
								<strong class="title">Level / Grade / Number</strong>
                                <div class="category">
                                    {if $user->getPlayingLevel() == 0}
                                        High School
                                    {elseif $user->getPlayingLevel() == 1}
                                        College
                                    {elseif $user->getPlayingLevel() == 2}
                                        Professional
                                    {/if}
                                    / {$user->getGradeLevel()} / #{$user->getNumber()}</div>
                                <div class="accountInfo hidden">
                                    <fieldset>
                                        <select class="select-6" name="gradeLevel" id="_gradeLevel">
                                            <option>Select a Grade</option>
                                            {section name=i start=9 loop=17 step=1}
                                                <option value="{$smarty.section.i.index}"
                                                    {if $user->getGradeLevel() == $smarty.section.i.index}selected {/if}
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
                                                {if $user->getPlayingLevel() == 0}checked{/if}
                                                    />
                                        </li>
                                        <li>
                                            <label for="college" class="singleCheck">
                                                <span class="checkbox"><span class="check"></span></span>
                                                <span class="display">College</span>
                                            </label>
                                            <input type="checkbox" class="single" name="playingLevel" id="_playingLevel" value="1"
                                                {if $user->getPlayingLevel() == 1}checked{/if}
                                            />
                                        </li>
                                        <li>
                                            <label for="professional" class="singleCheck">
                                                <span class="checkbox"><span class="check"></span></span>
                                                <span class="display">Professional</span>
                                            </label>
                                            <input type="checkbox" class="single" name="playingLevel" id="_playingLevel" value="2"
                                                {if $user->getPlayingLevel() == 2}checked{/if}
                                            />
                                        </li>
                                    </ul>
                                </div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 width450 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="text" class="standard" id="_number" name="number" value="{$user->getNumber()}" />
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
                                {foreach from=$user->getPosition() key=key item=position}
                                    {if $user->getPosition()|@count gt 0}
                                        {if $key lt $user->getPosition()|@count - 1}
                                            {$position->getName()},
                                        {else}
                                            {$position->getName()} /
                                        {/if}
                                    {/if}
                                {/foreach}
                                {$user->getHeight()} / {$user->getWeight()} lbs</div>
                                <div class="accountInfo hidden">
                                    <ul class="font15">
                                        {foreach from=$positions key=key item=position}
                                            <li>
                                                <label
                                                    {foreach from=$user->getPosition() key=key item=myPosition}
                                                        {if $position->getId() == $myPosition->getId()}class="on"{/if}
                                                    {/foreach}>
                                                    <span class="checkbox"><span class="check"></span></span>
                                                    <span class="display">{$position->getName()}</span>
                                                </label>
                                                <input type="checkbox" name="playingLevel" id="_position" value="{$position->getId()}"
                                                    {foreach from=$user->getPosition() key=key item=myPosition}
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
                                                <option value="{$smarty.section.i.index}"{if $user->getHeight() == $smarty.section.i.index} selected="selected"{/if}>
                                                    {floor($smarty.section.i.index/12)}" {$smarty.section.i.index % 12}'
                                                </option>
                                            {/section}
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 width185 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="text" class="standard" id="_weight" name="weight" value="{$user->getWeight()}" />
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
								<div class="category">{$user->getSchool()->getName()}</div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            {assign var=school value=$user->getSchool()->getName()}
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
								<div class="category">{$user->getCoachName()}</div>
                                <div class="accountInfo hidden">
                                    <div class="input_custom-text input_text80 left">
                                        <div class="custom-input_center custom-input_partial">
                                            <span class="custom-input_top"></span>
                                            <input type="text" class="standard small" id="_coachName" name="coachName" value="{$user->getCoachName()}" />
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
									<ul class="three-column">
										{assign var=i value=0}
			                            {foreach from=$stats item=stat}
			                                {if $i%$modder == 0 || $i == 0}
			                                    <li>
			                                {/if}
                                                <div class="stat">
                                                    <p>
                                                        {$stat->getStatName()}:
                                                        <span class="bold">{$stat->getStatValue()}</span>
                                                    </p>
                                                </div>
                                                <div class="statHidden hidden">
                                                    <p>
                                                        {$stat->getStatName()}:
                                                    </p>
                                                    <div class="input_custom-text input_text36 left">
                                                        <div class="custom-input_center custom-input_partial">
                                                            <span class="custom-input_top"></span>
                                                            <input type="text" class="standard small" id="stat" name="stat-{$stat->getId()}" value="{$stat->getStatValue()}" />
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
			                                {if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
			                                    </li>
			                                {/if}
			                                {$i=$i+1}
			                            {/foreach}
									</ul>
								<div class="btn-holder">
									<a class="btn edit" id="statButton"><span>Edit</span></a><br />
								</div>
							</div>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<a class="opener">Privacy</a>
				<div class="slide slider_privacy">
					<p>
						Who can view my videos?<br />
                        <input type="radio" name="visibility" class="videoOptin" value="0"
                            {if $privacy == 0}selected {/if}
                            /> <label>Anybody</label><br />
   	                    <input type="radio" name="visibility" class="videoOptin" value="1"
                            {if $privacy == 1}selected {/if}
                            /> <label>Scouts and Coaches</label><br />
   	                    <input type="radio" name="visibility" class="videoOptin" value="2"
                            {if $privacy == 2}selected {/if}
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