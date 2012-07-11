<?php /* Smarty version Smarty-3.1.10, created on 2012-07-10 21:15:00
         compiled from "_smarty/_templates/user/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17789251834ff9f2a12c5848-78882465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00b65e21cf34d256c35d4f1669e61a0a85f74cda' => 
    array (
      0 => '_smarty/_templates/user/login/login.tpl',
      1 => 1341972819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17789251834ff9f2a12c5848-78882465',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff9f2a12f0d78_20012694',
  'variables' => 
  array (
    'baseUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff9f2a12f0d78_20012694')) {function content_4ff9f2a12f0d78_20012694($_smarty_tpl) {?><div id="main">
    <h2>Log In</h2>
    <p class="facebookLogin">Have a Facebook account? <span class="facebookConnect"></span></p>
    <form id="loginForm" name="login" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/login/" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="username" name="username" value="Email Address" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter a valid email address</p>
            <p class="error lower">Example: sebastian.frohm@gmail.com</p>
        </div>
        <div class="input last">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="password" name="password" value="" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"></p>
        </div>
        <div class="option">
            <div class="checkbox">
                <input type="hidden" name="" value="" class="checkValue" />
                <div class="box">
                    <div class="checkMark"></div>
                </div>
                <div class="label">Remember me</div>
            </div>
            <p class="forgot"><a href="">Forgot your password?</a></p>
        </div>
        <div class="bigButton black">
            <div class="topLeft whiteBg"></div>
            <div class="topRight whiteBg"></div>
            <div class="bottomLeft whiteBg"></div>
            <div class="bottomRight whiteBg"></div>
            <div class="middle">
                <input type="submit" value="Log In" id="login" class="large black" />
            </div>
        </div>
    </form>
</div>
<div id="ad">
    ad
</div><?php }} ?>