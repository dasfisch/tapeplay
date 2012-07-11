<div id="landing">
    <div id="video">
        <div id="primaryInfo">
            <div id="left">
                <h2>{$player->getFirstName()} {$player->getLastName()}</h2>
                <p class="title">{$video->getTitle()}</p>
                <p class="date">{$video->getRecordedMonth()} / {$video->getRecordedYear()}</p>
            </div>
            <div id="right">
                <p>Back to search results</p>
            </div>
        </div>
        <!--<div id="player">{$videoPlayer}</div>-->
        <div id="player"></div>
        <div id="videoInfo">
            <ul id="left">
                <li class="basic"><span class="bold">{$video->getViews()}</span> views</li>
                <li class="basic"><span class="bold">{$video->getSaves()}</span> saves</li>
                <li class="basic"><span class="italic">Uploaded {$video->getUploadDate()|date_format:"%B %d, %Y %I:%M %p"}</span></li>
            </ul>
            <ul id="right">
                <input type="hidden" id="hash" value="{$hash}" />
                <input type="hidden" id="user-id" value="2" />
                <input type="hidden" id="video-id" value="{$video->getId()}" />
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
                            <p>Email this video: <a>click here</a></p>
                            <p>
                                <span class="postVideo">Post video:</span> <span class="smallShare fbBlackSmall"></span> <span class="smallShare myBlackSmall"></span> <span class="smallShare twBlackSmall"></span> <span class="smallShare inBlackSmall"></span>
                            </p>
                        </div>
                        <div class="bottomLeft"></div>
                        <div class="bottomRight"></div>
                    </div>
                </li>
                <li class="link">
                    <a id="save">Save</a>
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p><span class="bold">Success!</span> This video has beens saved to your account.</p>
                        </div>
                        <div class="bottomLeft"></div>
                        <div class="bottomRight"></div>
                    </div>
                </li>
                <li class="link last">
                    <a id="report">Report Video</a>
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p>There is supposed to be a bunch of <a>text</a> in here!</p>
                        </div>
                        <div class="bottomLeft black"></div>
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
                    {assign var=i value=0}
                    {foreach from=$player->getStats() item=stat}
                        {if $i % 4 == 0}
                            <ul class="stats">
                        {/if}
                                <li>{$stat->getStatName()}: {$stat->getStatValue()}</li>
                        {if $i % 4 == 1}
                            </ul>
                        {/if}
                        {$i = $i+1}
                    {/foreach}
                </div>
            </div>
            <div id="moreVideos">
                <h2>More videos from [name]</h2>
                {foreach from=$videos item=video}
                    {if $video->getPrivacy() == true}
                        <div class="result opaque">
                            <div class="infoOpen">
                                <img src="/" class="resultImage locked" />
                                <div class="info">
                                    <h4>{$video->getTitle()}</h4>
                                    <p class="title">{$player->getFirstName()} {$player->getLastName()}</p>
                                    <p class="date">{$video->getUploadedDate()}</p>
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
                                <img src="/" class="resultImage" />
                                <div class="info">
                                    <h4>{$video->getTitle()}</h4>
                                    <p class="title">{$player->getFirstName()} {$player->getLastName()}</p>
                                    <p class="date">{$video->getUploadDate()}</p>
                                </div>
                            </div>
                        </a>
                    {/if}
                {/foreach}
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