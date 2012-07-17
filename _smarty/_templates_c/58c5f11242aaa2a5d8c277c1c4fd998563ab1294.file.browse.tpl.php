<?php /* Smarty version Smarty-3.1.10, created on 2012-07-13 11:29:35
         compiled from "_smarty/_templates/videos/browse.tpl" */ ?>
<?php /*%%SmartyHeaderCode:544047714fff190fc8cf03-00029238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58c5f11242aaa2a5d8c277c1c4fd998563ab1294' => 
    array (
      0 => '_smarty/_templates/videos/browse.tpl',
      1 => 1342125062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '544047714fff190fc8cf03-00029238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fff190fcb6c69_91795121',
  'variables' => 
  array (
    'videos' => 0,
    'video' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fff190fcb6c69_91795121')) {function content_4fff190fcb6c69_91795121($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/private/etc/libraries/libs/plugins/modifier.date_format.php';
?><div id="main">
    <div id="top">
        <h2>Browse</h2>
        <p>Or <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
videos/search/">search</a> by criteria</p>
    </div>
    <div id="results">
        <?php if (isset($_smarty_tpl->tpl_vars['videos']->value)&&!empty($_smarty_tpl->tpl_vars['videos']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['video']->value->getPrivacy()==true){?>
                    <div class="result">
                        <a class="infoOpen">
                            <img src="<?php echo $_smarty_tpl->getConfigVariable('pandaBase');?>
<?php echo $_smarty_tpl->tpl_vars['video']->value->getPandaId();?>
<?php echo $_smarty_tpl->getConfigVariable('pandaImageExt');?>
" class="resultImage locked" />
                            <p class="name"><?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getLastName();?>
</p>
                            <p><?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getPosition();?>
, <?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getHeight();?>
"</p>
                            <p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['video']->value->getUploadDate(),"%B %Y");?>
</p>
                        </a>
                        <div class="infoBubble topCentered">
                            <div class="directionTopMiddle"></div>
                            <div class="topLeft"></div>
                            <div class="topRight"></div>
                            <div class="middle">
                                <p>
                                    <strong>We're sorry.</strong> Only account holders can view this video.
                                    <br /><br />
                                    Want to view this video?
                                    <br />
                                    <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
user/signup/">Join</a> or <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
user/login/">log in</a>.
                                </p>
                            </div>
                            <div class="bottomLeft"></div>
                            <div class="bottomRight"></div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="result">
                        <img src="<?php echo $_smarty_tpl->getConfigVariable('pandaBase');?>
<?php echo $_smarty_tpl->tpl_vars['video']->value->getPandaId();?>
<?php echo $_smarty_tpl->getConfigVariable('pandaImageExt');?>
" class="resultImage" />
                        <p class="name"><?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getLastName();?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getPosition();?>
, <?php echo $_smarty_tpl->tpl_vars['video']->value->getPlayer()->getHeight();?>
"</p>
                        <p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['video']->value->getUploadDate(),"%B %Y");?>
</p>
                    </div>
                <?php }?>
            <?php } ?>
        <?php }else{ ?>
            <h2 class="nothing">No results were found!</h2>
            <p class="nothing">Please try a different search!</p>
        <?php }?>
    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['videos']->value)&&!empty($_smarty_tpl->tpl_vars['videos']->value)){?>
        <?php if ($_smarty_tpl->tpl_vars['videos']->value[0]->count>15){?>
            <div id="showMore">
                <div class="bigButton black">
                    <div class="topLeft whiteBg"></div>
                    <div class="topRight whiteBg"></div>
                    <div class="bottomLeft whiteBg"></div>
                    <div class="bottomRight whiteBg"></div>
                    <div class="middle">
                        <!--<input type="submit" value="Show More Players" id="show" class="large black" />-->
                        <a href="<?php echo $_smarty_tpl->getConfigVariable('baseUrl');?>
videos/browse/?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" class="large black">Show More Players</a>
                    </div>
                </div>
            </div>
        <?php }?>
    <?php }?>
</div>
<div id="ad">
    ad
</div><?php }} ?>