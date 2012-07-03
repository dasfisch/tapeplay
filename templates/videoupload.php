<div id="main">
    <h2>Video File Upload</h2>
    <p class="uploadNote">
        <span class="bold">For professional recruits</span>, upload highlight tapes,
        game footage, and so on. Whatever makes you look good.
    </p>
    <p class="uploadNote last">
        <span class="bold">For college recruits</span>, you have to adhere to the NCAA
        rules. That means you must only upload videos of regularly scheduled (regular
        season) game footage. Stay away from backyard footage - street games, summer
        leagues, etc.
    </p>
    <form id="uploadForm" name="login" action="" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle upload">
                    <input type="text" class="standard" id="fakeupload" name="fakeupload" value="Browse Files" />
                </div>
                <div class="right"></div>
            </div>
            <div class="bigButton black">
                <div class="topRight whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Upload" id="uploadVideoButton" name="uploadVideoButton" class="large black" />
                </div>
                <input type="file" class="uploader" onchange="this.form.fakeupload.value = this.value;" />
            </div>
            <p class="asterisk error">*</p>
            <p class="error">
                We're sorry but you cannot upload this type of file. Video files must be AAC,
                AVI, 3GP, MOV, MP3, MP4, MPEG, OGG, WAV, WEBM, WMA, or WMV.
            </p>
        </div>
        <div class="input lessPadding">
            <p>
                <a>Examples of video titles</a>
            </p>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="title" name="title" value="Video Title" />
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div class="input">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium">
                        <p class="value">Video Month</p>
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <li>Januray</li>
                        <li>February</li>
                        <li>march</li>
                        <li>April</li>
                        <li>May</li>
                        <li>June</li>
                        <li>July</li>
                        <li>August</li>
                        <li>September</li>
                        <li>October</li>
                        <li>November</li>
                        <li>December</li>
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium">
                        <p class="value">Video Year</p>
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <?php for($i = date('Y', strtotime('now')); $i > 1980; $i--): ?>
                            <li><?php echo $i; ?></li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Upload" id="upload" class="large black" />
            </div>
        </div>
        <div class="option step">
            Step 2 of 3
        </div>
    </form>
</div>
<div id="ad">
    ad
</div>