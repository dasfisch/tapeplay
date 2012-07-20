<div id="main">
    <div id="accountLeft">
        <h2>Welcome, Player</h2>
        <div class="accordion">
            <div class="header">
                <div class="title">Saved Videos ({$savedVideoNumber})</div>
                <div class="arrow"></div>
            </div>
            <div class="body">

			{foreach $savedVideos as $video}
                <div class="chunk">
                    <img src="/" class="resultImage" />
                    <div class="info">
                        <h4>{$video->getFirstName()} {$video->getLastName()}</h4>
                        <p class="title">{$video->getTitle()}</p>
                        <p class="date">{$video->getUploadYear()}, {$video->getUploadMonth()}</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle">
                            <input type="submit" value="Remove" id="remove" name="remove" class="tiny orange" />
                        </div>
                    </div>
                </div>
			{/foreach}
            </div>
        </div>
        <div class="accordion">
            <div class="header">
                <div class="title">Account</div>
                <div class="arrow"></div>
            </div>
            <div class="body">
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Name</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="firstName" name="firstName" value="{$firstName}" />
								<input type="text" class="standard" id="lastName" name="lastName" value="{$lastName}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$firstName} {$lastName}</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Email Address</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="email" name="email" value="{$email}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$email}</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Password</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="password" class="standard" id="password" name="password" value="" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>*********</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="deactivate">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Birth Year / Sex / Zip Code</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="birthYear" name="birthYear" value="{$birthYear}" />
								<input type="text" class="standard" id="gender" name="gender" value="{$gender}" />
								<input type="text" class="standard" id="zipcode" name="zipcode" value="{$zipcode}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$birthYear} / {$gender} / {$zipcode}</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Deactivate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="header">
                <div class="title">Profile</div>
                <div class="arrow"></div>
            </div>
            <div class="body">
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>School Name</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="schoolName" name="schoolName" value="School Name" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>Sebastian Frohm</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Title</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="title" name="title" value="Head Coach" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>Sebastian Frohm</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Association Dropdown</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="association" name="association" value="Association" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>Sebastian Frohm</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Collegiate Level Dropdown</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="level" name="level" value="Collegiate Level" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>Sebastian Frohm</p>
                    </div>
                    <div class="bigButton orange">
                        <div class="topLeft whiteBg"></div>
                        <div class="topRight whiteBg"></div>
                        <div class="bottomLeft whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle tiny">
                            <span class="edit">Edit</span>
                        </div>
                    </div>
                    <div class="status">
                        <div class="greenCheckMark"></div>
                        <span>Success!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="header">
                <div class="title">Privacy</div>
                <div class="arrow"></div>
            </div>
            <div class="body">
                <div class="chunk">
                    <p class="check">
                        <input type="checkbox" name="allowFacebook" id="allowFacebook" />
                        <label for="allowFacebook">Allow TapePlay to import my Facebook info</label>
                    </p>
                    <p class="check">
                        <input type="checkbox" name="relevantAdvertising" id="relevantAdvertising" />
                        <label for="relevantAdvertising">Use my account info for relevant advertising. <a>Why?</a></label>
                    </p>
                    <p class="check">
                        <input type="checkbox" name="sendRecommendations" id="sendRecommendations" />
                        <label for="sendRecommendations">Send me recommendations about how to use TapePlay</label>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="accountRight">
        <div class="bigButton orange">
            <div class="newTriangleCorner"></div>
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle shift">
                <h3>Share VideoNotes</h3>
                <p>Connect staff &amp; add time stamps to videos</p>
            </div>
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Search Players" id="serachPlayers" class="large black" />
            </div>
        </div>
        <div class="ad250x250">
            advertisement
        </div>
    </div>
</div>
<div id="ad">
    ad
</div>