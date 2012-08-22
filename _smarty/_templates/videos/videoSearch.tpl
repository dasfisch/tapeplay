<div id="content-left-column" class="left">
    <div id="search">
        <form name="search" method="post" action="{#baseUrl#}videos/search/">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="searchVal" name="searchVal" />
                </div>
                <div class="right"></div>
            </div>
            <div class="bigButton black">
                <div class="topRight whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Search" id="sendSearch" class="large black" />
                </div>
            </div>
        </form>
    </div>
    {if $videoCount > 0}
        <p class="resultTotal">{$videoCount} results</p>
    {/if}
    <div id="results">
        {if $videoCount > 0}
            {foreach from=$videos item=video}
                {if $video->getPrivacy() == true}
                    <div class="result opaque">
                        <div class="infoOpen">
                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage locked" />
                            <div class="info">
                                <h2>{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</h2>
                                <p class="position"></p>
                                <p class="title">{$video->getTitle()}</p>
                                <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                            </div>
                        </div>
                        <div class="infoBubble">
                            <div class="topLeft"></div>
                            <div class="topRight"></div>
                            <div class="middle">
                                <p>
                                    <strong>We're sorry.</strong> Only account holders can view this video.
                                    <br /><br />
                                    Want to view this video?
                                    <br />
                                    <a>Join</a> or <a>log in</a>.
                                </p>
                            </div>
                            <div class="directionBottomRight"></div>
                            <div class="bottomRight"></div>
                            <div class="direction"></div>
                        </div>
                    </div>
                {else}
                    <a href="{#baseUrl#}videos/view/{$video->getId()}/">
                        <div class="result">
                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage" />
                            <div class="info">
                                <h2>{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</h2>
                                <p class="position">Chicago, IL</p>
                                <p class="title">{$video->getTitle()}</p>
                                <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                            </div>
                        </div>
                    </a>
                {/if}
            {/foreach}
        {else}
            <h2 class="nothing">No results were found!</h2>
            <p class="nothing">Please try a different search!</p>
        {/if}
    </div>
    {if $videoCount > 0}
        {include file='common/pagination.tpl'}
    {/if}
</div>
<div id="content-right-column" class="right">
    {include file='common/sidebar/share.tpl'}
</div>