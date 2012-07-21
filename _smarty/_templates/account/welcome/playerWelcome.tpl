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
                {if $video->getPrivacy() == true}
                    <div class="result opaque">
                        <div class="infoOpen">
                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage locked" />
                            <div class="info">
                                <h2>{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</h2>
                                <p class="position"></p>
                                <p class="title">{$video->getTitle()}</p>
                                <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                            </div>
                        </div>
                        <div class="infoBubble">
                            <div class="topLeft"></div>
                            <div class="topRight"></div>
                            <div class="middle">
                                <p>
                                    <strong>We're sorry.</strong> Only account holders can view this video.
                                    <br /><br />
                                    Want to view this video?
                                    <br />
                                    <a>Join</a> or <a>log in</a>.
                                </p>
                            </div>
                            <div class="directionBottomRight"></div>
                            <div class="bottomRight"></div>
                            <div class="direction"></div>
                        </div>
                    </div>
                {else}
                    <a href="{#baseUrl#}videos/view/{$video->getId()}/">
                        <div class="chunk">
                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage" />
                            <div class="info">
                                <h4>{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</h4>
                                <p class="title">{$video->getTitle()}</p>
                                <p class="date">{$video->getUploadDate()|date_format:"B%, %Y"}</p>
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
                    </a>
                {/if}
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
                                <input type="text" class="standard" id="firstName" name="firstName" value="{$user->getFirstName()}" />
								<input type="text" class="standard" id="lastName" name="lastName" value="{$user->getLastName()}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$user->getFirstName()} {$user->getLastName()}</p>
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
                                <input type="text" class="standard" id="email" name="email" value="{$user->getEmail()}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$user->getEmail()}</p>
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
                        <h4>Deactivate</h4>
                        <!--<div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard" id="birthYear" name="birthYear" value="{$birthYear}" />
								<input type="text" class="standard" id="gender" name="gender" value="{$gender}" />
								<input type="text" class="standard" id="zipcode" name="zipcode" value="{$zipcode}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$user->getBirthYear()} / {$user->getGender()} / {$user->getZipcode()}</p>-->
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
                <div class="title">{$user->getSport()->getSportName()}</div>
                <div class="arrow"></div>
            </div>
            <div class="body">
                <div class="chunk">
                    <div class="accountInfo">
                        <h4>Number / Level / Grade</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard small" id="schoolName" name="schoolName" value="{$user->getSchool()->getName()}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>#{$user->getNumber()} / {$user->getPlayingLevel()} / {$user->getGradeLevel()}</p>
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
                        <h4>Position / Height</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard small" id="schoolName" name="schoolName" value="{$user->getSchool()->getName()}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$user->getPosition()} / {$user->getHeight()}</p>
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
                        <h4>School Name</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard small" id="schoolName" name="schoolName" value="{$user->getSchool()->getName()}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$user->getSchool()->getName()}</p>
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
                        <h4>Head Coach's Name</h4>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard small" id="schoolName" name="schoolName" value="{$user->getSchool()->getName()}" />
                            </div>
                            <div class="right"></div>
                        </div>
                        <p>{$user->getCoachName()}</p>
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
                        <h4>Statistics</h4>
                        <div id="statistics">
                            <ul id="stats">
                                {assign var=i value=0}
                                {foreach from=$stats item=stat}
                                    {if $i%$modder == 0 || $i == 0 || $i == ($statCount - 1)}
                                        <li>
                                    {/if}
                                            <div class="stat">
                                                <p>
                                                    {$stat->getStatName()}:
                                                    <span class="bold">{$stat->getStatValue()}</span>
                                                </p>
                                            </div>
                                            <div class="inputField hidden">
                                                <div class="left"></div>
                                                <div class="middle">
                                                    <input type="text" class="standard small" id="schoolName" name="schoolName" value="{$stat->getStatValue()}" />
                                                </div>
                                                <div class="right"></div>
                                            </div>
                                    {if ($i%$modder == 0 && $i > $modder) || $i == ($statCount - 2)}
                                        </li>
                                    {/if}
                                    {$i=$i+1}
                                {/foreach}
                            </ul>
                        </div>
                        <div class="inputField hidden">
                            <div class="left"></div>
                            <div class="middle">
                                <input type="text" class="standard small" id="schoolName" name="schoolName" value="{$user->getSchool()->getName()}" />
                            </div>
                            <div class="right"></div>
                        </div>
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
                        Who can view my vidoes?<br />
                        <input type="radio" name="visibility" value="Anybody" /> <label>Anybody</label><br />
                        <input type="radio" name="visibility" value="Scouts and Coaches" /> <label>Scouts and Coaches</label><br />
                        <input type="radio" name="visibility" value="Nobody" /> <label>Nobody</label><br />
                    </p>
                    <br />
                    <p class="check">
                        <input type="checkbox" name="allowFacebook" id="allowFacebook" />
                        <label for="allowFacebook">Allow TapePlay to import my Facebook info</label>
                    </p>
                    <p class="check">
                        <input type="checkbox" name="relevantAdvertising" id="relevantAdvertising" />
                        <label for="relevantAdvertising">
                            Use my account info for relevant advertising.
                            <a class="infoOpen">Why?</a>
                            <div class="infoBubble">
                                <div class="topLeft black"></div>
                                <div class="directionTopRight"></div>
                                <div class="middle">
                                    <p>
                                        Help us out by using your account info for relevant
                                        advertising. Ads help us pay the bills so we can
                                        keep improving TapePlay for you.
                                    </p>
                                </div>
                                <div class="bottomLeft"></div>
                                <div class="bottomRight"></div>
                                <div class="direction"></div>
                            </div>
                        </label>
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