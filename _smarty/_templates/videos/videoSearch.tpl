<div class="search">
	<div id="content-left-column" class="left">
	
		<form name="search" method="post" action="{#baseUrl#}videos/search/">
			<ul class="form-fields">
				<li class="input-field clear">
					
					<div class="input_custom-text input_text80 width425 left">
						<div class="custom-input_center custom-input_partial">
							<span class="custom-input_top"></span>
							<input type="text" name="search" value=""/>
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
					
					<button href="#" class="button_black_medium left">Search</button>
				</li>
				<li>
					{if $videoCount > 0}
				        <p class="results">{$videoCount} results</p>
				    {/if}
				</li>
			</ul>
		</form>
		
		{if $videoCount > 0}
			<ul class="result-list">
            {foreach from=$videos item=video}
                {if $video->getPrivacy() == true}
                	<li class="locked">
						<a href="#" class="video-link"><img src="/media/images/background_lock.png" /></a>
						<div class="result-image left">
							<img class="resultImage" src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}">
						</div>
						<ul class="left">
							<li class="header">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</li>
							<li class="position-height">Postition, Height</li>
							<li class="video-title">{$video->getTitle()}</li>
							<li class="month-year"><?php echo date('F, Y', strtotime('now')); ?></li>
						</ul>
						<div class="clear"></div>
				
                {else}
                	
						<li>
							<a href="{#baseUrl#}videos/view/{$video->getId()}/" class="video-link"></a>
							<div class="result-image left">
								<img class="resultImage" src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}">
							</div>
							<ul class="left">
								<li class="header">{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</li>
								<li class="position-height">Postition, Height</li>
								<li class="video-title">{$video->getTitle()}</li>
								<li class="month-year"><?php echo date('F, Y', strtotime('now')); ?></li>
							</ul>
							<div class="clear"></div>
						</li>
					
                {/if}
            {/foreach}
            </ul>
        {else}
            <h2>Sorry, no results were found.</h2>
        {/if}
		
		{if $videoCount > 0}
	        {include file='common/pagination.tpl'}
	    {/if}
		
	</div>
	<div id="content-right-column" class="right">
	    {include file='common/sidebar/search.tpl'}
	</div>
</div>