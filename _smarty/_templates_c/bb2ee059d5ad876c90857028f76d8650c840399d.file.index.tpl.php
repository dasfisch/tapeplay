<?php /* Smarty version Smarty-3.1.10, created on 2012-07-16 21:06:04
         compiled from "_smarty/_templates/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6246152794ff5f899e14435-83260148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb2ee059d5ad876c90857028f76d8650c840399d' => 
    array (
      0 => '_smarty/_templates/index/index.tpl',
      1 => 1342490712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6246152794ff5f899e14435-83260148',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff5f899e59322_26528742',
  'variables' => 
  array (
    'sports' => 0,
    'single' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff5f899e59322_26528742')) {function content_4ff5f899e59322_26528742($_smarty_tpl) {?><body id="tapeplay" class="landing">
    <div id="main" class="landing">
        <div id="logo">
            <h1>TapePlay</h1>
            <h3>Video makes the world go round.</h3>
            <p>The world's evolved. So has recruiting.</p>
        </div>
        <form name="sport" method="post" action="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
">
            <div id="sportSelect">
                <div id="pickSport">Pick Sport:</div>
                <div id="dropper">
                    <div id="values">
                        <p id="value">
                            <span class="sportName"><?php echo $_smarty_tpl->tpl_vars['sports']->value[0]->getSportName();?>
</span>
                            <input type="hidden" name="chosenSport" id="chosenSport" value="<?php echo $_smarty_tpl->tpl_vars['sports']->value[0]->getId();?>
" />
                        </p>
                        <ul id="potentials">
                            <?php  $_smarty_tpl->tpl_vars['single'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['single']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['single']->key => $_smarty_tpl->tpl_vars['single']->value){
$_smarty_tpl->tpl_vars['single']->_loop = true;
?>
                                <li>
                                    <span class="sportName"><?php echo $_smarty_tpl->tpl_vars['single']->value->getSportName();?>
</span>
                                    <input type="hidden" class="sportId" value="<?php echo $_smarty_tpl->tpl_vars['single']->value->getId();?>
" />
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div id="arrow"></div>
                    <div id="links">
                        <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
user/login/">Log In</a> |
                        <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
user/register/">Get Started</a> |
                        <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
/company/policy/">Privacy Policy</a>
                    </div>
                </div>
                <input type="submit" value="Continue" id="continue" />
            </div>
        </form>
    </div>
<?php }} ?>