<div id="main">
    <div id="centerAd">Hello Ad</div>
    <h1>Video makes the world go round.</h1>
    <h3>The world's evolved. So has recruiting.</h3>
    <div id="searchForm">
        <form id="search" action="/search" method="post">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="searchVal" name="searchVal" />
                </div>
                <div class="right"></div>
            </div>
            <div class="blackButton">
                <div class="topLeft"></div>
                <div class="topRight"></div>
                <div class="bottomLeft"></div>
                <div class="bottomRight"></div>
                <div class="middle">
                    <input type="submit" value="Search" id="sendSearch" class="largeBlack" />
                </div>
            </div>

            <input type="hidden" name="level" id="level" value="" />
            <input type="hidden" name="grade" id="grade" value="" />
            <input type="hidden" name="position" id="position" value="" />
            <input type="hidden" name="height" id="height" value="" />

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
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">College</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Professional</div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Grade</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftSmall"></div>
                                <div class="middleSmall">
                                    <p class="value">Select</p>
                                </div>
                                <div class="rightSmall"></div>
                                <ul class="potentials">
                                    <?php for($i = 6; $i < 20; $i++): ?>
                                        <li><?php echo $i; ?></li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                            <div class="arrowSmall"></div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Position</p>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Point Guard</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Shooting Guard</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Small Forward</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Power Forward</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Center</div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Height</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftSmall"></div>
                                <div class="middleSmall">
                                    <p class="value">Select</p>
                                </div>
                                <div class="rightSmall"></div>
                                <ul class="potentials">
                                    <?php for($i = 48; $i < 96; $i++): ?>
                                        <li><?php echo $i; ?>"</li>
                                    <?php endfor; ?>
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