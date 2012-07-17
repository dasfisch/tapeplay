<?php /* Smarty version Smarty-3.1.10, created on 2012-07-12 15:08:32
         compiled from "_smarty/_templates/videos/videoSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8723307034fff16f8eb7e46-49602106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b45e0755fe399c64f62cd007f15ec889d29db8' => 
    array (
      0 => '_smarty/_templates/videos/videoSearch.tpl',
      1 => 1342118763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8723307034fff16f8eb7e46-49602106',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fff16f9295614_11578685',
  'variables' => 
  array (
    'videoCount' => 0,
    'videos' => 0,
    'video' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fff16f9295614_11578685')) {function content_4fff16f9295614_11578685($_smarty_tpl) {?><div id="landing">
    <!-- Begin two col -->
    <div id="leftCol">
        <div id="search">
            <form name="search" method="post" action="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
videos/search/">
                <div class="inputField">
                    <div class="left"></div>
                    <div class="middle">
                        <input type="text" class="standard" id="searchVal" name="searchVal" />
                    </div>
                    <div class="right"></div>
                </div>
                <div class="bigButton black">
                    <div class="topRight whiteBg"></div>
                    <div class="bottomRight whiteBg"></div>
                    <div class="middle">
                        <input type="submit" value="Search" id="sendSearch" class="large black" />
                    </div>
                </div>
            </form>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['videoCount']->value>0){?>
            <p class="resultTotal"><?php echo $_smarty_tpl->tpl_vars['videoCount']->value;?>
 results</p>
        <?php }?>
        <div id="results">
            <?php if ($_smarty_tpl->tpl_vars['videoCount']->value>0){?>
                <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['video']->value->getPrivacy()==true){?>
                        <div class="result opaque">
                            <div class="infoOpen">
                                <img src="<?php echo $_smarty_tpl->getConfigVariable('pandaBase');?>
<?php echo $_smarty_tpl->tpl_vars['video']->value->getPandaId();?>
<?php echo $_smarty_tpl->getConfigVariable('pandaImageExt');?>
" class="resultImage locked" />
                                <div class="info">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getLastName();?>
</h2>
                                    <p class="position"></p>
                                    <p class="title"><?php echo $_smarty_tpl->tpl_vars['video']->value->getTitle();?>
</p>
                                    <p class="date"><<?php ?>?php echo date('F, Y', strtotime('now')); ?<?php ?>></p>
                                </div>
                            </div>
                            <div class="infoBubble">
                                <div class="topLeft"></div>
                                <div class="topRight"></div>
                                <div class="middle">
                                    <p>
                                        <strong>We're sorry.</strong> Only account holders can view this video.
                                        <br /><br />
                                        Want to view this video?
                                        <br />
                                        <a>Join</a> or <a>log in</a>.
                                    </p>
                                </div>
                                <div class="directionBottomRight"></div>
                                <div class="bottomRight"></div>
                                <div class="direction"></div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
videos/view/<?php echo $_smarty_tpl->tpl_vars['video']->value->getId();?>
/">
                            <div class="result">
                                <img src="<?php echo $_smarty_tpl->getConfigVariable('pandaBase');?>
<?php echo $_smarty_tpl->tpl_vars['video']->value->getPandaId();?>
<?php echo $_smarty_tpl->getConfigVariable('pandaImageExt');?>
" class="resultImage" />
                                <div class="info">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getLastName();?>
</h2>
                                    <p class="position">Chicago, IL</p>
                                    <p class="title"><?php echo $_smarty_tpl->tpl_vars['video']->value->getTitle();?>
</p>
                                    <p class="date"><<?php ?>?php echo date('F, Y', strtotime('now')); ?<?php ?>></p>
                                </div>
                            </div>
                        </a>
                    <?php }?>
                <?php } ?>
            <?php }else{ ?>
                <h2 class="nothing">No results were found!</h2>
                <p class="nothing">Please try a different search!</p>
            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['videoCount']->value>0){?>
            <?php echo $_smarty_tpl->getSubTemplate ('common/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php }?>
    </div>
    <div id="rightCol" class="helpCenter">
        <?php echo $_smarty_tpl->getSubTemplate ('common/sidebar/share.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>
<div id="ad">
    <h1>Ad</h1>
</div><?php }} ?>