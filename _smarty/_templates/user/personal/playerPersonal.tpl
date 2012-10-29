<h1>Player Sign Up</h1>
{include file='common/message.tpl'}
<form id="coachForm" name="login" class="joinForm" action="{#baseUrl#}user/personal/" method="post">
	<ul class="form-fields">
		<li class="input-field clear">
			
			<div class="input_custom-text input_text80 width600 left">
				<div class="custom-input_center custom-input_partial">
					<span class="custom-input_top"></span>
					<input type="text" id="firstName" name="firstName"
                           value="{if isset($post) && $post['firstName'] != ''}{$post.firstName}" class="blackText"{else}First Name" class="noDefault"{/if} />
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
					<input type="text" id="lastName" name="lastName"
                           value="{if isset($post) && $post.lastName != ''}{$post.lastName}" class="blackText"{else}Last Name" class="noDefault"{/if} />
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
					<input type="text" id="email" name="email"
                           value="{if isset($post) && $post.email != ''}{$post.email}" class="blackText"{else}Email"{/if} />
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

            {if isset($userExists) && !empty($userExists)}
                <div class="error-alert shown">
                    <ul>
                        <li>{$userExists}</li>
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
                    <input type="text" class="input_password" name="password" value="Password (at least six characters)" />
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
                        {html_select_date
                            start_year=$thirteenBelow
                            display_days=false
                            display_months=false
                            end_year="-50"
                            year_empty='Birth Year'
                            prefix='birth'
                            all_extra='class="select-5"'
                            reverse_years=true
                            time=$selected
                        }
					</fieldset>
				</li>
				<li class="left">
					<fieldset>
						<select class="select-6" name="gender">
							<option class="default">Sex</option>
                            {if isset($post) && $post.gender}
                                <option value="M"{if $post.gender == 'M'} selected{/if}>Male</option>
                                <option value="F"{if $post.gender == 'F'} selected{/if}>Female</option>
                            {else}
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            {/if}
						</select>
					</fieldset>
				</li>
				<li class="left">
					<div class="input_custom-text input_text80 width185 left">
						<div class="custom-input_center custom-input_partial">
							<span class="custom-input_top"></span>
							<input type="text" id="zipcode" name="zipcode"
                                   value="{if isset($post) && $post.zipcode != ''}{$post.zipcode}" class="blackText"{else}Zip code"{/if} maxlength="5" />
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
				<ul class="tripleUp">
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
						<label for="terms">
                            <span class="checkbox"><span class="check"></span></span>
							I agree to the <a id="signup-toc" href="#">Terms of Service</a> and <a id="signup-privacy" href="#">Privacy Policy</a>.
						</label>
                        <input type="checkbox" id="terms" name="terms" class="required" />
					</li>
				</ul>
			</fieldset>
			<div class="error-alert">
				<ul>
					<li>Please agree with our Terms of Service.</li>
				</ul>
			</div>
		</li>
        <li class="input-field clear margin-clear">
      			<fieldset class="left">
      				<ul class="font15">
      					<li>
      						<label for="i-agree">
      							<span class="checkbox"><span class="check"></span></span>
      							By checking this box, I certify that I am 13 years of age or older.
      						</label>
                            <input type="checkbox" id="theAgree" name="theAgree" value="I Agree" />
      					</li>
      				</ul>
      			</fieldset>
      			<div class="error-alert">
      				<ul>
      					<li>We appreciate your interest but in order to use our site you must be 13 years of age or older.</li>
      				</ul>
      			</div>
      		</li>
		<li class="input-field clear">
                <button value="Join" type="submit" class="button_black_large left button_round">Join</button>
                <span class="form-steps">Step 1 of 3</span>
		</li>
	</ul>
</form>
