<div id="main">
    <div id="top">
        <h2>Browse</h2>
        <p>Or <a href="{#baseUrl#}videos/search/">search</a> by criteria</p>
    </div>
    <div id="results">
        {if isset($videos) && !empty($videos)}
            {foreach from=$videos item=video}
                {if $video->getPrivacy() == true}
                    <div class="result">
                        <a class="infoOpen">
                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage locked" />
                            <p class="name">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</p>
                            <p>{$video->getPlayer()->getPosition()}, {$video->getPlayer()->getHeight()}"</p>
                            <p>{$video->getUploadDate()|date_format:"%B %Y"}</p>
                        </a>
                        <div class="infoBubble topCentered">
                            <div class="directionTopMiddle"></div>
                            <div class="topLeft"></div>
                            <div class="topRight"></div>
                            <div class="middle">
                                <p>
                                    <strong>We're sorry.</strong> Only account holders can view this video.
                                    <br /><br />
                                    Want to view this video?
                                    <br />
                                    <a href="{#baseUrl#}user/signup/">Join</a> or <a href="{#baseUrl#}user/login/">log in</a>.
                                </p>
                            </div>
                            <div class="bottomLeft"></div>
                            <div class="bottomRight"></div>
                        </div>
                    </div>
                {else}
                    <div class="result">
                        <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage" />
                        <p class="name">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</p>
                        <p>{$video->getPlayer()->getPosition()}, {$video->getPlayer()->getHeight()}"</p>
                        <p>{$video->getUploadDate()|date_format:"%B %Y"}</p>
                    </div>
                {/if}
            {/foreach}
        {else}
            <h2 class="nothing">No results were found!</h2>
            <p class="nothing">Please try a different search!</p>
        {/if}
    </div>
    {if isset($videos) && !empty($videos)}
        {if $videos.0->count > 15}
            <div id="showMore">
                <div class="bigButton black">
                    <div class="topLeft whiteBg"></div>
                    <div class="topRight whiteBg"></div>
                    <div class="bottomLeft whiteBg"></div>
                    <div class="bottomRight whiteBg"></div>
                    <div class="middle">
                        <!--<input type="submit" value="Show More Players" id="show" class="large black" />-->
                        <a href="{#baseUrl#}videos/browse/?page={$page+1}" class="large black">Show More Players</a>
                    </div>
                </div>
            </div>
        {/if}
    {/if}
</div>
<div id="ad">
    ad
</div>