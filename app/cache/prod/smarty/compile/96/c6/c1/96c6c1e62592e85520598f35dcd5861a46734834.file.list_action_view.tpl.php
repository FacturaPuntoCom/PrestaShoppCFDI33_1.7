<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 23:02:41
         compiled from "/home/felipe/vhosts/prestashop/admin247gtw1r9/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19487910495a6f68c9177a67-59601040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96c6c1e62592e85520598f35dcd5861a46734834' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/admin247gtw1r9/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1517248142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19487910495a6f68c9177a67-59601040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f68c91808f8_38968733',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f68c91808f8_38968733')) {function content_5a6f68c91808f8_38968733($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" >
	<i class="icon-search-plus"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>

</a>
<?php }} ?>
