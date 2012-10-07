<h1>Browse</h1>

{if isset($videos) && !empty($videos)}
	<ul class="browse">
    {foreach from=$videos item=video}
        {if $video->getPrivacy() == true}
        	<li class="locked">
				<a href="#" onclick="return false;"><img src="/media/images/background_lock.png" /></a>
				<ul>
					<li class="video-image"><img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}"/></li>
					<li class="name">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</li>
					<li class="position-height">{$video->getPlayer()->getPosition()}, {$video->getPlayer()->getFriendlyHeight()}</li>
					<li class="month-year">{$video->getUploadDate()|date_format:"%B %Y"}</li>
				</ul>
			</li>
        {else}
        	<li>
	        	<a href="{#baseUrl#}videos/view/{$video->getId()}/"></a>
				<ul>
					<li class="video-image"><img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}"/></li>
					<li class="name">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</li>
					<li class="position-height">{$video->getPlayer()->getPosition()}, {$video->getPlayer()->getFriendlyHeight()}</li>
					<li class="month-year">{$video->getUploadDate()|date_format:"%B %Y"}</li>
				</ul>
        	</li>
        {/if}
    {/foreach}
    </ul>
{else}
    <h2>Sorry, no results were found.</h2>
{/if}

<div class="clear"></div>
{if isset($videos) && !empty($videos)}
    {if $videos.0->count > 15}
        <div class="center">
			<button href="#" class="button_black_large button_round">Show More Players</button>
		</div>
    {/if}
{/if}