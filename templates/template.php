<!DOCTYPE HTML>
<html id="www-tapeplay-com">
    <head>
        <title>Test</title>
        
        <!-- <link rel="stylesheet" href="/css/reset.css" type="text/css" /> -->
        
        <style type="text/css">
        	html,body {
				margin:0;
				padding:0;
				height:100%; /* needed for container min-height */
				font-family:Arial, Helvetica, Verdana, sans-serif
			}

			/*
			 * Layout
			 */

			#container {
				position:relative; /* needed for footer positioning*/
				margin:0;
				width:100%;
				background:#c66a13;
				
				height:auto !important; /* real browsers */
				height:100%; /* IE6: treated as min-height*/
			
				min-height:100%; /* real browsers */
			}
			
			#header {
				height:75px;
				background:#000000 url("/media/images/header-bg.gif") repeat-x 0px 0px;
			}

			#header-wrapper {
				width:1010px;
			}
			
			#content {
				background:#ffffff;
				padding-bottom:215px; /* bottom padding for footer */
				width:1010px;
			}

			#content-wrapper {
				padding-top:20px;
			}

			#footer {
				position:absolute;
				height:215px;
				width:100%;
				bottom:0; /* stick to bottom */
				background:#000000 url("/media/images/tapePlay_footerBackground.gif") repeat-x 0px 0px;
			}
			
			#footer-wrapper {
				width:1010px;
			}
			
			#logo {
				background:transparent url(/media/images/logo_126x69.png) no-repeat 0px 0px;
				height:69px;
				margin:3px 0px 0px 20px;
				padding:0;
				text-indent:-9999em;
				width:126px;
			}
			
			#logo img {
				visibility:hidden;
			}
			
			/*
			 * Navigation Styles
			 */
			
			#navigation, #footer-navigation, #footer-navigation dl, #footer-navigation dd, 
			#footer-navigation dt, #footer-terms ul {
				list-style-type: none;
    			margin: 0;
    			padding: 0;
			}
			
			#navigation li {
				float:left;
				padding:30px 18px 0px;
			}
			
			#navigation a, #navigation a:visited, #navigation a:hover {
				color:#ffffff;
				font-size:17px;
				font-weight:bold;
				text-decoration:none;
			}
			
			#footer-navigation li {
				border-left:solid 1px #454545;
				float:left;
				height:112px;
				padding-left:55px;
				width:195px;
			}
			
			#footer-navigation li:first-child {
				border:none;
			}
			
			#footer-navigation dt {
				color:#999999;
				font-size:17px;
				font-weight:bold;
			}
			
			#footer-wrapper a, #footer-wrapper a:visited, #footer-wrapper a:hover {
				color:#ffffff;
				text-decoration:none;
			}
			
			#footer-navigation a {
				font-size:13px;
			}
			/*
			 * Global Styles
			 */
			
			.left {
				float:left;
			}
			
			.right {
				float:right;
			}
   		</style>
    </head>
    
    <body>
    	
      	<div id="container">

			<div id="header">
				<div id="header-wrapper">
					
					<div class="left">
						<h1 id="logo"><a href="#" title="TapePlay Home Page"><img src="/media/images/logo_126x69.png" alt="TapePlay Logo" height="69" width="126" /> TapePlay</a></h1>
					</div>
					
					<div class="right">
						<ul id="navigation">
							<li><a href="#">Join</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Upload</a></li>
							<li><a href="#">Browse</a></li>
							<li><a href="#">Help</a></li>
						</ul>
					</div>
					
				</div> <!-- END HEADER WRAPPER -->
			</div> <!-- END HEADER -->

			<div id="content">
				<div id="content-wrapper">
					
					<h2>Min-height</h2>
					<p>
						The #container element of this page has a min-height of 100%. That way, if the content requires more height than the viewport provides, the height of #content forces #container to become longer as well. Possible columns in #content can then be visualised with a background image on #container; divs are not table cells, and you don't need (or want) the fysical elements to create such a visual effect. If you're not yet convinced; think wobbly lines and gradients instead of straight lines and simple color schemes.
					</p>
					<h2>Relative positioning</h2>
					
				</div> <!-- END CONTENT WRAPPER -->
			</div> <!-- END CONTENT -->

			<div id="footer">
				<div id="footer-wrapper">
					
					<ul id="footer-navigation">
						<li>
							<dl>
								<dt>The Basics</dt>
								<dd><a href="#">Getting Started</a></dd>
								<dd><a href="#">Community Guidelines</a></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Business Info</dt>
								<dd><a href="#">Advertising</a></dd>
								<dd><a href="#">Contact Us</a></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>For the Curious</dt>
								<dd><a href="#">Frequently Asked Questions</a></dd>
								<dd><a href="#">About TapePlay</a></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Cool Stuff</dt>
								<dd><a href="#">Blog</a></dd>
								<dd><a href="#">Merchandise</a></dd>
							</dl>
						</li>
					</ul>
					
					<div id="footer-terms">
						<ul>
							<li><a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a></li>
							<li>&copy; 2011 TapePlay, LLC. All Rights Reserved </li>
						</ul>
					</div>
					
				</div> <!-- END FOOTER WRAPPER -->
			</div> <!-- END FOOTER -->
			
		</div> <!-- END CONTAINER -->
	
	</body>
	
</html>