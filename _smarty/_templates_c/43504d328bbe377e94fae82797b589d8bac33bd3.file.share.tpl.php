<?php /* Smarty version Smarty-3.1.10, created on 2012-06-25 14:03:36
         compiled from "_smarty/_templates/company/share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8151184064fe8b174895e05-08688477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43504d328bbe377e94fae82797b589d8bac33bd3' => 
    array (
      0 => '_smarty/_templates/company/share.tpl',
      1 => 1340650990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8151184064fe8b174895e05-08688477',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe8b1748bb6d2_69508021',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe8b1748bb6d2_69508021')) {function content_4fe8b1748bb6d2_69508021($_smarty_tpl) {?><div id="main">
    <div id="leftCol">
        <h2 id="title">Share TapePlay</h2>
        <p>Tell your teammates, coaches, and friends to check us out.</p>
        <form id="emailFriend" action="" method="post">
            <label for="from">From</label>
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="from" name="from" value="Full Name" />
                </div>
                <div class="right"></div>
            </div>
            <label for="from">To</label>
            <div class="inputField last">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="email" name="email" value="Email Address" />
                </div>
                <div class="right"></div>
            </div>
            <div class="addAnother">
                <p>
                    <span class="plusCircle"></span>
                    <span class="addText">Add another email address</span>
                </p>
            </div>
            <div class="bigButton black">
                <div class="topLeft whiteBg"></div>
                <div class="topRight whiteBg"></div>
                <div class="bottomLeft whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Send" id="sendSearch" class="large black" />
                </div>
            </div>
        </form>
    </div>
    <div id="rightCol">
        <div id="share">
            <?php echo $_smarty_tpl->getSubTemplate ('common/sidebar/share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</div>
<div id="ad">

</div><?php }} ?>