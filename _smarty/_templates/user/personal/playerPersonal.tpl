
        <!-- <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Birth Year</p>
						<input type="hidden" name="birthYear" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        {$birthYears}
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Sex</p>
						<input type="hidden" name="gender" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <li>Male</li>
                        <li>Female</li>
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div> -->
        
<h1>Player Sign Up</h1>
<h4>Have a Facebook account? <span class="facebookConnect"></span></h2>
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
					<input type="text" id="password" name="password" value="Password (at least six characters)"/>
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
				<!--<li class="left">
					<fieldset class="left">
						<select class="select-5">
							<option class="default">Birth Year</option>
							<option>1996</option>
							<option>1995</option>
							<option>1994</option>
							<option>1993</option>
							<option>1992</option>
							<option>1991</option>
							<option>1990</option>
							<option>1989</option>
							<option>1988</option>
							<option>1987</option>
							<option>1986</option>
							<option>1985</option>
						</select>
					</fieldset>
				</li>-->
				<li class="left"></li>
				<li class="left">
					<div class="input_custom-text input_text80 width240 left">
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
			<!-- <fieldset class="left">
				<select class="select-3">
					<option class="default">Birth Year</option>
					<option>1996</option>
					<option>1995</option>
					<option>1994</option>
					<option>1993</option>
					<option>1992</option>
					<option>1991</option>
					<option>1990</option>
					<option>1989</option>
					<option>1988</option>
					<option>1987</option>
					<option>1986</option>
					<option>1985</option>
				</select>
			</fieldset>
			
			<fieldset class="left">
				<select class="select-3">
					<option class="default">Sex</option>
					<option>Male</option>
					<option>Female</option>
				</select>
			</fieldset> -->
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
		<li class="input-field clear">
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
			<a href="#" class="button_black_large left button_round">Join</a> 
			<span class="form-steps">Step 1 of 3</span>
		</li>
	</ul>
</form>
