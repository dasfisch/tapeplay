<div class="sub_home">
	<div class="ad_970x250">
	
	</div>
	
	<h1>Video makes the world go round.</h1>
	<h2>The world&rsquo;s evolved. So has recruiting.</h2>
	
	<form id="search" action="{#baseUrl#}videos/search/" method="post">
		<ul class="form-fields">
			<li class="input-field clear">
				
				<div class="input_custom-text input_text100 width750 left">
					<div class="custom-input_center custom-input_partial">
						<span class="custom-input_top"></span>
						<input type="text" name="search" value="Search by name, school, coach, etc."/>
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
				
				<a href="#" class="button_black_large left">Search</a>
			</li>
			<li class="clear">
				<div class="width750 background_gray">
					<p class="italic font15">
						Add more search criteria:
					</p>
					<ul class="four-column">
						<li>
							<fieldset>
								<legend>Level</legend>
								<ul class="font15">
									<li>
										<label for="high-school">
											<span class="checkbox"><span class="check"></span></span>
											<input type="checkbox" id="high-school" name="school_level[]" value="high_school" /> 
											High School
										</label>
									</li>
									<li>
										<label for="college">
											<span class="checkbox"><span class="check"></span></span>
											<input type="checkbox" id="college" name="school_level[]" value="college" />
											College
										</label>
									</li>
									<li>
										<label for="professional">
											<span class="checkbox"><span class="check"></span></span>
											<input type="checkbox" id="professional" name="school_level[]" value="professional" />
											Professional
										</label>
									</li>
								</ul>
							</fieldset>
						</li>
						<li>
							<fieldset>
								<legend>Grade</legend>
								<fieldset>
									<select class="select-2">
										<option class="default">Select</option>
										{section name=i start=6 loop=26 step=1}
	                                        <option value="{$smarty.section.i.index}">{$smarty.section.i.index}</option>
	                                    {/section}
									</select>
								</fieldset>
							</fieldset>
						</li>
						<li>
							<fieldset>
								<legend>Position</legend>
								<ul class="font15">
			                        {foreach from=$stats item=stat}
										<li>
											<label for="point-gaurd">
												<span class="checkbox"><span class="check"></span></span>
												<input type="checkbox" id="point-gaurd" name="position_id[]" value="{$stat->getId()}" /> 
												{$stat->getStatName()}
											</label>
										</li>
									{/foreach}
								</ul>
							</fieldset>
						</li>
						<li>
							<fieldset>
								<legend>Height</legend>
								<fieldset>
									<select class="select-2">
										<option class="default">Select</option>
										{section name=i start=48 loop=96 step=1}
	                                        <option value="{$smarty.section.i.index}">{$smarty.section.i.index}</option>
	                                    {/section}
									</select>
								</fieldset>
							</fieldset>
							<fieldset>
								<legend>Weight</legend>
								<div class="input_custom-text input_text36 left">
									<div class="custom-input_center custom-input_partial">
										<span class="custom-input_top"></span>
										<input type="text" name="search" value=".lbs" size="4" />
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
							</fieldset>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
			</li>
		</ul>
	</form>
	
</div>