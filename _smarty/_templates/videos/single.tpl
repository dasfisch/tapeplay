<div class="single" xmlns="http://www.w3.org/1999/html">
	<h1>{$player->getFirstName()} {$player->getLastName()}</h1>
	<ul class="video-title-data">
		<li>{$video->getTitle()}</li>
		<li>
            {if $video->getRecordedMonth() != 0}
                {$video->getRecordedMonthName()},
            {/if}
            {if $video->getRecordedYear() != 0}
                {$video->getRecordedYear()}
            {/if}
        </li>
	</ul>
	<!--<a href="{#baseUrl#}videos/search/{if $goBack ==1}?back=1{/if}" class="return">Back to search results</a>-->
	<div class="clear"></div>
	<div class="video-player">
        {if isset($videoDisplayInfo) && !empty($videoDisplayInfo)}
            <video id="videoPlayer" width="890" height="455">
                <source src="{$videoDisplayInfo->getMp4Source()}"
                        type="video/mp4"/>
                <source src="{$videoDisplayInfo->getWebmSource()}"
                        type="video/webm"/>
            </video>
            <script type='text/javascript'>
                jwplayer('videoPlayer').setup({
                    modes:[
                        { type:"html5" },
                        { type:"flash", src:"/media/playback/player.swf" },
                        { type:"download" }
                    ],
                    skin:"/media/playback/skins/normal/tapeplayer.zip",
                    autostart:false,
                    dock:false,
                    "controlbar.position":"over",
                    "controlbar.idlehide": true,
                    "plugins": {
                          "gapro-2": {}
                    }
                });
            </script>
        {else}
            <center>We're sorry! The video you requested is not currently available!</center>
        {/if}
	</div>
	<div class="video-data">
		<ul>
			<li class="views"><b>{$video->getViews()}</b> Views</li>
			<!--<li class="saves"><b>{$video->getSaves()}</b> Saves</li>-->
			<li class="upload-date">Uploaded {$video->getUploadDate()|date_format:"%B %d, %Y"}</li>
			<li class="report">
                <div class="popup-hover pos-1">
					<a href="#" class="open share-title">Report Video</a>
					<div class="popup popup-1">
						<div class="holder">
							<div class="frame">
								<p>Should we review this video to determine if it&rsquo;s appropriate?</p>
                                <p><a id="report">Yes, please review</a></p>
							</div>
						</div>
					</div>
				</div>
            </li>
			{if isset($user) && !empty($user)}
                <!--<li class="save"><a href="#">Save</a></li>-->
            {/if}
			<li class="share">
				<div class="popup-hover pos-1">
					<a href="#" class="open share-title">Share</a>
					<div class="popup popup-1">
						<div class="holder">
							<div class="frame">
								<p><strong>Embed video</strong> (copy &amp; paste link): <br /><span class="mark link" onclick="jQuery(this).select()">{#baseUrl#}videos/view/{$video->getId()}/</span></p>
								<p><strong>Email video:</strong> <a href="{#baseUrl#}videos/email/{$video->getId()}/">click here</a></p>
								<div class="social">
									<strong>Post video:</strong>
									<ul>
										<li><a href="#" onclick="openFacebook('{#baseUrl#}videos/view/{$video->getId()}/')"><img src="/media/images/ico-facebook.gif" width="10" height="19" alt="Share on Facebook" /></a></li>
										<li><a href="#" onclick="openGooglePlus('{#baseUrl#}videos/view/{$video->getId()}/')"><img src="/media/images/ico-googleplus.gif" width="16" height="19" alt="Share on Google+" /></a></li>
										<li><a href="#" onclick="openTwitter('{#baseUrl#}videos/view/{$video->getId()}/', '{$video->getTitle()} Feat. {$video->getPlayer()->getFirstName()} on TapePlay')"><img src="/media/images/ico-twitter.gif" width="13" height="19" alt="Share on Twitter" /></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </li>
		</ul>
		<input type="hidden" id="hash" value="{$hash}"/>
		<input type="hidden" id="user-id" value="{$userId}"/>
		<input type="hidden" id="video-id" value="{$video->getId()}"/>
		<div class="clear"></div>
	</div>

	<div class="video-content">
		<div class="content-left left">
			<div class="user-info">
				<h1>{if $player->getNumber() != 0}#{$player->getNumber()} {/if}{$player->getFirstName()} {$player->getLastName()}</h1>
				<span class="grade">
					{if $player->getPlayingLevel() == "0"}
						<img src="/media/images/icon_high-school-athlete.png" alt="High School Athlete" title="High School Athlete"/>
					{elseif $player->getPlayingLevel() == "1"}
						<img src="/media/images/icon_college-athlete.png" alt="College Athlete" title="College Athlete"/>
					{elseif $player->getPlayingLevel() == "2"}
						<img src="/media/images/icon_professional-athlete.png" alt="Professional Athlete" title="Professional Athlete"/>
					{/if}
				</span>
				<ul class="user-profile">
					<li>
                        {foreach from=$player->getPosition() key=key item=position}
                            {if $position->getName() != 'Individual'}
                                {$position->getName()},
                            {/if}
                        {/foreach}
                    {if $player->getHeight() != "" && $player->getHeight() != 0}
                        {$player->getFriendlyHeight()},
                    {/if}
                    {if $player->getWeight() != "" && $player->getWeight() != 0}
                        {$player->getWeight()} lbs.</li>
                    {/if}
                    <li>
                        {if $gradeLevel != ""}
                            {$gradeLevel},
                        {/if}
                        {if $player->getSchool()->getName() != ""}
                            {$player->getSchool()->getName()}
                        {/if}
                    </li>
					<li>
                        {if $player->getCoachName() != "" && $player->getCoachName() != 0}
                            Coach {$player->getCoachName()}
                        {/if}
                    </li>
				</ul>

				{if isset($stats) && count($stats) > 0}
					<ul class="user-stats three-column">
						{assign var=i value=0}
						{foreach from=$stats item=stat}
                            {if $stat->getStatValue() != 0}
                                <li>
                                    {$stat->getStatName()}: <span class="stat-bold">{$stat->getStatValue()}</span>
                                </li>
                                {$i = $i+1}
                            {/if}
						{/foreach}
					</ul>
				{/if}
                {if $player->getLastUpdate() > 0}
                    <p class="italic">Statistics last updated {$player->getLastUpdate()|date_format:"%B %d, %Y"}</p>
                {/if}
			</div>
            {if isset($videos) && count($videos) > 0}
                {if count($videos) > 1}
                    <h2>More videos from {$player->getFirstName()} {$player->getLastName()}</h2>
                    <ul class="more-videos">
                        {foreach from=$videos item=single}
                            {if $video->getId() != $single->getId()}
                                {if $single->getPrivacy() == true}
                                    <li class="locked">
                                        <a href="#" onclick="return false;" title="{$single->getTitle()}"><img src="/media/images/background_lock.png" /></a>
                                        <div class="video-image">
                                            {if isset($fileExists) && $fileExists == true}
                                                <img src="{#pandaBase#}{$single->getPandaId()}{#pandaImageExt#}" class="resultImage" />
                                            {else}
                                                <img src="{#baseUrl#}media/images/defaultImage.gif" class="resultImage" />
                                            {/if}
                                        </div>
                                        <ul>
                                            <li class="video-title">{$single->getTitle()}</li>
                                            <li class="name">{$player->getFirstName()} {$player->getLastName()}</li>
                                            <li class="month-year">
                                                {if $single->getRecordedMonth() != 0}
                                                    {$single->getRecordedMonthName()},
                                                {/if}
                                                {if $single->getRecordedYear() != 0}
                                                    {$single->getRecordedYear()}
                                                {/if}
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </li>
                                {else}
                                    <li>
                                        <a href="{#baseUrl#}videos/view/{$single->getId()}/" title="{$single->getTitle()}"></a>
                                        <div class="video-image">
                                            {if isset($fileExists) && $fileExists == true}
                                                <img src="{#pandaBase#}{$single->getPandaId()}{#pandaImageExt#}" class="resultImage" />
                                            {else}
                                                <img src="{#baseUrl#}media/images/defaultImage.gif" class="resultImage" />
                                            {/if}
                                        </div>
                                        <ul>
                                            <li class="video-title">{$single->getTitle()}</li>
                                            <li class="name">{$player->getFirstName()} {$player->getLastName()}</li>
                                            <li class="month-year">
                                                {if $single->getRecordedMonth() != 0}
                                                    {$single->getRecordedMonthName()},
                                                {/if}
                                                {if $single->getRecordedYear() != 0}
                                                    {$single->getRecordedYear()}
                                                {/if}
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </li>
                                {/if}
                            {/if}
                        {/foreach}
                    </ul>
                {else}
                    <h2>No new videos yet</h2>
                {/if}
            {/if}
		</div>
		<div class="content-right left">
			<div class="ad_300x250 right">
                <script type="text/javascript"><!--
                    google_ad_client = "ca-pub-2948319886060799";
                    /* TapePlay - Main */
                    google_ad_slot = "1192989575";
                    google_ad_width = 300;
                    google_ad_height = 250;
                    //-->
                    </script>
                    <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>
			</div>
		</div>
	</div>
	
</div>
<div class="clear"></div>