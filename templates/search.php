<div id="landing">
    <!-- Begin two col -->
    <div id="leftCol">
        <div id="search">
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
        </div>
        <p>188 results</p>
        <div id="results">
            <div class="result">
                <img src="/" class="resultImage" />
                <div class="info">
                    <h2>First Last Name</h2>
                    <p class="position">Chicago, IL</p>
                    <p class="title">Video Title</p>
                    <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                </div>
            </div>
            <div class="result">
                <img src="/" class="resultImage locked" />
                <div class="info">
                    <h2>First Last Name</h2>
                    <p class="position">Chicago, IL</p>
                    <p class="title">Video Title</p>
                    <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                </div>
            </div>
            <div class="result">
                <img src="/" class="resultImage" />
                <div class="info">
                    <h2>First Last Name</h2>
                    <p class="position">Chicago, IL</p>
                    <p class="title">Video Title</p>
                    <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                </div>
            </div>
            <div class="result">
                <img src="/" class="resultImage" />
                <div class="info">
                    <h2>First Last Name</h2>
                    <p class="position">Chicago, IL</p>
                    <p class="title">Video Title</p>
                    <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="rightCol">
        <h2>Your Search Criteria</h2>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value showing">High School</p>
            </div>
            <div class="option">
                <p class="x">&nbsp;</p>
                <p class="value">College</p>
            </div>
            <div class="option last">
                <p class="x">&nbsp;</p>
                <p class="value">Professional</p>
            </div>
        </div>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value">Grade</p>
                <p class="slider"></p>
                <p class="values">
                    <span class="minVal">7th</span>
                    <span class="maxVal">Pro</span>
                </p>
            </div>
        </div>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value showing"> Point Guard (1)</p>
            </div>
            <div class="option">
                <p class="x">x</p>
                <p class="value showing">Shooting Guard (2)</p>
            </div>
            <div class="option">
                <p class="x">&nbsp;</p>
                <p class="value">Small Forward (3)</p>
            </div>
            <div class="option">
                <p class="x">&nbsp;</p>
                <p class="value">Power Forward (4)</p>
            </div>
            <div class="option last">
                <p class="x">x</p>
                <p class="value showing">Center (5)</p>
            </div>
        </div>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value">Height</p>
                <p class="slider"></p>
                <p class="values">
                    <span class="minVal">4' 11"</span>
                    <span class="maxVal">7' 11"</span>
                </p>
            </div>
        </div>
    </div>
    <div class="pagination">
        <div class="previous">&laquo;</div>
        <ul class="pages">
            <?php
                for($i = 1; $i < 6; $i++) {
                    echo '<li>'.$i.'</>';
                }
            ?>
            <li>...</li>
            <li>19</li>
        </ul>
        <div class="next">&raquo;</div>
    </div>
</div>
<div id="ad">
    <h1>Ad</h1>
</div>