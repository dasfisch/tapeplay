<?php /* Smarty version Smarty-3.1.10, created on 2012-07-12 09:02:07
         compiled from "_smarty/_templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12745404914fe79995745fa2-35723772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29d1acf24b89484fe9c60be1a0a9750e76931edd' => 
    array (
      0 => '_smarty/_templates/index.tpl',
      1 => 1342101727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12745404914fe79995745fa2-35723772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe7999587b1d7_59734531',
  'variables' => 
  array (
    '(\'file\')' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe7999587b1d7_59734531')) {function content_4fe7999587b1d7_59734531($_smarty_tpl) {?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>TapePlay</title>

        <link rel="stylesheet" href="css/reset.css" type="text/css" />
        <link rel="stylesheet" href="css/landing.css" type="text/css" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/home.js"></script>
    </head>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars[('file')]->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="footer" class="landing">
        <div class="col">
            <ul class="footerList">
                <li class="header">The Basics</li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
company/getstarted/">Getting Started</a></li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
company/guidelines/">Community Guidelines</a></li>
            </ul>
        </div>
        <div class="col">
            <ul class="footerList">
                <li class="header">Business Info</li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
company/advertising/">Advertising</a></li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
company/contact/">Contact Us</a></li>
            </ul>
        </div>
        <div class="col">
            <ul class="footerList">
                <li class="header">For the Curious</li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
company/faq/">Frequently Asked Questions</a></li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
company/about/">About TapePlay</a></li>
            </ul>
        </div>
        <div class="col last">
            <ul class="footerList">
                <li class="header">Cool Stuff</li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
blog/">Blog</a></li>
                <li><a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
merchandise/">Merchandise</a></li>
            </ul>
        </div>
        <div class="bottom">
            <p>
                <a href="">Terms of Use</a> |
                <a href="">Privacy Policy</a>
            </p>
            <p>
                &copy; 2011 TapePlay, LLC. All Rights Reserved
            </p>
        </div>
    </div>
</body>
</html><?php }} ?>