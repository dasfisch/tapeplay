<?php /* Smarty version Smarty-3.1.10, created on 2012-07-11 14:06:36
         compiled from "_smarty/_templates/company/getstarted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10231972644ffce7df690c20-28070041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c158e850d966d0b07bc3d50d13117aa3156d866' => 
    array (
      0 => '_smarty/_templates/company/getstarted.tpl',
      1 => 1341976050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10231972644ffce7df690c20-28070041',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ffce7df6c5c65_79531831',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ffce7df6c5c65_79531831')) {function content_4ffce7df6c5c65_79531831($_smarty_tpl) {?><div id="main">
    <div id="leftCol" class="helpCenter">
        <h2>Get Started</h2>
        <div class="getstarted">
            <h3>Player</h3>
            <p>
                1. <span class="bold">Create an account.</span> It's completely free. <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
user/signup/">Click here!</a>
            </p>
            <p>
                2. <span class="bold">Upload a video.</span> To upload a video, choose a file from your computer.
                Give the video an accurate title and description that will help coaches and scouts discover it.
            </p>
            <p>
                If you don't have a video, go ask your coach for the game video taken at school. When you come back,
                log in and pick up where you left off.
            </p>
            <p>
                <em><span class="italic">Upload tip: You can upload as many videos as you'd like.</span></em>
            </p>
            <p>
                3. <span class="bold">Complete your player information.</span> The more information you give us,
                the better chance a coach or scout will find your video.
            </p>
            <h3>Coaches and Scouts</h3>
            <p>
                1. <span class="bold">Create an account.</span> <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
user/signup/">Click here!</a>
            </p>
            <p>
                2. <span class="bold">Complete your school or organization's information.</span> The more we know about you,
                the better we can serve you in the future.
            </p>
            <p>
                <span class="bold">Pay for a subscription.</span> This helps us pay
                the bills and allows the site to keep providing innovative ways for you to recruit better. What are
                we talking about? <a href="">Check out VideoNotes</a>.
            </p>
            <p>
                3. <span class="bold">Find talent.</span> Search for any video or player. Watch videos. Click
                <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
videos/browse/">Browse</a> to explore the video library of <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
">TapePlay</a>.
            </p>
        </div>
    </div>
    <div id="rightCol" class="helpCenter">
        <?php echo $_smarty_tpl->getSubTemplate ('common/sidebar/share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>