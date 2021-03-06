<!DOCTYPE HTML>
<html>
    <head>
        <title>TapePlay</title>
		
		<!--
        <link rel="stylesheet" href="/css/reset.css" type="text/css" />
        <link rel="stylesheet" href="/css/tapeplay.css" type="text/css" />
        <link rel="stylesheet" href="/css/jquery.css" type="text/css" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
		<script type="text/javascript" src="/js/tapeplay.js"></script>
        <script type="text/javascript" src="/js/jquery.panda.min.js"></script>
        -->
    </head>
    <body id="tapeplay">
        <div id="header">
            <div id="holder">
                <div id="left">
                    <a href="{#baseUrl#}">
                        <h1>TapePlay</h1>
                    </a>
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
                        {if isset($user) && !empty($user)}
                            <li>
                                <a href="{#baseUrl#}account/welcome/">My Account</a>
                            </li>
                            <li>
                                <a href="{#baseUrl#}user/logout/">Logout</a>
                            </li>
                        {else}
                            <li>
                                <a href="{#baseUrl#}user/signup/">Join<span class="fbSmall"></span></a>
                            </li>
                            <li>
                                <a href="{#baseUrl#}user/login/">Login</a>
                            </li>
                        {/if}
                        <li>
                            {if isset($user) && !empty($user) && $user->getAccountType() == 1}
                                <a href="{#baseUrl#}user/upload/" class="infoOpen leftShift">Upload</a>
                            {else}
                                <a class="infoOpen">Upload</a>
                                <div class="infoBubble">
                                    <div class="topLeft black"></div>
                                    <div class="topRight black"></div>
                                    <div class="directionTopMiddle"></div>
                                    <div class="middle">
                                        <p>
                                            <strong>Players</strong> must be logged into their accounts to
                                            upload a video. <a href="{#baseUrl#}user/login/">Log in</a>.
                                            <br /><br />
                                            Don't have an account yet? <a href="{#baseUrl#}user/signup/">Sign up</a>.
                                            <br /><br />
                                            <strong>Coaches and Scouts</strong> cannot upload videos. We're
                                            sure you're very talented, but we're not interested. Sorry.
                                        </p>
                                    </div>
                                    <div class="bottomLeft"></div>
                                    <div class="bottomRight"></div>
                                    <div class="direction"></div>
                                </div>
                            {/if}
                        </li>
                        <li>
                            <a href="{#baseUrl#}videos/browse/">Browse</a>
                        </li>
                        <li>
                            <a href="{#baseUrl#}company/help/">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>