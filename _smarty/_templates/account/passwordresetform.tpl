<div id="forgotPassword">
    <h1>Reset Your Password</h1>
    {include file='common/message.tpl'}
    <form name="passwordreset" action="{#baseUrl#}account/password/?auth={$auth}&email={$email}" method="post">
        <input type="hidden" value="{$auth}" name="auth" />
        <input type="hidden" value="{$email}" name="email" />
        <div class="top">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard pws" value="Password" />
                    <input type="password" class="standard" id="password" name="password" class="hidden" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error-alert">
                This email address is not registered
                <br />
                Try another email address or <a>join now</a>.
            </p>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard pws" value="Confirm Password" />
                    <input type="password" class="standard" id="passwordConfirm" name="passwordConfirm" class="hidden" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error-alert">
                This email address is not registered
                <br />
                Try another email address or <a>join now</a>.
            </p>
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Continue" id="continue" class="large black" />
            </div>
        </div>
    </form>
</div>