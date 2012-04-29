<div id="main">
    <div id="leftCol">
        <h2 id="title">Email Video</h2>
        <div id="single">
            <img src="/" class="resultImage" />
            <div class="info">
                <h2>First Last Name</h2>
                <p class="position">Chicago, IL</p>
                <p class="title">Video Title</p>
                <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
            </div>
        </div>
        <form id="emailFriend" action="" method="post">
            <label for="from">From</label>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="from" name="from" value="Full Name" />
                </div>
                <div class="right"></div>
            </div>
            <label for="from">To</label>
            <div class="inputField last">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="email" name="email" value="Email Address" />
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