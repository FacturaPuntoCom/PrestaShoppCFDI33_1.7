<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 23:05:59
         compiled from "/home/felipe/vhosts/prestashop/pdf/invoice.shipping-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19359665365a6f698fe539e4-93459455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29dd38b44e328e6308f564808d7d1ff71d13b147' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/pdf/invoice.shipping-tab.tpl',
      1 => 1517248143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19359665365a6f698fe539e4-93459455',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'carrier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f698fe56a57_84512012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f698fe56a57_84512012')) {function content_5a6f698fe56a57_84512012($_smarty_tpl) {?>
<table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }} ?>
