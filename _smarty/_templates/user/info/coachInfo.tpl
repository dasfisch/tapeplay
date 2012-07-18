<div id="main">
    <h2>School Info</h2>
    <p class="facebookLogin">Hey there, Coach! So, what school are you with?</p>
    <form id="coachForm" name="login" action="{#baseUrl#}user/info/" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="school" name="school" value="School Name" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter your school's name.</p>
        </div>
        <div id="options">
            <div class="option">
                <p class="header">I am a(n):</p>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Head Coach</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Assistant Coach</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Staff</div>
                </div>
            </div>
            <div class="option">
                <p class="header">Association:</p>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">NCAA</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">NAIA</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">NJCAA</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Other</div>
                </div>
            </div>
            <div class="option">
                <p class="header">Collegiate Level:</p>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Division I</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Division II</div>
                </div>
                <div class="checkbox">
                    <div class="box">
                        <div class="checkMark"></div>
                    </div>
                    <div class="label">Division III</div>
                </div>
            </div>
        </div>
        <div class="input">
            <p class="why">Optional: Invite other staff members. <a>Why?</a></p>
            <div class="inputField">
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
        <div class="option step">
            Step 2 of 3
        </div>
    </form>
</div>
<div id="ad">
    ad
</div>