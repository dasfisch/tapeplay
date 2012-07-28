<div id="main">
    <h2>Player Sign Up</h2>
    <p class="facebookLogin">Have a Facebook account? <span class="facebookConnect"></span></p>
    {include file='common/message.tpl'}
    <form id="coachForm" name="login" action="{#baseUrl#}user/personal/" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="firstName" name="firstName" value="First Name" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Enter your first name here.</p>
            <p class="error lower">Do not use numbers.</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="lastName" name="lastName" value="Last Name" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Enter your last name here.</p>
            <p class="error lower">Do not use numbers.</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="email" name="email" value="Email" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Enter valid email address.</p>
            <p class="error lower">Example: abc@generic.com</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="password" name="password" value="Password (at least six characters)" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Your password must be at least 6 characters.</p>
        </div>
<!--        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="passwordConfirm" name="passwordConfirm" value="Confirm Password" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"><span class="asterisk">*</span> Passwords do not match!</p>
        </div> -->
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Birth Year</p>
						<input type="hidden" name="birthYear" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        {$birthYears}
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Sex</p>
						<input type="hidden" name="gender" class="dropVal" value="" />
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
            <p class="error"><span class="asterisk">*</span> Enter birth year.</p><Br/>
            <p class="error lower">Enter sex.</p>
            <p class="error lower">Enter valid 5&ndash;digit zip code.
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
            <p class="error">* Please agree with our Terms of Use.</p>
            
        </div>
        <div class="option check">
            <div class="checkbox">
                <div class="box">
                    <div class="checkMark"></div>
                </div>
                <div class="label">
                    By checking this box, I certify I am at least 13 years of age or older.
                </div>
            </div>
            <p class="error">
               * We appreciate your interest, however, in order to use our site, you must
	                be 13 years of age or older.
	        </p>
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Log In" id="login" class="large black" />
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