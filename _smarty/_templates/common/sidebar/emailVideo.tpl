<script type="text/javascript">

function openFacebook(url, title)
{
	window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(url) + '&t=' + encodeURIComponent(title), 'fbSharer', 'toolbar=0,status=0,width=626,height=436');
	return false;
}

function openGooglePlus(url)
{
	window.open(' https://plus.google.com/share?url=' + encodeURIComponent(url), 'gSharer', 'toolbar=0,status=0,width=626,height=436');
	return false;
}

</script>
<ul>
	<li>
		<span>Copy the link to share</span>
		<div class="input_custom-text width300 input_text36">
			<div class="custom-input_center custom-input_partial">
				<span class="custom-input_top"></span>
				<input type="email" required="" value="{#baseUrl#}videos/view/{$video->getId()}/" class="embed" name="embed">
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
<span>Other ways to share&hellip;</span>
<ul id="get-connected">
	<li id="get-connected_facebook"><a id="share-facebook" href="#" onclick="openFacebook('{#baseUrl#}videos/view/{$video->getId()}/', '{$video->getTitle()} Feat. {$video->getPlayer()->getFirstName()} on TapePlay')" title="{#facebookTitle#}">{#facebookTitle#}</a></li>
	<li id="get-connected_google-plus"><a id="shareGooglePlus" href="#" onclick="openGooglePlus('{#baseUrl#}videos/view/{$video->getId()}/')" title="{#googlePlusTitle#}">{#googlePlusTitle#}</a></li>
</ul>
<div class="clear"></div>