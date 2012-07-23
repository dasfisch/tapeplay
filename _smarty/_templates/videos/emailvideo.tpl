<div id="main">
    <div id="leftCol">
        <h2 id="title">Email Video</h2>
        {$message}
        <div id="single">
            <img src="/" class="resultImage" />
            <div class="info">
                <h2>{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</h2>
                <p class="position">{$video->getPlayer()->getPosition()}, {$video->getPlayer()->getConvertedHeight()}</p>
                <p class="title">{$video->getTitle()}</p>
                <p class="date">{$video->getUploadDate()|date_format:'%B %d, %Y %I:%M %p'}</p>
            </div>
        </div>
        <form id="emailFriend" action="" method="post">
            <input type="hidden" name="hash" value="{$hash}" />
            <label for="from">From</label>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="from" name="from" value="Full Name" />
                </div>
                <div class="right"></div>
            </div>
            <label for="from">To</label>
            <div class="inputField last copy">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="email" name="email[]" value="Email Address" />
                </div>
                <div class="right"></div>
            </div>
            <div class="addAnother">
                <p>
                    <span class="plusCircle"></span>
                    <span class="addText">Add another email address</span>
                </p>
            </div>
            <div class="bigButton black">
                <div class="topLeft whiteBg"></div>
                <div class="topRight whiteBg"></div>
                <div class="bottomLeft whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Share" id="sendSearch" class="large black" />
                </div>
            </div>
        </form>
    </div>
    <div id="rightCol">
        <div id="copy">
            <p>Copy the link to share:</p>
            <div class="inputFieldSmall">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="from" name="from" value="Full Name" />
                </div>
                <div class="right"></div>
            </div>
        </div>
        <div id="share">
            <p>Other ways to share...</p>
            <div class="shareImg facebook"></div>
            <div class="shareImg myspace"></div>
            <div class="shareImg twitter"></div>
            <div class="shareImg linkedin"></div>
        </div>
    </div>
</div>
<div id="ad">

</div>