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
<form id="playerInfoForm" name="playerInfoForm" action="{$baseUrl}/user/info/" method="post">
<div class="input">
	<p class="label">Pick Sport</p>

	<div class="sportSelect">
		<div class="dropper">
			<div class="leftMedium"></div>
			<div class="middleMedium">
				<p class="value">Pick Your Sport</p>
			</div>
			<div class="rightMedium"></div>
			<ul class="potentials">
				<li>Women's Soccer</li>
				<li>Women's Basketball</li>
				<li>Women's Hockey</li>
			</ul>
		</div>
		<div class="arrowSmall"></div>
	</div>
</div>
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
				<p class="header">Position</p>

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
				<div class="dropper">
					<div class="leftMedium"></div>
					<div class="middleMedium">
						<p class="value">Grade</p>
					</div>
					<div class="rightMedium"></div>
					<ul class="potentials">
						<li>Women's Soccer</li>
						<li>Women's Basketball</li>
						<li>Women's Hockey</li>
					</ul>
				</div>
				<div class="arrowSmall"></div>
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
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Shooting Guard</div>
				</div>
				<div class="checkbox">
					<div class="box">
						<div class="checkMark"></div>
					</div>
					<div class="label">Small Forward</div>
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
							<div class="middleMedium">
								<p class="value">Grade</p>
							</div>
							<div class="rightMedium"></div>
							<ul class="potentials">
								<li>Women's Soccer</li>
								<li>Women's Basketball</li>
								<li>Women's Hockey</li>
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
			<input type="text" class="standard" id="schoolName" name="schoolName" value="School Name"" />
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
			<div class="middleMedium">
				<p class="value">Month</p>
			</div>
			<div class="rightMedium"></div>
			<ul class="potentials">
				<li>January</li>
				<li>February</li>
				<li>March</li>
				<li>April</li>
				<li>May</li>
				<li>June</li>
				<li>July</li>
				<li>August</li>
				<li>September</li>
				<li>October</li>
				<li>November</li>
				<li>December</li>
			</ul>
		</div>
		<div class="arrowSmall"></div>
	</div>
	<div class="sportSelect">
		<div class="dropper">
			<div class="leftMedium"></div>
			<div class="middleMedium">
				<p class="value">Year</p>
			</div>
			<div class="rightMedium"></div>
			<ul class="potentials">
			{$graduationYears}
			</ul>
		</div>
		<div class="arrowSmall"></div>
	</div>
</div>
<div class="input">
	<p class="label">Statistics <span class="regular">(optional)</span>:</p>
	<ul id="stats">
		<li>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
		</li>
		<li>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
		</li>
		<li>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
			<p>Games played:</p>

			<div class="inputFieldSmall">
				<div class="left"></div>
				<div class="middle">
					<input type="text" class="standard" id="from" name="from" value="Full Name"/>
				</div>
				<div class="right"></div>
			</div>
		</li>
	</ul>
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