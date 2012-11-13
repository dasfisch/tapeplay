<h1>Log In</h1>
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
            {if isset($message) && isset($message->message)}
                <div class="error-alert showme">
                    <ul>
                        <li>{$message->message}</li>
                    </ul>
                </div>
            {else}
                <div class="error-alert">
                    <ul>
                        <li>Enter valid email address.</li>
                        <li>Example: abc@generic.com</li>
                    </ul>
                </div>
            {/if}
		</li>
		<li class="input-field clear">
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
                    <input type="text" class="input_password" name="password" value="Password" />
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
			<button type="submit" class="button_black_large left button_round analytics" id="login">Log In</button>
		</li>
		<li class="input-field clear font15">
			<a href="{#baseUrl#}account/forgot/" title="Forgot your password?">Forgot your password?</a>
		</li>
	</ul>
</form>