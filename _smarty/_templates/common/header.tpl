<!DOCTYPE HTML>
<html id="www-tapeplay-com"{$ie}>
<head>
	<title>Tapeplay {if {$title}}:: {$title}{/if}</title>

    <link rel="shortcut icon" href="{#baseUrl#}favicon.ico" />

	<meta name="description" content="{if ({$description} != '')} {$description} {else}TapePlay is a video recruiting site to get high school and college athletes to the next level. Get in front of coaches across the country by uploading video.{/if}"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

	{if preg_match('/^\/videos\/view\/([0-9]+)\/$/', {$smarty.server.REQUEST_URI}) ||
		preg_match('/^\/watch\/([0-9]+)\/$/', {$smarty.server.REQUEST_URI})
	}
		<meta property="og:title" content="{$video->getTitle()} Feat. {$video->getPlayer()->getFirstName()} on TapePlay" />
		<meta property="og:description" content="{$video->getTitle()} Feat. {$video->getPlayer()->getFirstName()} on TapePlay" />
		<meta property="og:image" content="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" />
		<meta property="og:type" content="movie" />
		<meta property="og:video:width" content="445" />
		<meta property="og:video:type" content="application/x-shockwave-flash" />
		<meta property="og:video" content="{#baseUrl#}media/playback/player.swf?file={$videoDisplayInfo->getMp4Source()}&autostart=true" />
	{/if}

	<link rel="stylesheet" href="/css/jquery.css" type="text/css"/>
	<link rel="stylesheet" href="/css/global.css" type="text/css"/>
	<link rel="stylesheet" href="/css/widgets.css" type="text/css"/>

	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jwplayer.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script type="text/javascript" src="/js/jquery-main.js"></script>
	<script type="text/javascript" src="/js/tapeplay.js"></script>
	<script type="text/javascript" src="/js/jquery.panda.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.min.js"></script>

{if {$smarty.server.REQUEST_URI} != '/'}
	<script type="text/javascript">
		setTimeout(setContainerBGImage, 200);
	</script>
{/if}

{if {$smarty.server.REQUEST_URI} == '/user/personal/'}

	<script type="text/javascript">
		$(document).ready(function ()
		{

			$('a#signup-toc').click(function ()
			{
				var top = $(window).height() / 2 - 125;
				var left = $(window).width() / 2 - 250;

				window.open('/company/tospop/', 'tpModal', 'width=500, height=500, top=' + top + ', left=' + left + ', resizable=no, status=no, location=no, toolbar=no, scrollbars=yes');
				return false;
			});

			$('a#signup-privacy').click(function ()
			{
				var top = $(window).height() / 2 - 125;
				var left = $(window).width() / 2 - 250;

				window.open('/company/privacypop/', 'tpModal', 'width=500, height=500, top=' + top + ', left=' + left + ', resizable=no, status=no, location=no, toolbar=no, scrollbars=yes');
				return false;
			});
		});
	</script>

{/if}

    <script type="text/javascript">
        var _gaq = _gaq || [];

        _gaq.push(['_setAccount', 'UA-33496208-1']);
        _gaq.push(['_setDomainName', 'tapeplay.com']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body>
<div id="container">
	<div id="header">
		<div id="header-wrapper">
			<div class="left">
				<h1 id="logo"><a href="/" title="TapePlay Home Page"><img src="/media/images/logo_126x69.png"
																		  alt="TapePlay Logo" height="69"
																		  width="126"/> TapePlay</a></h1>

				<form action="{#baseUrl#}" method="post" id="sportChooser">
					<fieldset>
						<select class="select-1 fixedSelect" id="chosenSport" name="chosenSport">
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
				<ul id="navigation" class="clear">
				{if isset($user) && !empty($user)}
					<li>
						<a class="{if {$smarty.server.REQUEST_URI} == '/account/welcome/'}active{/if}"
						   href="{#baseUrl#}account/welcome/">My Account</a>
					</li>
					<li>
						<a class="{if {$smarty.server.REQUEST_URI} == '/user/logout/'}active{/if}"
						   href="{#baseUrl#}user/logout/">Log Out</a>
					</li>
					{else}
					<li>
						<a class="{if {$smarty.server.REQUEST_URI} == '/user/signup/'}active{/if}"
						   href="{#baseUrl#}user/signup/">Join<span class="fbSmall"></span></a>
					</li>
					<li>
						<a class="{if {$smarty.server.REQUEST_URI} == '/user/login/'}active{/if}"
						   href="{#baseUrl#}user/login/">Log In</a>
					</li>
				{/if}
					<li>
					{if isset($user) && !empty($user) && $user->getAccountType() == 1}
						<a href="{#baseUrl#}user/upload/"
						   class="infoOpen {if {$smarty.server.REQUEST_URI} == '/user/upload/'}active{/if}">Upload</a>
						{else}
						
						<div class="popup-hover pos-2">
							<a href="#" class="open upload-title">Upload</a>
							<div class="popup popup-2">
								<div class="holder">
									<div class="frame">
										<p><strong>Players</strong> must be logged into their accounts to upload a video. <a href="/user/login/">Log in.</a></p>
										<p>Don&rsquo;t have an account yet? <a href="/user/signup/">Sign up.</a></p>
									</div>
								</div>
							</div>
						</div>
					{/if}
					</li>
					<li><a href="{#blogUrl#}" target="_blank">Blog</a></li>
					<li><a class="{if {$smarty.server.REQUEST_URI} == '/company/help/'}active{/if}"
						   href="{#baseUrl#}company/help/">Help</a></li>
				</ul>
			</div>
		</div>
		<!-- END HEADER WRAPPER -->
	</div>
	<!-- END HEADER -->
	<div id="content">
		<div id="content-wrapper">
