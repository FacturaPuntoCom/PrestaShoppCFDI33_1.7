<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:44:11
         compiled from "modules/blockfactura/views/templates/hook/blockfactura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9170572625a6f64730eaac5-68366664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8149932a356949eca43d25f0ea2494139e559cc' => 
    array (
      0 => 'modules/blockfactura/views/templates/hook/blockfactura.tpl',
      1 => 1516221606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9170572625a6f64730eaac5-68366664',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f64730f0291_07495912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f64730f0291_07495912')) {function content_5a6f64730f0291_07495912($_smarty_tpl) {?>

<section class="col-xs-12 col-sm-2">
	<h4><?php echo smartyTranslate(array('s'=>'Facturación','mod'=>'blockfactura'),$_smarty_tpl);?>
</h4>
	<div class="block_content toggle-footer">
		<ul class="bullet">
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockfactura','factura',array(),true),'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Manage my personal information','mod'=>'blockfactura'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Facturación','mod'=>'blockfactura'),$_smarty_tpl);?>
</a></li>
		</ul>
	</div>
</section>
<!-- /Block myaccount module -->
<?php }} ?>
