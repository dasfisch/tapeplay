<div id="container">
	<div id="content">
		<div id="content-wrapper">
			<div id="splash_header">
				<div class="left">
					<img src="media/images/logo_large_286x157.jpg" alt="TapePlay Beta"/>
				</div>
				<div class="left">
					<h1>(beta)</h1>
					<h2>Video makes the world go round.</h2>
					<h3>The world&rsquo;s evolved. So has recruiting.</h3>
				</div>
			</div>
			
			<div class="clear"></div>
			
			<div id="splash_content">
				<label>PICK SPORT:</label>
				<form action="{#baseUrl#}" method="post">
					<fieldset class="left">
						<select class="select-4" name="chosenSport">
							{foreach from=$sports item=single}
								<option value="{$single->getId()}">{$single->getSportName()}</option>
	                        {/foreach}
						</select>
					</fieldset>
                    <div class="bigButton grey">
                        <div class="topRight whiteBg"></div>
                        <div class="bottomRight whiteBg"></div>
                        <div class="middle">
                            <input type="submit" value="Continue" id="continue" class="large grey" />
                        </div>
                    </div>
				</form>
				<!--<a href="#" class="button_gray_large button_round left" title="continue">Continue</a>-->
				<div class="clear"></div>
				<ul class="login-menu font15">
					<li><a href="{#baseUrl#}company/policy/">Privacy Policy</a></li>
					<li><a href="{#baseUrl#}user/register/">Get Started</a></li>
					<li><a href="{#baseUrl#}user/login/">Log In</a></li>
				</ul>
			</div>    
