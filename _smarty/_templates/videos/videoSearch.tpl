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
            {foreach from=$videos item=video}
                {if $video->getPrivacy() == true}
                   <!-- <div class="result opaque">
                        <div class="infoOpen">
                            <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" class="resultImage locked" />
                            <div class="info">
                                <h2>{$video->getPlayer()->getFirstName()} {$video->getPlayer()->getLastName()}</h2>
                                <p class="position"></p>
                                <p class="title">{$video->getTitle()}</p>
                                <p class="date"><?php echo date('F, Y', strtotime('now')); ?></p>
                            </div>
                        </div>
                        <div class="infoBubble">
                            <div class="topLeft"></div>
                            <div class="topRight"></div>
                            <div class="middle">
                                <p>
                                    <strong>We're sorry.</strong> Only account holders can view this video.
                                    <br /><br />
                                    Want to view this video?
                                    <br />
                                    <a>Join</a> or <a>log in</a>.
                                </p>
                            </div>
                            <div class="directionBottomRight"></div>
                            <div class="bottomRight"></div>
                            <div class="direction"></div>
                        </div>
                    </div> -->
                {else}
                	<ul class="result-list">
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
					</ul>
                {/if}
            {/foreach}
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