<div class="single">
	<h1>{$player->getFirstName()} {$player->getLastName()}</h1>
	<ul class="video-title-data">
		<li>{$video->getTitle()}</li>
		<li>{$video->getRecordedMonthName()}, {$video->getRecordedYear()}</li>
	</ul>
	<!--<a href="{#baseUrl#}videos/search/{if $goBack ==1}?back=1{/if}" class="return">Back to search results</a>-->
	<div class="clear"></div>
	<div class="video-player">
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
				"controlbar.idlehide": true
            });
        </script>
	</div>
	<div class="video-data">
		<ul>
			<li class="views"><b>{$video->getViews()}</b> Views</li>
			<li class="saves"><b>{$video->getSaves()}</b> Saves</li>
			<li class="upload-date">Uploaded {$video->getUploadDate()|date_format:"%B %d, %Y"}</li>
			<li class="report">
                <div class="infoOpen">
                    Report Video
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p>
                                Should we review this video to determine if it's appropriate?<Br/>
                                <a id="report">Yes</a> or <a class="close">No</a>
                            </p>
                        </div>
                        <div class="bottomLeft"></div>
                        <div class="bottomRight"></div>
                    </div>
                </div>
            </li>
			{if isset($user) && !empty($user)}
                <li class="save"><a href="#">Save</a></li>
            {/if}
			<li class="share">
                <div class="infoOpen">
                    Share
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p>
                                Embed video (copy &amp; paste link):
                                <br/>
                                <a>http://tapeplay.com/asd8f69j</a>
                            </p>
                            <p>Email this video: <a href="/videos/email/{$video->getId()}/">click here</a></p>
                            <p>
                                <span class="postVideo">Post video:</span> <span class="smallShare fbBlackSmall"></span> <span class="smallShare myBlackSmall"></span> <span class="smallShare twBlackSmall"></span> <span class="smallShare inBlackSmall"></span>
                            </p>
                        </div>
                        <div class="bottomLeft"></div>
                        <div class="bottomRight"></div>
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
				<h1>#{$player->getNumber()} {$player->getFirstName()} {$player->getLastName()}</h1>
				<span class="grade"><img src="/media/images/icon_high-school-athlete.png" /></span>
				<ul class="user-profile">
					<li>{$player->getPosition()}, {$player->getFriendlyHeight()}, {$player->getWeight()} lbs.</li>
					<li>{$gradeLevel}{if $player->getSchool()}, {$player->getSchool()->getName()}{/if}</li>
					<li>{$player->getCoachName()}</li>
				</ul>
				
				{if isset($stats) && count($stats) > 0}
					<ul class="user-stats three-column">
						{assign var=i value=0}
						{foreach from=$stats item=stat}
							{if $i % $modder == 0 || $i == 0}
							<li>
							{/if}
							{$stat->getStatName()}: {$stat->getStatValue()}
							{if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
							</li>
							{/if}
							{$i = $i+1}
						{/foreach}
					</ul>
				{/if}
			
				<div class="clear"></div>
			</div>
			<h2>More videos from {$player->getFirstName()} {$player->getLastName()}</h2>
			<ul class="more-videos">
			
				{if isset($videos) && count($videos) > 0}
					{foreach from=$videos item=video}
						{if $video->getPrivacy() == true}
							<li class="locked">
								<a href="#" onclick="return false;"><img src="/media/images/background_lock.png" /></a>
								<div class="video-image">
									<img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}"/>
								</div>
								<ul>
									<li class="video-title">{$video->getTitle()}</li>
									<li class="name">{$player->getFirstName()} {$player->getLastName()}</li>
									<li class="month-year">{$video->getUploadDate()|date_format:"%B %d, %Y"}</li>
								</ul>
								<div class="clear"></div>
							</li>
							<!-- BUBBLE STUFF
							<div class="infoBubble leftCentered">
								<div class="topLeft"></div>
								<div class="topRight"></div>
								<div class="middle">
									<p>
										<strong>We're sorry.</strong> Only account holders can view this video.
										<br/><br/>
										Want to view this video?
										<br/>
										<a>Join</a> or <a>log in</a>.
									</p>
								</div>
								<div class="directionTopLeft"></div>
								<div class="bottomRight"></div>
								<div class="direction"></div>
							</div> -->
						{else}
							<li>
								<a href="{#baseUrl#}videos/view/{$video->getId()}/"></a>
								<div class="video-image">
									<img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}"/>
								</div>
								<ul>
									<li class="video-title">{$video->getTitle()}</li>
									<li class="name">{$player->getFirstName()} {$player->getLastName()}</li>
									<li class="month-year">{$video->getUploadDate()|date_format:"%B %d, %Y"}</li>
								</ul>
								<div class="clear"></div>
							</li>
						{/if}
					{/foreach}
				{/if}
		
			</ul>
		</div>
		<div class="content-right left">
			<div class="ad_300x250 right">
				<a href="{#blogUrl#}" target="_blank"><img src="/media/images/ad_tapeplay-blog_300x250.jpg" /></a>
			</div>
		</div>
	</div>
	
</div>
<div class="clear"></div>

					<!-- SAVE BUBBLE STUFF
					<a id="save">Save</a>

					<div class="infoBubble">
						<div class="directionTopMiddle"></div>
						<div class="topLeft"></div>
						<div class="topRight"></div>
						<div class="middle">
							<p><span class="bold">Success!</span> This video has been saved to your account.</p>
						</div>
						<div class="bottomLeft"></div>
						<div class="bottomRight"></div>
					</div>

					<a class="infoOpen">Save</a>

					<div class="infoBubble">
						<div class="directionTopMiddle"></div>
						<div class="topLeft"></div>
						<div class="topRight"></div>
						<div class="middle">
							<p>
								<span class="bold">We're sorry.</span> Only account holders can save videos.</p>
							</p>
							<p>Please <a href="{#baseUrl#}user/signup/">join</a> or <a href="{#baseUrl#}user/login/">log
								in</a> now.</p>
						</div>
						<div class="bottomLeft"></div>
						<div class="bottomRight"></div>
					</div> -->

				<!-- REPORT BUBBLE STUFF
				<li class="link last">
					<a class="infoOpen">Report Video</a>

					<div class="infoBubble">
						<div class="directionTopMiddle"></div>
						<div class="topLeft"></div>
						<div class="topRight"></div>
						<div class="middle">
							<p>
								Should we review this video to determine if it's appropriate?<Br/>
								<a id="report">Yes</a> or <a class="close">No</a>
							</p>
						</div>
						<div class="bottomLeft"></div>
						<div class="bottomRight"></div>
					</div>
				</li> -->