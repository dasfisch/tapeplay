<!DOCTYPE HTML>
<html>
    <head>
        <title>TapePlay</title>

        <link rel="stylesheet" href="/css/reset.css" type="text/css" />
        <link rel="stylesheet" href="/css/tapeplay.css" type="text/css" />
        <link rel="stylesheet" href="/css/jquery.css" type="text/css" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
		<script type="text/javascript" src="/js/tapeplay.js"></script>
        <script type="text/javascript" src="/js/jquery.panda.min.js"></script>
    </head>
    <body id="tapeplay">
        <div id="header">
            <div id="holder">
                <div id="left">
                    <h1>TapePlay</h1>
                    <div id="sportSelect">
                        <div id="beta"></div>
                        <div id="dropper">
                            <div id="values">
                                <form name="sportChooser" id="sportChooser" method="post">
                                    <input type="hidden" class="chosenSport" name="chosenSport" id="chosenSport" />
                                    <p id="value">
                                        {$sport.name}
                                    </p>
                                    <div id="arrow"></div>
                                    <ul id="potentials">
                                        {foreach from=$sports item=single}
                                            <li>
                                                {$single->getSportName()}
                                                <input type="hidden" class="sportId" value="{$single->getId()}" />
                                            </li>
                                        {/foreach}
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="right">
                    <ul id="links">
                        <li>
                            <a href="{#baseUrl#}user/signup/">Join<span class="fbSmall"></span></a>
                        </li>
                        <li>
                            <a href="{#baseUrl#}user/{$loginAction}/">{$loginText}</a>
                        </li>
                        <li>
                            <a href="{#baseUrl#}user/upload/" class="infoOpen leftShift">Upload</a>
                            <div class="infoBubble">
                                <div class="topLeft black"></div>
                                <div class="directionTopRight"></div>
                                <div class="middle">
                                    <p>
                                        <strong>Players</strong> must be logged into their accounts to
                                        upload a video. <a>Log in</a>.
                                        <br /><br />
                                        Don't have an account yet? <a>Sign up</a>.
                                        <br /><br />
                                        <strong>Coaches and Scouts</strong> cannot upload videos. We're
                                        sure you're very talented, but we're not interested. Sorry.
                                    </p>
                                </div>
                                <div class="bottomLeft"></div>
                                <div class="bottomRight"></div>
                                <div class="direction"></div>
                            </div>
                        </li>
                        <li>
                            <a href="{#baseUrl#}videos/browse/">Browse</a>
                        </li>
                        <li>
                            <a href="{#baseUrl#}company/faq/">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>