<?php /* Smarty version Smarty-3.1.10, created on 2012-07-10 22:11:34
         compiled from "_smarty/_templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11214827914fe799a25b6b20-81343857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e48d42d3d165e17810f914c4728e73387b798be' => 
    array (
      0 => '_smarty/_templates/common/header.tpl',
      1 => 1341976050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11214827914fe799a25b6b20-81343857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe799a25b9d92_09775747',
  'variables' => 
  array (
    'sport' => 0,
    'sports' => 0,
    'single' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe799a25b9d92_09775747')) {function content_4fe799a25b9d92_09775747($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
    <head>
        <title>TapePlay</title>

        <link rel="stylesheet" href="/css/reset.css" type="text/css" />
        <link rel="stylesheet" href="/css/tapeplay.css" type="text/css" />
        <link rel="stylesheet" href="/css/jquery.css" type="text/css" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.js"></script>
		<script type="text/javascript" src="/js/tapeplay.js"></script>
        <script type="text/javascript" src="/js/jquery.panda.min.js"></script>
    </head>
    <body id="tapeplay">
        <div id="header">
            <div id="holder">
                <div id="left">
                    <h1>TapePlay</h1>
                    <div id="sportSelect">
                        <div id="beta"></div>
                        <div id="dropper">
                            <div id="values">
                                <form name="sportChooser" id="sportChooser" method="post">
                                    <input type="hidden" class="chosenSport" name="chosenSport" id="chosenSport" />
                                    <p id="value">
                                        <?php if (isset($_smarty_tpl->tpl_vars['sport']->value)){?>
                                            <?php echo $_smarty_tpl->tpl_vars['sport']->value;?>

                                        <?php }else{ ?>
                                            Women's Baskeyball
                                        <?php }?>
                                    </p>
                                    <ul id="potentials">
                                        <?php  $_smarty_tpl->tpl_vars['single'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['single']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['single']->key => $_smarty_tpl->tpl_vars['single']->value){
$_smarty_tpl->tpl_vars['single']->_loop = true;
?>
                                            <li>
                                                <?php echo $_smarty_tpl->tpl_vars['single']->value->getSportName();?>

                                                <input type="hidden" class="sportId" value="<?php echo $_smarty_tpl->tpl_vars['single']->value->getId();?>
" />
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </form>
                            </div>
                            <div id="arrow"></div>
                        </div>
                    </div>
                </div>
                <div id="right">
                    <ul id="links">
                        <li>
                            <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
/user/signup/">Join<span class="fbSmall"></span></a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
/user/login/">Log In</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
/user/upload/" class="infoOpen leftShift">Upload</a>
                            <div class="infoBubble">
                                <div class="topLeft black"></div>
                                <div class="directionTopRight"></div>
                                <div class="middle">
                                    <p>
                                        <strong>Players</strong> must be logged into their accounts to
                                        upload a video. <a>Log in</a>.
                                        <br /><br />
                                        Don't have an account yet? <a>Sign up</a>.
                                        <br /><br />
                                        <strong>Coaches and Scouts</strong> cannot upload videos. We're
                                        sure you're very talented, but we're not interested. Sorry.
                                    </p>
                                </div>
                                <div class="bottomLeft"></div>
                                <div class="bottomRight"></div>
                                <div class="direction"></div>
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
/videos/browse/">Browse</a>
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
/company/faq/">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><?php }} ?>