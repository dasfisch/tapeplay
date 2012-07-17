<body id="tapeplay" class="landing">
    <div id="main" class="landing">
        <div id="logo">
            <h1>TapePlay</h1>
            <h3>Video makes the world go round.</h3>
            <p>The world's evolved. So has recruiting.</p>
        </div>
        <form name="sport" method="post" action="{#baseUrl#}">
            <div id="sportSelect">
                <div id="pickSport">Pick Sport:</div>
                <div id="dropper">
                    <div id="values">
                        <p id="value">
                            <span class="sportName">{$sports.0->getSportName()}</span>
                            <input type="hidden" name="chosenSport" id="chosenSport" value="{$sports.0->getId()}" />
                        </p>
                        <ul id="potentials">
                            {foreach from=$sports item=single}
                                <li>
                                    <span class="sportName">{$single->getSportName()}</span>
                                    <input type="hidden" class="sportId" value="{$single->getId()}" />
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                    <div id="arrow"></div>
                    <div id="links">
                        <a href="{#baseUrl#}user/login/">Log In</a> |
                        <a href="{#baseUrl#}user/register/">Get Started</a> |
                        <a href="{#baseUrl#}/company/policy/">Privacy Policy</a>
                    </div>
                </div>
                <input type="submit" value="Continue" id="continue" />
            </div>
        </form>
    </div>
