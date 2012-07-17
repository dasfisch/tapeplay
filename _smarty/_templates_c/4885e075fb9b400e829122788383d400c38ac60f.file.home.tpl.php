<?php /* Smarty version Smarty-3.1.10, created on 2012-07-16 19:09:47
         compiled from "_smarty/_templates/index/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17800954574ffef714e5ecc7-00084861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4885e075fb9b400e829122788383d400c38ac60f' => 
    array (
      0 => '_smarty/_templates/index/home.tpl',
      1 => 1342483784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17800954574ffef714e5ecc7-00084861',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ffef7150d9931_53546361',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ffef7150d9931_53546361')) {function content_4ffef7150d9931_53546361($_smarty_tpl) {?><div id="landing">
    <div id="centerAd">Hello Ad</div>
    <h1>Video makes the world go round.</h1>
    <h3>The world's evolved. So has recruiting.</h3>
    <div id="searchForm">
        <form id="search" action="/search" method="post">
            <div class="inputField">
                <div class="left"></div>
                <div class="middle">
                    <input type="text" class="standard" id="searchVal" name="searchVal" />
                </div>
                <div class="right"></div>
            </div>
            <div class="bigButton black">
                <div class="topLeft whiteBg"></div>
                <div class="topRight whiteBg"></div>
                <div class="bottomLeft whiteBg"></div>
                <div class="bottomRight whiteBg"></div>
                <div class="middle">
                    <input type="submit" value="Search" id="sendSearch" class="large black" />
                </div>
            </div>

            <input type="hidden" name="level" id="level" value="" />
            <input type="hidden" name="grade" id="grade" value="" />
            <input type="hidden" name="position" id="position" value="" />
            <input type="hidden" name="height" id="height" value="" />

            <div id="advance">
                <p class="italic">Add more search criteria</p>
                <div id="options">
                    <div class="option">
                        <p class="header">Level</p>
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
                            <div class="label">College</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Professional</div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Grade</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftMedium"></div>
                                <div class="middleMedium middle">
                                    <p class="value">Select</p>
                                    <input type="hidden" name="grade" class="dropVal" value="" />
                                </div>
                                <div class="rightMedium"></div>
                                <ul class="potentials">
                                    <<?php ?>?php for($i = 6; $i < 20; $i++): ?<?php ?>>
                                        <li><<?php ?>?php echo $i; ?<?php ?>></li>
                                    <<?php ?>?php endfor; ?<?php ?>>
                                </ul>
                            </div>
                            <div class="arrowSmall"></div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Position</p>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Point Guard</div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Height</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftMedium"></div>
                                <div class="middleMedium middle">
                                    <p class="value">Select</p>
                                    <input type="hidden" name="height" class="dropVal" value="" />
                                </div>
                                <div class="rightMedium"></div>
                                <ul class="potentials">
                                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)48;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=96) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                        <li><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
</li>
                                    <?php endfor; endif; ?>
                                </ul>
                            </div>
                            <div class="arrowSmall"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="ad">
    <h1>Ad</h1>
</div><?php }} ?>