<div id="main">
<h2>Player Info</h2>

<p class="facebookLogin">
	The more you tell us about yourself, the easier it is for coaches and scouts
	to find what they're looking for.
</p>

<div id="playerInfo">
<div id="videoInfo">
	<p id="status">
		Video Status: <span class="success italic">Upload complete!</span>
	</p>
	<img src="/" class="resultImage"/>

	<div class="info">
		<h4>Title</h4>

		<p class="date">April, 2012</p>

		<p class="length">12:00</p>

		<p class="bottom italic">Video file name</p>
	</div>
</div>
<form id="playerInfoForm" name="playerInfoForm" action="{#baseUrl#}user/info/" method="post">
<input type="hidden" name="sport" value="{$postSport}" />
<input type="hidden" name="user_id" value="{$userId}" />
<div class="input">
	<ul id="basicInfo">
		<li>
			<div class="inputField">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="number" name="number" value="##"" />
				</div>
				<div class="right"></div>
			</div>
		</li>
		<li>
			<div class="option">
				<p class="header">Level</p>

				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">High School</div>
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Collegiate</div>
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Professional</div>
				</div>
			</div>
		</li>
		<li>
			<div class="sportSelect">
				<p class="label">Grade</p>
				<div class="sportSelect">
                    <div class="dropper">
                        <div class="leftMedium"></div>
                        <div class="middleMedium middle">
                            <p class="value">Grade</p>
                            <input type="hidden" name="gradeLevel" class="dropVal" value="" />
                        </div>
                        <div class="rightMedium"></div>
                        <ul class="potentials">
                            <li>8</li>
                            <li>9</li>
                            <li>10</li>
                            <li>11</li>
                            <li>12</li>
                        </ul>
                    </div>
                    <div class="arrowSmall"></div>
                </div>
            </div>
		</li>
		<li>
			<div class="option">
				<p class="header">Position</p>

				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Point Guard</div>
                    <input type="checkbox" class="checkValue hidden" name="remember_me" />
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Shooting Guard</div>
                    <input type="checkbox" class="checkValue hidden" name="remember_me" />
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Small Forward</div>
                    <input type="checkbox" class="checkValue hidden" name="remember_me" />
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Power Forward</div>
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Center</div>
				</div>
			</div>
		</li>
		<li>
			<div class="onTop">
				<div class="height">
					<div class="sportSelect">
						<div class="dropper">
							<div class="leftMedium"></div>
							<div class="middleMedium middle">
								<p class="value">Height</p>
								<input type="hidden" name="height" class="dropVal" value="" />
							</div>
							<div class="rightMedium"></div>
							<ul class="potentials">
                                {section name=i loop=96 start=48 step=1}
                                    <li>
                                        {$smarty.section.i.index}
                                        <input type="hidden" class="value" value="{$smarty.section.i.index}" />
                                    </li>
                                {/section}
							</ul>
						</div>
						<div class="arrowSmall"></div>
					</div>
				</div>
				<div class="weight">
					<div class="inputField">
						<div class="left"></div>
						<div class="middle">
							<input type="text" class="standard" id="weight" name="weight" value="lbs"/>
						</div>
						<div class="right"></div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<div class="input">
	<p class="label">School/Team Info</p>

	<div class="inputField">
		<div class="left"></div>
		<div class="middle">
            <input type="text" class="standard small" id="schoolSearchInput" name="schoolSearchInput" value="School Name" />
            <input type="hidden" class="passer" name="schoolId" value="" />
		</div>
		<div class="right"></div>
	</div>
	<div class="inputField">
		<div class="left"></div>
		<div class="middle">
			<input type="text" class="standard" id="headCoachName" name="headCoachName" value="Head Coach's Name"" />
		</div>
		<div class="right"></div>
	</div>
</div>
<div class="input graduation">
	<p class="label">Graduation Date <span class="regular">(optional)</span></p>

	<div class="sportSelect">
		<div class="dropper">
			<div class="leftMedium"></div>
			<div class="middleMedium middle">
				<p class="value">Month</p>
				<input type="hidden" name="graduationMonth" class="dropVal" value="" />
			</div>
			<div class="rightMedium"></div>
			<ul class="potentials">
				<li>
                    January
                    <input type="hidden" class="value" value="1" />
                </li>
				<li>
                    February
                    <input type="hidden" class="value" value="2" />
                </li>
				<li>
                    March
                    <input type="hidden" class="value" value="3" />
                </li>
				<li>
                    April
                    <input type="hidden" class="value" value="4" />
                </li>
				<li>
                    May
                    <input type="hidden" class="value" value="5" />
                </li>
				<li>
                    June
                    <input type="hidden" class="value" value="6" />
                </li>
				<li>
                    July
                    <input type="hidden" class="value" value="7" />
                </li>
				<li>
                    August
                    <input type="hidden" class="value" value="8" />
                </li>
				<li>
                    September
                    <input type="hidden" class="value" value="9" />
                </li>
				<li>
                    October
                    <input type="hidden" class="value" value="10" />
                </li>
				<li>
                    November
                    <input type="hidden" class="value" value="11" />
                </li>
				<li>
                    December
                    <input type="hidden" class="value" value="12" />
                </li>
			</ul>
		</div>
		<div class="arrowSmall"></div>
	</div>
	<div class="sportSelect">
		<div class="dropper">
			<div class="leftMedium"></div>
			<div class="middleMedium middle">
				<p class="value">Year</p>
				<input type="hidden" name="graduationYear" class="dropVal" value="" />
			</div>
			<div class="rightMedium"></div>
			<ul class="potentials">
                {section name=i start=$startYear loop=$startYear+5 step=1}
                    <li>
                        {$smarty.section.i.index}
                        <input type="hidden" class="value" value="{$smarty.section.i.index}" />
                    </li>
                {/section}
			</ul>
		</div>
		<div class="arrowSmall"></div>
	</div>
</div>
<div class="input">
    {if isset($stats) && count($stats) > 0}
        <p class="label">Statistics <span class="regular">(optional)</span>:</p>
       	<ul id="stats">
            {assign var=i value=0}
            {foreach from=$stats item=stat}
                {if $i % $modder == 0 || $i == 0}
                    <li>
                {/if}
                        <div class="single">
                            <p>{$stat->getStatName()}</p>
                            <div class="inputFieldSmall">
                                <div class="left"></div>
                                <div class="middle">
                                    <input type="text" class="standard" id="stat" name="stat[{$stat->getId()}]" value=""/>
                                </div>
                                <div class="right"></div>
                            </div>
                        </div>
                {if ($i%$modder == $modder - 1 && $i > $modder) || $i == ($statCount - 1)}
                    </li>
                {/if}
                {$i = $i+1}
            {/foreach}
        </ul>
    {/if}
</div>
<div class="bigButton black">
	<div class="topLeft whiteBg"></div>
	<div class="topRight whiteBg"></div>
	<div class="bottomLeft whiteBg"></div>
	<div class="bottomRight whiteBg"></div>
	<div class="middle">
		<input type="submit" value="Submit" id="submit" class="large black"/>
	</div>
</div>
<div class="option step">
	Step 3 of 3
</div>
</form>
</div>
</div>
<div id="ad">
	ad
</div>