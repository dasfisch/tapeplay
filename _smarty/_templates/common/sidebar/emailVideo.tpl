<ul>
	<li>
		<span>Copy the link to share</span>

		<div class="input_custom-text width300 input_text36">
			<div class="custom-input_center custom-input_partial">
				<span class="custom-input_top"></span> <input type="email" required=""
															  value="{#baseUrl#}watch/{$video->getId()}/" class="embed"
															  name="embed" onclick="jQuery(this).select()"/> <span
					class="custom-input_bottom"></span>
			</div>

			<div class="custom-input_left custom-input_partial">
				<span class="custom-input_top"></span> <span class="custom-input_bottom"></span>
			</div>

			<div class="custom-input_right custom-input_partial">
				<span class="custom-input_top"></span> <span class="custom-input_bottom"></span>
			</div>
		</div>
	</li>
</ul>
<span>Other ways to share&hellip;</span>
<ul id="get-connected">
	<li id="get-connected_facebook"><a id="share-facebook" href="#"
									   onclick="openFacebook('{#baseUrl#}watch/{$video->getId()}/')"
									   title="{#facebookTitle#}">{#facebookTitle#}</a></li>
	<li id="get-connected_google-plus"><a id="shareGooglePlus" href="#"
										  onclick="openGooglePlus('{#baseUrl#}watch/{$video->getId()}/')"
										  title="{#googlePlusTitle#}">{#googlePlusTitle#}</a></li>
	<li id="get-connected_twitter"><a id="shareTwitter" href="#"
									  onclick="openTwitter('{#baseUrl#}watch/{$video->getId()}/', '{$video->getTitle()} Feat. {$video->getPlayer()->getFirstName()} on TapePlay')"
									  title="{#twitterTitle#}">{#twitterTitle#}</a></li>
	<li id="get-connected_myspace"><a id="shareMySpace" href="#"
									  onclick="openMySpace('{#baseUrl#}watch/{$video->getId()}/')"
									  title="{#myspaceTitle#}">{#myspaceTitle#}</a></li>
</ul>
<div class="clear"></div>