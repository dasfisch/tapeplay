<div class="beta_home">
	<h1>Let&rsquo;s get you noticed.</h1>
	<!--<h2>The world&rsquo;s evolved. So has recruiting.</h2>-->
	<div class="beta-banner">
		<div class="left sign-up">
			<h3>Dear Players:</h3>
			<p>
				To get in front of coaches and scouts across the country, simply upload video of your best game tape.<br />
				<span class="bold">It&rsquo;s absolutely free.</span>
			</p>
			<p class="button">
				<a class="button button_black_large button_round" href="/user/signup/">Join</a>
			</p>

			<p class="beta-banner-footer clear">
				TapePlay is for 9<sup>th</sup> Grade to Pro
			</p>
		</div>
		<div class="right sign-up-banner">
			<img src="/media/images/beta_home-page-banner.jpg" alt="Player To-Do List: Join, Upload your game tape, Share and get notice" />
		</div>
	</div>
	<div class="sub-home-sub-info">
		<div class="left video">
			<h2>See How TapePlay Works</h2>
			<div id="player">
                {if isset($videoDisplayInfo) && $videoDisplayInfo->getMp4Source() != ''}
                    <script type='text/javascript'>
                        jwplayer('player').setup({
                            width: 522,
                            height: 302,
                            levels: [
                                {ldelim}file: '{$videoDisplayInfo->getMp4Source()}', type: 'video/mp4' {rdelim},
                                {ldelim}file: '{$videoDisplayInfo->getWebmSource()}', type: 'video/webm' {rdelim},
                            ],
                            modes:[
                                { type:"html5" },
                                { type:"flash", src:"/media/playback/player.swf" },
                                { type:"download" }
                            ],
                            skin:"/media/playback/skins/small/tapeplayer.zip",
                            autostart:false,
                            stretching: 'none',
                            dock:false,
                            "controlbar.position":"over",
                            "controlbar.idlehide": true
                        });
                    </script>
                {/if}
			</div>
		</div>
		<div class="right copy">
			<div class="info">
				<h3>Get Insider Tips</h3>
				<p>
					Discover how to get noticed by coaches and scouts at our blog. You&rsquo;ll find out about the entire recruiting process, including what makes a video stand out, recruiting events and much more. <a href="{#blogUrl#}" target="_blank" title="View Blog">View Blog</a>
				</p>
			</div>
			<div class="info">
				<h3>Subscribe to Email Updates</h3>
				<form action="http://tapeplay.us4.list-manage.com/subscribe/post?u=30d887a41346b444923a0fe35&amp;id=14ed2d8794" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<ul class="form-fields">
						<li class="input-field clear">
							<div class="input_custom-text width175 input_text36 left">
								<div class="custom-input_center custom-input_partial">
									<span class="custom-input_top"></span>
									<input type="email" name="EMAIL" class="email" id="mce-EMAIL" value="Enter Email Address" required onfocus="if (value == 'Enter Email Address') { value = ''; }" onblur="if (value == '') { value = 'Enter Email Address'; }"/>
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
							<button type="submit" id="mc-embedded-subscribe" name="subscribe" value="Submit" class="button_black_small left">Submit</button>
						</li>
					</ul>
				</form>
				<div class="follow-us clear">
					<ul>
						<li>Follow Us:</li>
						<li><a href="{#facebookUrl#}" target="_blank" title="TapePlay on Facebook"><img src="/media/images/icon_mini-facebook.gif"/></a></li>
						<li><a href="{#googlePlusUrl#}" target="_blank" title="TapePlay on Google+"><img src="/media/images/icon_mini-googleplus.gif"/></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>