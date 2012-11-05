<div class="email-video">
	<div id="content-left-column">
		<h1>Email Video</h1>
		<p>
			Recruiting Tip: Email your video to colleges or professional organizations you are interested in playing for or copy the link to share the URL. Keep a log of every contact you make and remember to follow up.
		</p>
		<ul class="result-list">
			<li>
				<div class="result-image left">
                {if isset($fileExists) && $fileExists == true}
                    <img src="{#pandaBase#}{$video->getPandaId()}{#pandaImageExt#}" style="width:125px;height:95px;" class="resultImage" />
                {else}
                    <img src="{#baseUrl#}media/images/defaultImage.gif" style="width:125px;height:95px;" class="resultImage" />
                {/if}
				</div>
				<ul class="left">
					<li class="header">{$player->getFirstName()} {$player->getLastName()}</li>
					<li class="position-height">
                        {foreach from=$player->getPosition() key=key item=position}
                            {if $position->getName() != 'Individual'}
                                {$position->getName()},
                            {/if}
                        {/foreach}
                        {if $player->getHeight() != 0 && $player->getHeight() != ''}
                            {$player->getFriendlyHeight()},
                        {/if}
                        {if $player->getWeight() != 0 && $player->getWeight() != ''}
                            {$player->getWeight()} lbs.
                        {/if}
                    </li>
					<li class="video-title">{$video->getTitle()}</li>
					<li class="month-year">
                        {if $video->getRecordedMonth() != 0}
                            {$video->getRecordedMonthName()},
                        {/if}
                        {if $video->getRecordedYear() != 0}
                            {$video->getRecordedYear()}
                        {/if}
                    </li>
				</ul>
				<div class="clear"></div>
			</li>
		</ul>
		{if isset($message) && !empty($message)}
            {$message}
        {else}
            <form id="emailFriend" action="" method="post">
                <input type="hidden" name="hash" value="{$hash}" />
                <ul class="form-fields">
                    <li class="input-field clear">
                        <strong>From</strong>
                        <div class="input_custom-text input_text80 width440">
                            <div class="custom-input_center custom-input_partial">
                                <span class="custom-input_top"></span>
                                <input type="text" name="from" value="Full Name" class="required noDefault" />
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
                        <p class="addAnother">
                            <img src="/media/images/icon_add-plus-sign.gif" class="vertical-center" /> Add another email address
                        </p>
                    </li>
                    <li class="input-field clear">
                        <button value="Share" type="submit" class="button_black_large left button_round">Share</button>
                    </li>
                </ul>
            </form>
        {/if}
	</div>
	<div id="content-right-column" class="right">
	    {include file='common/sidebar/emailVideo.tpl'}
	</div>
</div>

<script type="text/javascript">
	tp = {};
	
	tp.f = {}

	tp.f..createNewElement = function(e, c, a) {
		var newElement; // New element that will be created;
		
		newElement = document.createElement(e);
		if (c != null) newElement.className = c;
		if (typeof a != 'undefined' && typeof a == 'object') {
			for (var i in a) {
				newElement.setAttribute(i, a[i]);
			}
		}
		return newElement;
	}
	
	tp.f.functions.addChildren = function(p, c) {
		if (p && c) {
			for (var i=0; i < c.length; i++) {
				p.appendChild(c[i]);
			}
			return p;
		}
	}
</script>