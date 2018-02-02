<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:41:46
         compiled from "/home/felipe/vhosts/prestashop/modules/blockfactura/views/templates/hook/info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8765292635a6f63e2a32630-89939841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef0d9bcebce0e670616ff565119054a6f73d46b5' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/modules/blockfactura/views/templates/hook/info.tpl',
      1 => 1516221606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8765292635a6f63e2a32630-89939841',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f63e2a352c7_04762690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f63e2a352c7_04762690')) {function content_5a6f63e2a352c7_04762690($_smarty_tpl) {?>

<div class="alert alert-info">
<p><strong><?php echo smartyTranslate(array('s'=>'This plugin allows you to generate invoices on the platform factura.com','mod'=>'blockfactura'),$_smarty_tpl);?>
</strong></p>
<p><?php echo smartyTranslate(array('s'=>'Do not forget to enter the correct data and fill out the required fields','mod'=>'blockfactura'),$_smarty_tpl);?>
</p>
</div>
<?php }} ?>
