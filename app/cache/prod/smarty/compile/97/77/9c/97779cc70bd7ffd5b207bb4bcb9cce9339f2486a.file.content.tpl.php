<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:27:28
         compiled from "/home/felipe/vhosts/prestashop/admin247gtw1r9/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6992850195a6f6088d88952-98286085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97779cc70bd7ffd5b207bb4bcb9cce9339f2486a' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/admin247gtw1r9/themes/default/template/content.tpl',
      1 => 1517248141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6992850195a6f6088d88952-98286085',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f6088d8b7d6_98535154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f6088d8b7d6_98535154')) {function content_5a6f6088d8b7d6_98535154($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
