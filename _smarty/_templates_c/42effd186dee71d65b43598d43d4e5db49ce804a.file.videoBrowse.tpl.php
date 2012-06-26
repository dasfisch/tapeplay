<?php /* Smarty version Smarty-3.1.10, created on 2012-06-25 13:23:57
         compiled from "_smarty/_templates/videos/videoBrowse.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10655083774fe75074a49e70-38294200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42effd186dee71d65b43598d43d4e5db49ce804a' => 
    array (
      0 => '_smarty/_templates/videos/videoBrowse.tpl',
      1 => 1340584345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10655083774fe75074a49e70-38294200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fe75074b7b127_71797304',
  'variables' => 
  array (
    'videoCount' => 0,
    'videos' => 0,
    'video' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe75074b7b127_71797304')) {function content_4fe75074b7b127_71797304($_smarty_tpl) {?><div id="landing">
    <!-- Begin two col -->
    <div id="leftCol">
        <div id="search">
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
        </div>
        <p class="resultTotal"><?php echo $_smarty_tpl->tpl_vars['videoCount']->value;?>
 results</p>
        <div id="results">
            <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['video']->value->getPrivacy()==true){?>
                    <div class="result opaque">
                        <div class="infoOpen">
                            <img src="/" class="resultImage locked" />
                            <div class="info">
                                <h2><?php echo $_smarty_tpl->tpl_vars['video']->value->getUser()->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['video']->value->getUser()->getLastName();?>
</h2>
                                <p class="position"></p>
                                <p class="title">Video Title</p>
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
                    <div class="result">
                        <img src="/" class="resultImage" />
                        <div class="info">
                            <h2><?php echo $_smarty_tpl->tpl_vars['video']->value->getUser()->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['video']->value->getUser()->getLastName();?>
</h2>
                            <p class="position">Chicago, IL</p>
                            <p class="title">Video Title</p>
                            <p class="date"><<?php ?>?php echo date('F, Y', strtotime('now')); ?<?php ?>></p>
                        </div>
                    </div>
                <?php }?>
            <?php } ?>
        </div>
    </div>
    <div id="rightCol">
        <h2>Your Search Criteria</h2>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value showing">High School</p>
            </div>
            <div class="option">
                <p class="x">x</p>
                <p class="value">College</p>
            </div>
            <div class="option last">
                <p class="x">&nbsp;</p>
                <p class="value">Professional</p>
            </div>
        </div>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value">Grade</p>
                <p class="slider"></p>
                <p class="values">
                    <span class="minVal">7th</span>
                    <span class="maxVal">Pro</span>
                </p>
            </div>
        </div>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value showing"> Point Guard (1)</p>
            </div>
            <div class="option">
                <p class="x">x</p>
                <p class="value showing">Shooting Guard (2)</p>
            </div>
            <div class="option">
                <p class="x">x</p>
                <p class="value">Small Forward (3)</p>
            </div>
            <div class="option">
                <p class="x">&nbsp;</p>
                <p class="value">Power Forward (4)</p>
            </div>
            <div class="option last">
                <p class="x">x</p>
                <p class="value showing">Center (5)</p>
            </div>
        </div>
        <div class="criterium">
            <div class="option">
                <p class="x">x</p>
                <p class="value">Height</p>
                <p class="slider"></p>
                <p class="values">
                    <span class="minVal">4' 11"</span>
                    <span class="maxVal">7' 11"</span>
                </p>
            </div>
        </div>
    </div>
    <div class="pagination">
        <div class="previous">&laquo;</div>
        <ul class="pages">
            <<?php ?>?php
                for($i = 1; $i < 6; $i++) {
                    echo '<li>'.$i.'</>';
                }
            ?<?php ?>>
            <li>...</li>
            <li class="infoOpen">19</li>
        </ul>
        <div class="infoBubble">
            <div class="topLeft black"></div>
            <div class="directionTopRight"></div>
            <div class="middle">
                <p>There is supposed to be a bunch of <a>text</a> in here!</p>
            </div>
            <div class="bottomLeft"></div>
            <div class="bottomRight"></div>
            <div class="direction"></div>
        </div>
        <div class="next">&raquo;</div>
    </div>
</div>
<div id="ad">
    <h1>Ad</h1>
</div><?php }} ?>