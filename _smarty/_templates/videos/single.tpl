<div id="landing">
	<div id="video">
		<div id="primaryInfo">
			<div id="left">
				<h2>{$player->getFirstName()} {$player->getLastName()}</h2>

				<p class="title">{$video->getTitle()}</p>

				<p class="date">{$video->getRecordedMonth()} / {$video->getRecordedYear()}</p>
			</div>
			<div id="right">
				<a href="{#baseUrl#}videos/search/">Back to search results</a>
			</div>
		</div>
		<div id="player">

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
					skin:"/media/playback/skin/tapeplayer.zip",
					autostart:false,
					dock:false,
					"controlbar.position":"over"
				});
			</script>

		</div>
		<div id="videoInfo">
			<ul id="left">
				<li class="basic"><span class="bold">{$video->getViews()}</span> views</li>
				<li class="basic"><span class="bold">{$video->getSaves()}</span> saves</li>
				<li class="basic"><span
						class="italic">Uploaded {$video->getUploadDate()|date_format:"%B %d, %Y %I:%M %p"}</span></li>
			</ul>
			<ul id="right">
				<input type="hidden" id="hash" value="{$hash}"/>
				<input type="hidden" id="user-id" value="{$userId}"/>
				<input type="hidden" id="video-id" value="{$video->getId()}"/>
				<li class="link bubble">
					<a class="infoOpen">Share</a>

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

							<p>Email this video: <a href="{#baseUrl#}videos/email/{$video->getId()}/">click here</a></p>

							<p>
								<span class="postVideo">Post video:</span> <span class="smallShare fbBlackSmall"></span>
								<span class="smallShare myBlackSmall"></span> <span
									class="smallShare twBlackSmall"></span> <span
									class="smallShare inBlackSmall"></span>
							</p>
						</div>
						<div class="bottomLeft"></div>
						<div class="bottomRight"></div>
					</div>
				</li>
				<li class="link">
				{if isset($user) && !empty($user)}
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
					{else}
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
					</div>
				{/if}
				</li>
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
				</li>
			</ul>
		</div>
		<div id="leftCol">
			<div id="info">
				<div id="top">
					<div id="person">
						<h3>#{$player->getNumber()} {$player->getFirstName()} {$player->getLastName()}</h3>

						<p>{$player->getPosition()}, {$player->getHeight()}</p>

						<p>{$player->getGradeLevel()}/{$player->getAge()}, {$player->getSchool()->getName()}</p>

						<p>City, State</p>

						<p>Coach's Name</p>
					</div>
					<div id="level">
						<h4>Hs</h4>

						<p>High school athlete</p>
					</div>
				</div>
				<div id="bottom">
				{if isset($stats) && count($stats) > 0}
					<ul class="stats">
						{assign var=i value=0}
						{foreach from=$stats item=stat}
							{if $i % $modder == 0 || $i == 0}
							<li>
							{/if}
							<p>{$stat->getStatName()}: {$stat->getStatValue()}</p>
							{if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
							</li>
							{/if}
							{$i = $i+1}
						{/foreach}
					</ul>
				{/if}
				</div>
			</div>
			<div id="moreVideos">
				<h2>More videos from [name]</h2>
			{if isset($videos) && count($videos) > 0}
				{foreach from=$videos item=video}
					{if $video->getPrivacy() == true}
						<div class="result infoOpen">
							<div class="opaque">
								<img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}"
									 class="resultImage locked"/>

								<div class="info">
									<h4>{$video->getTitle()}</h4>

									<p class="title">{$player->getFirstName()} {$player->getLastName()}</p>

									<p class="date">{$video->getUploadDate()}</p>
								</div>
							</div>
						</div>
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
						</div>
						{else}
						<a href="{#baseUrl#}videos/view/{$video->getId()}/">
							<div class="result">
								<img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage"/>

								<div class="info">
									<h4>{$video->getTitle()}</h4>

									<p class="title">{$player->getFirstName()} {$player->getLastName()}</p>

									<p class="date">{$video->getUploadDate()}</p>
								</div>
							</div>
						</a>
					{/if}
				{/foreach}
			{/if}
			</div>
		</div>
		<div id="rightCol">
			<div id="sideAd">
				<p>Hello</p>
			</div>
			<div id="facebook"></div>
		</div>
	</div>
</div>
<div id="ad">
	<h1>Ad</h1>
</div>