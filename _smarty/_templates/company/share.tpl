<div id="main">
    <div id="leftCol">
        <h2 id="title">Share TapePlay</h2>
        <p>Tell your teammates, coaches, and friends to check us out.</p>
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
                    <input type="submit" value="Send" id="sendSearch" class="large black" />
                </div>
            </div>
        </form>
    </div>
    <div id="rightCol">
        <div id="share">
            {include file='common/sidebar/share.tpl'}
        </div>
    </div>
</div>
<div id="ad">

</div>