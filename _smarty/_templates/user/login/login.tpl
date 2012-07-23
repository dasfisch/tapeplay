<div id="main">
    <h2>Log In</h2>
    <p class="facebookLogin">Have a Facebook account? <span class="facebookConnect"></span></p>
    <form id="loginForm" name="login" action="{#baseUrl#}user/login/" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="username" name="username" value="Email Address" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Enter a valid email address</p>
            <p class="error lower">Example: sebastian.frohm@gmail.com</p>
        </div>
        <div class="input last">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="input" class="standard" id="password" name="password" value="Password" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Incorrect Password</p>
            <p class="error lower">Please reenter or <a href="#">reset</a> your password.</p>
        </div>
        <div class="option">
            <div class="checkbox">
                <div class="box">
                    <div class="checkMark"></div>
                </div>
                <div class="label">Remember me</div>
                <input type="checkbox" class="hidden" name="remember_me" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Log In" id="login" class="large black" />
            </div>
        </div>
        <div class="clear"></div>
        <p class="forgot"><a href="">Forgot your password?</a></p>
    </form>
</div>
<div id="ad">
    ad
</div>