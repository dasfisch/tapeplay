<?php /* Smarty version Smarty-3.1.10, created on 2012-07-10 17:36:17
         compiled from "_smarty/_templates/user/personal/playerPersonal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17304832014ffcae6162caa3-16026465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02b38403432027e357d7dc99e987b583915e71fc' => 
    array (
      0 => '_smarty/_templates/user/personal/playerPersonal.tpl',
      1 => 1341780418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17304832014ffcae6162caa3-16026465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseUrl' => 0,
    'birthYears' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ffcae616b8272_25087081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ffcae616b8272_25087081')) {function content_4ffcae616b8272_25087081($_smarty_tpl) {?><div id="main">
    <h2>Player Sign Up</h2>
    <p class="facebookLogin">Have a Facebook account? <span class="facebookConnect"></span></p>
    <form id="coachForm" name="login" action="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/user/personal/" method="post">
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="firstName" name="firstName" value="First Name" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter your first name here.</p>
            <p class="error lower">Do not use numbers.</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="lastName" name="lastName" value="Last Name" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter your last name here.</p>
            <p class="error lower">Do not use numbers.</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="password" name="password" value="Password" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Your password must be at least 6 characters.</p>
        </div>
        <div class="input">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="passwordConfirm" name="passwordConfirm" value="Confirm Password" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Passwords do not match!</p>
        </div>
        <div class="input last">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="email" name="email" value="Email" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error"></p>
        </div>
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Birth Year</p>
						<input type="hidden" name="birthYear" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <?php echo $_smarty_tpl->tpl_vars['birthYears']->value;?>

                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="option dropdown">
            <div class="sportSelect">
                <div class="dropper">
                    <div class="leftMedium"></div>
                    <div class="middleMedium middle">
                        <p class="value">Sex</p>
						<input type="hidden" name="gender" class="dropVal" value="" />
                    </div>
                    <div class="rightMedium"></div>
                    <ul class="potentials">
                        <li>Male</li>
                        <li>Female</li>
                    </ul>
                </div>
                <div class="arrowSmall"></div>
            </div>
        </div>
        <div class="option zip">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle small">
                    <input type="text" class="standard" id="zipcode" name="zipcode" value="Zip Code" />
                </div>
                <div class="right"></div>
            </div>
            <p class="error">* Enter your last name here.</p><Br/>
            <p class="error lower">Do not use numbers.</p>
        </div>
        <div class="option check">
            <div class="checkbox">
                <div class="box">
                    <div class="checkMark"></div>
                </div>

                <div class="label">
                    I agree to the <a>Terms and Condition</a> and <a>Privacy Policy</a>
                </div>
            </div>
            <p class="error">
                * We appreciate your interest, however, in order to use our site, you must
                be 13 years of age or older.
            </p>
        </div>
        <div class="option check">
            <div class="checkbox">
                <div class="box">
                    <div class="checkMark"></div>
                </div>
                <div class="label">
                    By checking this box, I certify I am at least 13 years of age or older.
                </div>
            </div>
            <p class="error">* Please agree with our Terms of Use.</p>
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
        <div class="option step">
            Step 1 of 3
        </div>
    </form>
</div>
<div id="ad">
    ad
</div><?php }} ?>