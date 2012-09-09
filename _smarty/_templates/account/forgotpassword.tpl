<h1>Reset Your Password</h1>
    {include file='common/message.tpl'}
<form id="passwordReset" name="passwordReset" action="{#baseUrl#}account/forgot/" method="post">
    <ul class="form-fields">
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" name="search" value="Email Address"/>
					<span class="custom-input_bottom"></span>
				</div>
				
				<div class="custom-input_left custom-input_partial">
					<span class="custom-input_top"></span>
					<span class="custom-input_bottom"></span>
				</div>
									
				<div class="custom-input_right custom-input_partial">
					<span class="custom-input_top"></span>
					<span class="custom-input_bottom"></span>
				</div>
				
			</div>
			<div class="error-alert">
				<ul>
					<li>This email address is not registered.</li>
					<li>Try another email address or <a href="#">join now</a>.</li>
				</ul>
			</div>
			<p class="clear">&nbsp;</p>
		</li>
		<li class="input-field clear">
			<button type="submit" value="Continue" class="button_black_large left button_round">Continue</button> 
		</li>
	</ul>
</form>
