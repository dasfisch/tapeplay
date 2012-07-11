<?php /* Smarty version Smarty-3.1.10, created on 2012-07-10 22:11:35
         compiled from "_smarty/_templates/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6246152794ff5f899e14435-83260148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb2ee059d5ad876c90857028f76d8650c840399d' => 
    array (
      0 => '_smarty/_templates/index/index.tpl',
      1 => 1341976050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6246152794ff5f899e14435-83260148',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ff5f899e59322_26528742',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff5f899e59322_26528742')) {function content_4ff5f899e59322_26528742($_smarty_tpl) {?><div id="landing">
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
                                <div class="leftSmall"></div>
                                <div class="middleSmall middle">
                                    <p class="value">Select</p>
                                    <input type="hidden" name="grade" class="dropVal" value="" />
                                </div>
                                <div class="rightSmall"></div>
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
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Shooting Guard</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Small Forward</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Power Forward</div>
                        </div>
                        <div class="checkbox">
                            <div class="box">
                                <div class="checkMark"></div>
                            </div>
                            <div class="label">Center</div>
                        </div>
                    </div>
                    <div class="option">
                        <p class="header">Height</p>
                        <div class="sportSelect">
                            <div class="dropper">
                                <div class="leftSmall"></div>
                                <div class="middleSmall middle">
                                    <p class="value">Select</p>
                                    <input type="hidden" name="height" class="dropVal" value="" />
                                </div>
                                <div class="rightSmall"></div>
                                <ul class="potentials">
                                    <<?php ?>?php for($i = 48; $i < 96; $i++): ?<?php ?>>
                                        <li><<?php ?>?php echo $i; ?<?php ?>>"</li>
                                    <<?php ?>?php endfor; ?<?php ?>>
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