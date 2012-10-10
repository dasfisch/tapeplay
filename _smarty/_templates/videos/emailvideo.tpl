<div class="email-video">
	<div id="content-left-column">
		<h1>Email Video</h1>
		
		<ul class="result-list">
                	
			<li>
				<div class="result-image left">
					<img class="resultImage" src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}">
				</div>
				<ul class="left">
					<li class="header">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</li>
					<li class="position-height">
                        {foreach from=$video->getPlayer()->getPosition() key=key item=position}
                            {if $position->getName() != 'Individual'}
                                {$position->getName()},
                            {/if}
                        {/foreach}
                        {$video->getPlayer()->getHeight()}
                    </li>
					<li class="video-title">{$video->getTitle()}</li>
					<li class="month-year">
                        {if $video->getRecordedMonth() != 0}
                            {$video->getRecordedMonth()} /
                        {/if}
                        {if $video->getRecordedYear() != 0}
                            {$video->getRecordedYear()}
                        {/if}
                    </li>
				</ul>
				<div class="clear"></div>
			</li>
		
		</ul>
		
		<form id="emailFriend" action="" method="post">
	        <input type="hidden" name="hash" value="{$hash}" />
			<ul class="form-fields">
				<li class="input-field clear">
					<strong>From</strong>
					<div class="input_custom-text input_text80 width440">
						<div class="custom-input_center custom-input_partial">
							<span class="custom-input_top"></span>
							<input type="text" name="from" value="Full Name"/>
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
				<li class="input-field clear copy">
					<strong>To</strong>
					<div class="input_custom-text input_text80 width440">
						<div class="custom-input_center custom-input_partial">
							<span class="custom-input_top"></span>
							<input type="text" name="email[]" value="Email Address" class="required email noDefault" />
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
				<li class="input-field clear">
					<p>
						<img src="/media/images/icon_add-plus-sign.gif" class="vertical-center addAnother" /> Add another email address
					</p>
				</li>
				<li class="input-field clear">
					<button value="Share" type="submit" class="button_black_large left button_round">Share</button>
				</li>
			</ul>
		</form>
	</div>
	<div id="content-right-column" class="right">
	    {include file='common/sidebar/emailVideo.tpl'}
	</div>
</div>