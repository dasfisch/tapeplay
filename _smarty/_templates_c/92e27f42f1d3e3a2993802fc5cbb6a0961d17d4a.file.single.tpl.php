<?php /* Smarty version Smarty-3.1.10, created on 2012-07-10 22:11:34
         compiled from "_smarty/_templates/videos/single.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1161857734fef5af54c5c91-04393271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92e27f42f1d3e3a2993802fc5cbb6a0961d17d4a' => 
    array (
      0 => '_smarty/_templates/videos/single.tpl',
      1 => 1341976050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1161857734fef5af54c5c91-04393271',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4fef5af55a2139_45982755',
  'variables' => 
  array (
    'player' => 0,
    'video' => 0,
    'videoPlayer' => 0,
    'hash' => 0,
    'i' => 0,
    'stat' => 0,
    'videos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fef5af55a2139_45982755')) {function content_4fef5af55a2139_45982755($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/private/etc/libraries/libs/plugins/modifier.date_format.php';
?><div id="landing">
    <div id="video">
        <div id="primaryInfo">
            <div id="left">
                <h2><?php echo $_smarty_tpl->tpl_vars['player']->value->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->getLastName();?>
</h2>
                <p class="title"><?php echo $_smarty_tpl->tpl_vars['video']->value->getTitle();?>
</p>
                <p class="date"><?php echo $_smarty_tpl->tpl_vars['video']->value->getRecordedMonth();?>
 / <?php echo $_smarty_tpl->tpl_vars['video']->value->getRecordedYear();?>
</p>
            </div>
            <div id="right">
                <p>Back to search results</p>
            </div>
        </div>
        <!--<div id="player"><?php echo $_smarty_tpl->tpl_vars['videoPlayer']->value;?>
</div>-->
        <div id="player"></div>
        <div id="videoInfo">
            <ul id="left">
                <li class="basic"><span class="bold"><?php echo $_smarty_tpl->tpl_vars['video']->value->getViews();?>
</span> views</li>
                <li class="basic"><span class="bold"><?php echo $_smarty_tpl->tpl_vars['video']->value->getSaves();?>
</span> saves</li>
                <li class="basic"><span class="italic">Uploaded <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['video']->value->getUploadDate(),"%B %d, %Y %I:%M %p");?>
</span></li>
            </ul>
            <ul id="right">
                <input type="hidden" id="hash" value="<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
" />
                <input type="hidden" id="user-id" value="2" />
                <input type="hidden" id="video-id" value="<?php echo $_smarty_tpl->tpl_vars['video']->value->getId();?>
" />
                <li class="link bubble">
                    <a class="infoOpen">Share</a>
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p>
                                Embed video (copy &amp; paste link):
                                <br/>
                                <a>http://tapeplay.com/asd8f69j</a>
                            </p>
                            <p>Email this video: <a>click here</a></p>
                            <p>
                                <span class="postVideo">Post video:</span> <span class="smallShare fbBlackSmall"></span> <span class="smallShare myBlackSmall"></span> <span class="smallShare twBlackSmall"></span> <span class="smallShare inBlackSmall"></span>
                            </p>
                        </div>
                        <div class="bottomLeft"></div>
                        <div class="bottomRight"></div>
                    </div>
                </li>
                <li class="link">
                    <a id="save">Save</a>
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p><span class="bold">Success!</span> This video has beens saved to your account.</p>
                        </div>
                        <div class="bottomLeft"></div>
                        <div class="bottomRight"></div>
                    </div>
                </li>
                <li class="link last">
                    <a id="report">Report Video</a>
                    <div class="infoBubble">
                        <div class="directionTopMiddle"></div>
                        <div class="topLeft"></div>
                        <div class="topRight"></div>
                        <div class="middle">
                            <p>There is supposed to be a bunch of <a>text</a> in here!</p>
                        </div>
                        <div class="bottomLeft black"></div>
                        <div class="bottomRight"></div>
                    </div>
                </li>
            </ul>
        </div>
        <div id="leftCol">
            <div id="info">
                <div id="top">
                    <div id="person">
                        <h3>#<?php echo $_smarty_tpl->tpl_vars['player']->value->getNumber();?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->getLastName();?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['player']->value->getPosition();?>
, <?php echo $_smarty_tpl->tpl_vars['player']->value->getHeight();?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['player']->value->getGradeLevel();?>
/<?php echo $_smarty_tpl->tpl_vars['player']->value->getAge();?>
, <?php echo $_smarty_tpl->tpl_vars['player']->value->getSchool()->getName();?>
</p>
                        <p>City, State</p>
                        <p>Coach's Name</p>
                    </div>
                    <div id="level">
                        <h4>Hs</h4>
                        <p>High school athlete</p>
                    </div>
                </div>
                <div id="bottom">
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['stat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['player']->value->getStats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stat']->key => $_smarty_tpl->tpl_vars['stat']->value){
$_smarty_tpl->tpl_vars['stat']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value%4==0){?>
                            <ul class="stats">
                        <?php }?>
                                <li><?php echo $_smarty_tpl->tpl_vars['stat']->value->getStatName();?>
: <?php echo $_smarty_tpl->tpl_vars['stat']->value->getStatValue();?>
</li>
                        <?php if ($_smarty_tpl->tpl_vars['i']->value%4==1){?>
                            </ul>
                        <?php }?>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
                </div>
            </div>
            <div id="moreVideos">
                <h2>More videos from [name]</h2>
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
                                    <h4><?php echo $_smarty_tpl->tpl_vars['video']->value->getTitle();?>
</h4>
                                    <p class="title"><?php echo $_smarty_tpl->tpl_vars['player']->value->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->getLastName();?>
</p>
                                    <p class="date"><?php echo $_smarty_tpl->tpl_vars['video']->value->getUploadedDate();?>
</p>
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
                                <img src="/" class="resultImage" />
                                <div class="info">
                                    <h4><?php echo $_smarty_tpl->tpl_vars['video']->value->getTitle();?>
</h4>
                                    <p class="title"><?php echo $_smarty_tpl->tpl_vars['player']->value->getFirstName();?>
 <?php echo $_smarty_tpl->tpl_vars['player']->value->getLastName();?>
</p>
                                    <p class="date"><?php echo $_smarty_tpl->tpl_vars['video']->value->getUploadDate();?>
</p>
                                </div>
                            </div>
                        </a>
                    <?php }?>
                <?php } ?>
            </div>
        </div>
        <div id="rightCol">
            <div id="sideAd">
                <p>Hello</p>
            </div>
            <div id="facebook"></div>
        </div>
    </div>
</div>
<div id="ad">
    <h1>Ad</h1>
</div><?php }} ?>