<div id="main">
    <h2>Coach Sign Up</h2>
    <p class="facebookLogin">Have a Facebook account? <span class="facebookConnect"></span></p>
    <form id="coachForm" name="login" action="{#baseUrl#}user/personal/" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="name" name="name" value="First & Last Name" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">
            <span class="asterisk">*</span>
                Enter your first name here.
                <br />
                Do not use numbers.
            </p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="email" name="email" value="Email Address" />
                </div>
                <div class="right"></div>
            </div>
            <p class="asterisk error">*</p>
            <p class="error">
                Enter your last name here.
                <br />
                Do not use numbers.
            </p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="password" name="password" value="Password" />
                </div>
                <div class="right"></div>
            </div>
            <p class="asterisk error">*</p>
            <p class="error">
                Your password must be at least 6 characters.
            </p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="passwordConfirm" name="passwordConfirm" value="Confirm Password" />
                </div>
                <div class="right"></div>
            </div>
            <p class="asterisk error">*</p>
            <p class="error">
                Your passwords do not match!
            </p>
        </div>
        <div class="input last">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="password" name="password" value="" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"></p>
        </div>
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="inputField">
                        <div class="left"></div>
                        <div class="middle">
                            <p class="value"></p>
                        </div>
                        <div class="right">
                            <div class="arrow"></div>
                        </div>
                        <ul class="potentials">
                            <?php for($i = date('Y', strtotime('now')); $i > 1919; $i--): ?>
                                <li><?php echo $i; ?></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <!-- WTF Am I going to do here?
                    <div class="leftMedium"></div>
                    <div class="middleMedium birthYear">
                        <p class="value">Birth Year</p>
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <?php for($i = date('Y', strtotime('now')); $i > 1919; $i--): ?>
                            <li><?php echo $i; ?></li>
                        <?php endfor; ?>

                    </ul> -->
                </div>
            </div>
        </div>
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium sex">
                        <p class="value">Sex</p>
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <li>Male</li>
                        <li>Female</li>
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="option zip">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle small">
                    <input type="text" class="standard" id="zipcode" name="zipcode" value="Zip Code" />
                </div>
                <div class="right"></div>
            </div>
            <p class="asterisk error">*</p>
            <p class="error">
                Enter your last name here.
                <br />
                Do not use numbers.
            </p>
        </div>
        <div class="option check">
            <div class="checkbox">
                <div class="box">
                    <div class="checkMark"></div>
                </div>
                <div class="label">
                    I agree to the <a>Terms and Condition</a> and <a>Privacy Policy</a>
                </div>
            </div>
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Join" id="join" class="large black" />
            </div>
        </div>
        <div class="option step">
            Step 1 of 3
        </div>
    </form>
</div>
<div id="ad">
    ad
</div>