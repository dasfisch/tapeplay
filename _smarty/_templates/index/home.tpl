<div id="landing">
    <div id="centerAd">Hello Ad</div>
    <h1>Video makes the world go round.</h1>
    <h3>The world's evolved. So has recruiting.</h3>
    <div id="searchForm">
        <form id="search" action="{#baseUrl#}videos/search/" method="post">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="searchVal" name="searchVal" />
                </div>
                <div class="right"></div>
            </div>
            <div class="bigButton black">
                <div class="topLeft whiteBg"></div>
                <div class="topRight whiteBg"></div>
                <div class="bottomLeft whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Search" id="sendSearch" class="large black" />
                </div>
            </div>

            <div id="advance">
                <p class="italic">Add more search criteria</p>
                <div id="options">
                    <div class="option">
                        <p class="header">Level</p>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">High School</div>
                            <input type="checkbox" class="hidden" name="school_level[]" value="high_school" />
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">College</div>
                            <input type="checkbox" class="hidden" name="school_level[]" value="college" />
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Professional</div>
                            <input type="checkbox" class="hidden" name="school_level[]" value="professional" />
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Grade</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftMedium"></div>
                                <div class="middleMedium middle">
                                    <p class="value">Select</p>
                                    <input type="hidden" name="grade" class="dropVal" value="" />
                                </div>
                                <div class="rightMedium"></div>
                                <ul class="potentials">
                                    {section name=i start=6 loop=26 step=1}
                                        <li>{$smarty.section.i.index}</li>
                                    {/section}
                                </ul>
                            </div>
                            <div class="arrowSmall"></div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Position</p>
                        {foreach from=$stats item=stat}
                            <div class="checkbox">
                                <div class="box">
                                    <div class="checkMark"></div>
                                </div>
                                <div class="label">{$stat->getStatName()}</div>
                                <input type="checkbox" class="hidden" name="position_id[]" value="{$stat->getId()}" />
                            </div>
                        {/foreach}
                    </div>
                    <div class="option">
                        <p class="header">Height</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftMedium"></div>
                                <div class="middleMedium middle">
                                    <p class="value">Select</p>
                                    <input type="hidden" name="height" class="dropVal" value="" />
                                </div>
                                <div class="rightMedium"></div>
                                <ul class="potentials">
                                    {section name=i start=48 loop=96 step=1}
                                        <li>{$smarty.section.i.index}</li>
                                    {/section}
                                </ul>
                            </div>
                            <div class="arrowSmall"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="ad">
    <h1>Ad</h1>
</div>