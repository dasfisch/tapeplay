<?php /* Smarty version Smarty-3.1.10, created on 2012-07-11 14:06:18
         compiled from "_smarty/_templates/common/sidebar/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8993434924ffdceaa9105c4-22486503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da1af575110f98e5dfe2283b0e30a1f109d2c751' => 
    array (
      0 => '_smarty/_templates/common/sidebar/search.tpl',
      1 => 1342033565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8993434924ffdceaa9105c4-22486503',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_4ffdceaa912a38_30996287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ffdceaa912a38_30996287')) {function content_4ffdceaa912a38_30996287($_smarty_tpl) {?>
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
        <p class="value showing">Point Guard (1)</p>
        <input type="hidden" name="position" value="PG" />
    </div>
    <div class="option">
        <p class="x">x</p>
        <p class="value showing">Shooting Guard (2)</p>
        <input type="hidden" name="position" value="SG" />
    </div>
    <div class="option">
        <p class="x">x</p>
        <p class="value">Small Forward (3)</p>
        <input type="hidden" name="position" value="SF" />
    </div>
    <div class="option">
        <p class="x">&nbsp;</p>
        <p class="value">Power Forward (4)</p>
        <input type="hidden" name="position" value="PF" />
    </div>
    <div class="option last">
        <p class="x">x</p>
        <p class="value showing">Center (5)</p>
        <input type="hidden" name="position" value="C" />
    </div>
</div>
<div class="criterium">
    <div class="option">
        <p class="x">x</p>
        <p class="value">Height</p>
        <p class="values">
            <span class="minVal">4' 11"</span>
            <span class="maxVal">7' 11"</span>
        </p>
        <input type="hidden" value="55" name="min_height" />
        <input type="hidden" value="95" name="max_height" />
    </div>
</div><?php }} ?>