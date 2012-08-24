<!DOCTYPE HTML>
<!--[if lte IE 7]> <html class="ie7" id="www-tapeplay-com"> <![endif]-->  
<!--[if IE 8]>     <html class="ie8" id="www-tapeplay-com"> <![endif]-->  
<!--[if IE 9]>     <html class="ie9" id="www-tapeplay-com"> <![endif]-->  
<!--[if !IE]><!--> <html id="www-tapeplay-com">             <!--<![endif]-->  
    <head>
        <title>Tapeplay :: Home</title>
        <link rel="stylesheet" href="/css/jquery.css" type="text/css" />
        <link rel="stylesheet" href="/css/global.css" type="text/css" />
        <link rel="stylesheet" href="/css/custom-form.css" type="text/css" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/jwplayer.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/jquery-main.js"></script>
		<script type="text/javascript" src="/js/tapeplay.js"></script>
        <script type="text/javascript" src="/js/jquery.panda.min.js"></script>
    </head>
    <body>
      	<div id="container">
			<div id="header">
				<div id="header-wrapper">
					<div class="left">
						<h1 id="logo"><a href="#" title="TapePlay Home Page"><img src="/media/images/logo_126x69.png" alt="TapePlay Logo" height="69" width="126" /> TapePlay</a></h1>
						<form action="{#baseUrl#}" method="post" id="sportChooser">
							<fieldset>
								<select class="select-1" id="chosenSport" name="chosenSport">
                                    {foreach from=$sports item=single}
                                        {if $single->getId() == $sport.id}
                                            <option value="{$single->getId()}" selected="selected">
                                                {$single->getSportName()}
                                            </option>
                                        {else}
                                            <option value="{$single->getId()}">
                                                {$single->getSportName()}
                                            </option>
                                        {/if}
                                    {/foreach}
								</select>
							</fieldset>
						</form>
					</div>
					<div class="right">
						<ul id="navigation">
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
                                    <a href="{#baseUrl#}user/upload/" class="infoOpen">Upload</a>
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
							<li><a href="{#baseUrl#}videos/browse/">Browse</a></li>
							<li><a href="{#baseUrl#}company/help/">Help</a></li>
						</ul>
					</div>
				</div> <!-- END HEADER WRAPPER -->
			</div> <!-- END HEADER -->
			<div id="content">
				<div id="content-wrapper">