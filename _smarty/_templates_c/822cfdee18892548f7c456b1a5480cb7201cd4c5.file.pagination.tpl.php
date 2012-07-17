<?php /* Smarty version Smarty-3.1.10, created on 2012-07-12 08:45:08
         compiled from "_smarty/_templates/common/pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2366363254ffdd3d9bbbeb9-76005212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '822cfdee18892548f7c456b1a5480cb7201cd4c5' => 
    array (
      0 => '_smarty/_templates/common/pagination.tpl',
      1 => 1342100344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2366363254ffdd3d9bbbeb9-76005212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ffdd3d9beb333_94779311',
  'variables' => 
  array (
    'currentUrl' => 0,
    'page' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ffdd3d9beb333_94779311')) {function content_4ffdd3d9beb333_94779311($_smarty_tpl) {?><div class="pagination">
    <div class="previous">
        <a href="<?php echo $_smarty_tpl->tpl_vars['currentUrl']->value;?>
?page=1">&laquo;</a>
    </div>
    <ul class="pages">
        <?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['currentUrl']->value;?>
?page=1">...</a></li>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['name'] = 'pageList';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pages']->value+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['max'] = (int)10;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'] = (int)$_smarty_tpl->tpl_vars['page']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pageList']['total']);
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['currentUrl']->value;?>
?page=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pageList']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['pageList']['index'];?>
</a></li>
        <?php endfor; endif; ?>
        <?php if ($_smarty_tpl->tpl_vars['page']->value<=($_smarty_tpl->tpl_vars['pages']->value-2)){?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['currentUrl']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
">...</a></li>
        <?php }?>
    </ul>
    <a href="<?php echo $_smarty_tpl->tpl_vars['currentUrl']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
">&raquo;</a>
</div><?php }} ?>