<?php /* Smarty version Smarty-3.1.10, created on 2012-07-12 15:41:37
         compiled from "_smarty/_templates/user/signup/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20953379154ff9f1de50c0d3-27075167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd50fdc997bece5434f00b36bd62ae1e525c0097' => 
    array (
      0 => '_smarty/_templates/user/signup/signup.tpl',
      1 => 1342125696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20953379154ff9f1de50c0d3-27075167',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff9f1de5e89c7_97073374',
  'variables' => 
  array (
    'baseUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff9f1de5e89c7_97073374')) {function content_4ff9f1de5e89c7_97073374($_smarty_tpl) {?><div id="main">
	<form id="accountTypeForm" name="accountTypeForm" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/signup/">
	<h2>Which account is right for you?</h2>

	<div class="tallAccount white">
		<h3>Players</h3>

		<div class="cornerBox orange">no cost</div>
		<p>
			TapePlay was created for the player. We're here to give power back to the
			talented athletes that deserve to be seen by coaches and scouts, not just
			the well connected.
		</p>

		<p>
			It's simple. Upload videos and get seen by the people who matter.
		</p>
		<ul class="lastLeft">
			<li>It's completely free</li>
			<li>Let coaches and scouts find you</li>
			<li>Upload as many videos as you want</li>
			<li>Know your video activity (Saves, Views, etc.)</li>
		</ul>
		<div class="bigButton orange">
			<div class="topLeft whiteBg"></div>
			<div class="topRight whiteBg"></div>
			<div class="bottomLeft whiteBg"></div>
			<div class="bottomRight whiteBg"></div>
			<div class="middle">
				<input type="submit" value="Sign Up" id="playerButton" name="playerButton" class="large orange"/>
			</div>
		</div>
	</div>
	<div class="tallAccount black">
		<h3>The Coach</h3>

		<div class="cornerBox white">$199 fee</div>
		<p>
			You'll have all the access that coaches do. Inside are player videos that you can
			search, save, comment on with time stamps, and share instantly with your entire
			staff. Even when you're on the road. We're here to make finding talent quick and easy.
		</p>
		<ul>
			<li>Access player videos and statistics</li>
			<li>Use <span class="bold">VideoNotes</span> to share time stamps and notes with staff</li>
			<li>Search for athletes by specific criteria</li>
			<li>Save any video with one click</li>
		</ul>
		<p class="last">
			To join as a coach, you'll need a .edu email address.
		</p>

		<div class="bigButton white">
			<div class="topLeft blackBg"></div>
			<div class="topRight blackBg"></div>
			<div class="bottomLeft blackBg"></div>
			<div class="bottomRight blackBg"></div>
			<div class="middle">
				<input type="submit" value="Sign Up" id="coachButton" name="coachButton" class="large white"/>
			</div>
		</div>
	</div>
	<div class="wideAccount">
		<div class="cornerBox black">$199 fee</div>
		<div id="info">
			<h3>The Scout</h3>

			<p>
				You'll have all the access that coaches do. The only difference is that you don't
				need an .edu email address.
			</p>
		</div>
		<div class="bigButton black">
			<div class="topLeft whiteBg"></div>
			<div class="topRight whiteBg"></div>
			<div class="bottomLeft whiteBg"></div>
			<div class="bottomRight whiteBg"></div>
			<div class="middle">
				<input type="submit" value="Sign Up" id="scoutButton" name="scoutButton" class="large black"/>
			</div>
		</div>
	</div>

	</form>
</div>
<div id="ad">
	ad
</div><?php }} ?>