<!DOCTYPE HTML>
<html id="www-tapeplay-com">
    <head>
        <title>Test</title>
        
        <style type="text/css">
        	html,body {
				margin:0;
				padding:0;
				height:100%; /* needed for container min-height */
			}

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
				background:#000000;
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
				background:#000000;
			}

   		</style>
    </head>
    
    <body>
    	
<!--     	<header>
    		
    		<section class="header">
    			
    		</section>
    		
    	</header>
    	 -->
    	<div id="container">

		<div id="header">
		</div>

		<div id="content">
			<div id="content-wrapper">
				<h2>Min-height</h2>
				<p>
					The #container element of this page has a min-height of 100%. That way, if the content requires more height than the viewport provides, the height of #content forces #container to become longer as well. Possible columns in #content can then be visualised with a background image on #container; divs are not table cells, and you don't need (or want) the fysical elements to create such a visual effect. If you're not yet convinced; think wobbly lines and gradients instead of straight lines and simple color schemes.
				</p>
				<h2>Relative positioning</h2>

				
			</div>
			
		</div>

		<div id="footer">

		</div>
	</div>
	
	
	</body>
	
</html>