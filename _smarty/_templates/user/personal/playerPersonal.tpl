<h1>Player Sign Up</h1>
{include file='common/message.tpl'}
<form id="coachForm" name="login" action="{#baseUrl#}user/personal/" method="post">
	<ul class="form-fields">
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" id="firstName" name="firstName" value="First Name" />
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
					<li>Enter your first name.</li>
					<li>Do not use numbers.</li>
				</ul>
			</div>
			
		</li>
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" id="lastName" name="lastName" value="Last Name" />
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
					<li>Enter your last name.</li>
					<li>Do not use numbers.</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" id="email" name="email" value="Email" />
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
                    <input type="text" class="input_password" value="Password (at least six characters)" />
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
					<li>Enter password of six characters or more.</li>
				</ul>
			</div>
			
		</li>
		<li class="input-field clear">
			<ul class="three-column_sign-up left">
				<li class="left">
					<fieldset>
						<select class="select-5">
							<option class="default">Birth Year</option>
							{$birthYears}
						</select>
					</fieldset>
				</li>
				<li class="left">
					<fieldset>
						<select class="select-6">
							<option class="default">Sex</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</fieldset>
				</li>
				<li class="left">
					<div class="input_custom-text input_text80 width185 left">
						<div class="custom-input_center custom-input_partial">
							<span class="custom-input_top"></span>
							<input type="text" id="zipcode" name="zipcode" value="Zip Code" />
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
				</li>
			</ul>
			<div class="error-alert">
				<ul>
					<li>Enter birth year.</li>
					<li>Enter sex.</li>
					<li>Enter valid 5-digit zip code.</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
			<fieldset class="left">
				<ul class="font15">
					<li>
						<label for="i-agree">
							<span class="checkbox"><span class="check"></span></span>
							<input type="checkbox" id="i-agree" name="agree" value="I Agree" /> 
							By checking this box, I certify that I am 13 years of age or older.
						</label>
					</li>
				</ul>
			</fieldset>
			<div class="error-alert">
				<ul>
					<li>We appreciate your interest; however in order to use our site you must be 13 years of age or older.</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear margin-clear">
			<fieldset class="left">
				<ul class="font15">	
					<li>
						<label for="terms">
							<span class="checkbox"><span class="check"></span></span>
							<input type="checkbox" id="terms" name="terms" value="I agree" />
							I agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>.
						</label>
					</li>
				</ul>
			</fieldset>
			<div class="error-alert">
				<ul>
					<li>Please agree with our Terms of Use.</li>
				</ul>
			</div>
		</li>
		<li class="input-field clear">
			<button value="Join" type="submit" class="button_black_large left button_round">Join</button> 
			<span class="form-steps">Step 1 of 3</span>
		</li>
	</ul>
</form>
