<h1>Log In</h1>
<h4>Have a Facebook account?<span class="facebookConnect"></span></h2>

<form id="loginForm" name="login" action="{#baseUrl#}user/login/" method="post">
	<ul class="form-fields">
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" class="standard" id="username" name="username" value="Email Address" />
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
					<li>Enter valid email address.</li>
					<li>Example: abc@generic.com</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
                    <input type="text" class="input_password" value="Password" />
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
					<li>Incorrect password.</li>
					<li>Please reenter or <a href="#">reset</a> your password.</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
			<fieldset class="left">
				<ul class="font15">
					<li>
						<label for="i-agree">
							<span class="checkbox"><span class="check"></span></span>
							<input type="checkbox" id="i-agree" name="remember_me" /> 
							Remember Me
						</label>
					</li>
				</ul>
			</fieldset>
		</li>
		<li class="input-field clear">
			<button type="submit" class="button_black_large left button_round">Log In</button> 
		</li>
		<li class="input-field clear font15">
			<a href="{#baseUrl#}account/forgot/">Forgot your password?</a>
		</li>
	</ul>
</form>