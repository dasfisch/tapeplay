<body id="tapeplay" class="landing">
    <div id="main" class="landing">
        <div id="logo">
            <h1>TapePlay</h1>
            <h3>Video makes the world go round.</h3>
            <p>The world's evolved. So has recruiting.</p>
        </div>
        <form name="sport" id="sport" method="post" action="{#baseUrl#}">
            <div id="sportSelect">
                <div id="pickSport">Pick Sport:</div>
                <div id="dropper">
                    <div id="values">
                        <p id="value">Women's Basketball</p>
                        <ul id="potentials">
                            {foreach from=$sports item=single}
                                <li>
                                    {$single->getSportName()}
                                    <input type="hidden" class="sportId" value="{$single->getId()}" />
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                    <div id="arrow"></div>
                    <div id="links">
                        <a href="/user/login">Log In</a> |
                        <a href="/user/register">Get Started</a> |
                        <a href="/about/policy">Privacy Policy</a>
                    </div>
                </div>
                <div id="continue">Continue</div>
            </div>
        </form>
    </div>
