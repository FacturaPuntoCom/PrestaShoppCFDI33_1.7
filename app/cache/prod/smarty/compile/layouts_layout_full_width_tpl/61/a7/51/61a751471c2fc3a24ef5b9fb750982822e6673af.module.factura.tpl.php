<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "module:blockfactura/views/templates/front/factura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19158158875a6f67d7192d62-09815640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61a751471c2fc3a24ef5b9fb750982822e6673af' => 
    array (
      0 => 'module:blockfactura/views/templates/front/factura.tpl',
      1 => 1516221606,
      2 => 'module',
    ),
    '6510a5b43c170bbeceb675a74da06b449834cbe7' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/page.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '15e99a0e9c9a8d07ed6af446ab757930e7799e20' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/layouts/layout-full-width.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '4536a0cdabd445f7352bdd29728f2901f4ed86af' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/layouts/layout-both-columns.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '4da0cf824b66d12a7489767572235b23b8865f04' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/stylesheets.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '5c107f12a4abd753a734f23fdc42e01a1a9118df' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/javascript.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    'd50e40e48b44261990624702fe9c69bc5cc84713' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/head.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    'ed964e918ad3eb5a2b098f82482fc74fd8737d90' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/catalog/_partials/product-activation.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    'deb83d3b08c894b4685615033e30f7758b2612ce' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/header.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '65b292b95667cf27ab91609d30293b448bdea405' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/notifications.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '8d1c45e80816b1ccff8ff5ed400efd3ee84c3766' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/breadcrumb.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
    '7ec8db7f428dc171fee32780c744a0ee75482a48' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/footer.tpl',
      1 => 1517248144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19158158875a6f67d7192d62-09815640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout' => 0,
    'language' => 0,
    'page' => 0,
    'javascript' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f67d72afd08_73928009',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f67d72afd08_73928009')) {function content_5a6f67d72afd08_73928009($_smarty_tpl) {?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
    
      <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71a9a03_59698895($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/head.tpl" */?>
    
  </head>

  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames($_smarty_tpl->tpl_vars['page']->value['body_classes']), ENT_QUOTES, 'UTF-8');?>
">

    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAfterBodyOpeningTag'),$_smarty_tpl);?>

    

    <main>
      
        <?php /*  Call merged included template "catalog/_partials/product-activation.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71d3b12_88812555($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
      

      <header id="header">
        
          <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71d8121_98674943($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/header.tpl" */?>
        
      </header>

      
        <?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71dedc8_87818960($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
      

      <section id="wrapper">
        <div class="container">
          
            <?php /*  Call merged included template "_partials/breadcrumb.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71ecf74_64407453($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/breadcrumb.tpl" */?>
          

          

          
  <div id="content-wrapper">
    

  <section id="main">

    
      
    

    
      <section id="content" class="page-content card card-block">
        
        
<input type="text" name="" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_dir']->value, ENT_QUOTES, 'UTF-8');?>
" class="form-control" hidden="hidden" id="base_uri_ps">
<input type="text" name="" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ps_version']->value, ENT_QUOTES, 'UTF-8');?>
" class="form-control" hidden="hidden" id="ps_version">
<input type="text" name="" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['base_dir_ssl']->value, ENT_QUOTES, 'UTF-8');?>
" class="form-control" hidden="hidden" id="base_uri_ssl">
<input type="text" name="" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ssl_active']->value, ENT_QUOTES, 'UTF-8');?>
" class="form-control" hidden="hidden" id="ssl_enabled">
<div class="alert alert-danger" id="alerts" hidden="true" role="alert">
	<p id="error"></p>
</div>
<!-- cambio para la demo -->
<div class="alert alert-success" id="activar" hidden="true">
	<a id="link-activar" style="color: white;">Libera el pedido dando click en la <strong>✓</strong> del mensaje (Opción sólo para Tienda Demo)</a>
</div>
<div class="container" id="block-one">
	<div class="bloque-login">
		<form id="form-one" method="post">
			<legend id="legend"><?php echo smartyTranslate(array('s'=>'Billing','mod'=>'blockfactura'),$_smarty_tpl);?>

			<h5><?php echo smartyTranslate(array('s'=>'Enter your RFC, order number and email','mod'=>'blockfactura'),$_smarty_tpl);?>
</h5>
			<?php if (isset($_smarty_tpl->tpl_vars['encabezado']->value)) {?>
			<hr style="height: 2px; width:30%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
			<h5><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['encabezado']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5>
			<?php } else { ?>
			<hr style="height: 2px; width:30%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
			<h5>Aquí puedes generar las facturas de tus compras realizadas en la tienda.
			Antes de generar la factura, por favor confirme que los datos estén correctamente.
			Ya que una vez emitida o generada la factura no podrá realizar cambios a la misma. Agradecemos su preferencia.
			</h5>
			<?php }?>
			</legend>
			<fieldset>
				<br>
				<input id="rfc-form-one" type="text" class="login-input animacion-input" placeholder="<?php echo smartyTranslate(array('s'=>'RFC','mod'=>'blockfactura'),$_smarty_tpl);?>
" name="rfc" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
				<input id="order-form-one" type="text" class="login-input animacion-input" placeholder="<?php echo smartyTranslate(array('s'=>'Order number','mod'=>'blockfactura'),$_smarty_tpl);?>
" name="order" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
				<input type="email" class="login-input animacion-input" name="email" id="email" placeholder="<?php echo smartyTranslate(array('s'=>'Email','mod'=>'blockfactura'),$_smarty_tpl);?>
" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
				<button type="submit" class="boton-login animation-boton" id="btn-one" style="background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Send','mod'=>'blockfactura'),$_smarty_tpl);?>
</button>
			</fieldset>
		</form>
	</div>
</div>

<div class="container" id="block-two"  hidden="true">
	<div class="bloque-cliente">
		<form id="form-two" method="post">
			<legend id="legend-two"><?php echo smartyTranslate(array('s'=>'Check customer data','mod'=>'blockfactura'),$_smarty_tpl);?>

			<h6 id="existente"><br><?php echo smartyTranslate(array('s'=>'The customer exist','mod'=>'blockfactura'),$_smarty_tpl);?>
</h6></legend>
			<fieldset>
				<br>

				<input type="hidden" id="action-api" name="action-api">
				<input type="hidden" id="UID" name="UID">

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input id="contact-nombre" type="text" class="client-input animacion-input" value="" name="contact-nombre" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Names','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input id="contact-apellidos" type="text" class="client-input animacion-input" name="contact-apellidos" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Surnames','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="contact-email" type="text" class="client-input animacion-input" name="contact-email" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Email','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="contact-telefono" type="text" class="client-input animacion-input" name="contact-telefono" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Phone','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-razonsocial" type="text" class="client-input animacion-input" name="data-razoncial" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Business name','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-rfc" type="text" class="client-input animacion-input" name="data-rfc" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'RFC','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input id="data-calle" type="text" class="client-input animacion-input" name="data-calle" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Street','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-exterior" type="text" class="client-input animacion-input" name="data-exterior" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Outside number','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-interior" type="text" class="client-input animacion-input" name="data-interior" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Inside number','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-colonia" type="text" class="client-input animacion-input" name="data-colonia" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Colony','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-cp" type="text" class="client-input animacion-input" name="data-cp" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'Postal Code','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-ciudad" type="text" class="client-input animacion-input" name="data-ciudad" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'City','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-delegacion" type="text" class="client-input animacion-input" name="data-delegacion" disabled="true" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
							<label for="rfc"><?php echo smartyTranslate(array('s'=>'State','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
						</div>
					</div>
				</div>

				<button type="submit" class="boton-login animation-boton" id="btn-two" style="background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Send','mod'=>'blockfactura'),$_smarty_tpl);?>
</button>
				<br>
			</fieldset>
		</form>
	</div>

</div>

<!--Form tree data preview-->
<div class="container" id="block-tree" hidden="true">
	<br>
	<div class="bloque-preview">
		<legend id="legend-tree">
			<?php echo smartyTranslate(array('s'=>'Verify data','mod'=>'blockfactura'),$_smarty_tpl);?>

			<hr style="height: 2px; width:100%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
; opacity: 0.6;">
		</legend>

		<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
				<legend id="legend-tree" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
					<?php echo smartyTranslate(array('s'=>'Emisor','mod'=>'blockfactura'),$_smarty_tpl);?>

					<hr style="height: 2px; width:100%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
; opacity: 0.6;">
				</legend>
				<h5 id="receptor-nombre"></h5>
				<h5 id="receptor-rfc"></h5>
				<h5 id="receptor-calle"></h5>
				<h5 id="receptor-colonia"></h5>
				<h5 id="receptor-ciudad"></h5>
				<h5 id="receptor-email"></h5>
			</div>
			<div class="col-md-6 col-lg-6 col-xs-12">
				<legend id="legend-tree" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
					<?php echo smartyTranslate(array('s'=>'Receptor','mod'=>'blockfactura'),$_smarty_tpl);?>

					<hr style="height: 2px; width:100%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
; opacity: 0.6;">
				</legend>
				<h5 id="emisor-nombre"></h5>
				<h5 id="emisor-rfc"></h5>
				<h5 id="emisor-calle"></h5>
				<h5 id="emisor-colonia"></h5>
				<h5 id="emisor-ciudad"></h5>
				<h5 id="emisor-email"></h5>
				<h5 id="emisor-telefono"></h5>
			</div>
		</div>
		<div class="row">
			<br>
			<br>
			<div class="col-md-12 col-lg-12 col-xs-12">
			<legend id="legend-tree" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
; ">
				<?php echo smartyTranslate(array('s'=>'Order','mod'=>'blockfactura'),$_smarty_tpl);?>

				<hr style="height: 2px; width:100%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
; opacity: 0.6;">
			</legend>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr class="active">
							<th><?php echo smartyTranslate(array('s'=>'Name','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
							<th><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
								<th><?php echo smartyTranslate(array('s'=>'Unitary Price','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
							<th><?php echo smartyTranslate(array('s'=>'Total','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
						</tr>
					</thead>
					<tbody id="datails-body">

					</tbody>
				</table>
			</div>
			</div>
		</div>
		<div class="row">
		<div class="col-md-12 col-lg-12 col-xs-12">
			<legend id="legend-tree" style="border-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;">
				<?php echo smartyTranslate(array('s'=>'Details','mod'=>'blockfactura'),$_smarty_tpl);?>

				<hr style="height: 2px; width:100%; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
; opacity: 0.6;">
			</legend>
			<div class="col-md-6 col-lg-6 col-xs-12">
				<div class="input-group">
						<label for="select-payment"  style="font-size: 18px;">* <?php echo smartyTranslate(array('s'=>'Payment method','mod'=>'blockfactura'),$_smarty_tpl);?>
  &nbsp;</label>
								<select id="select-payment" class="input-cap f-input f-select">
											<option value="0"><?php echo smartyTranslate(array('s'=>'Select an option','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="01"><?php echo smartyTranslate(array('s'=>'Cash','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="02"><?php echo smartyTranslate(array('s'=>'Paycheck','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="03"><?php echo smartyTranslate(array('s'=>'Electronic funds transfer','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="04"><?php echo smartyTranslate(array('s'=>'Credit card','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="05"><?php echo smartyTranslate(array('s'=>'Electronic wallet','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="06"><?php echo smartyTranslate(array('s'=>'Electronic cash','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="08"><?php echo smartyTranslate(array('s'=>'Food stamps','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="12"><?php echo smartyTranslate(array('s'=>'Payment in','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="13"><?php echo smartyTranslate(array('s'=>'Payment by subrogation','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="14"><?php echo smartyTranslate(array('s'=>'Payment by consignment','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="15"><?php echo smartyTranslate(array('s'=>'Condonation','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="17"><?php echo smartyTranslate(array('s'=>'Compensation','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="23"><?php echo smartyTranslate(array('s'=>'Novation','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="24"><?php echo smartyTranslate(array('s'=>'Confution','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="25"><?php echo smartyTranslate(array('s'=>'Debt remittances','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="26"><?php echo smartyTranslate(array('s'=>'Prescription or expiration','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="27"><?php echo smartyTranslate(array('s'=>'To the satisfaction of the creditor','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="28"><?php echo smartyTranslate(array('s'=>'Debit card','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="29"><?php echo smartyTranslate(array('s'=>'Service card','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
											<option value="99"><?php echo smartyTranslate(array('s'=>'No data','mod'=>'blockfactura'),$_smarty_tpl);?>
</option>
								</select>
				</div>
				<br>
				<br>
					<div id="num-cta-box" hidden="true">
								<label for="f-num-cta" style="width: 285px; font-size: 14px"><?php echo smartyTranslate(array('s'=>'Last 4 digits of your account or card','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
								<input type="text"  id="f-num-cta" class="form-control" name="f-num-cta" placeholder="####" size="5" maxlength="4" />
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-xs-12">
				<table style="float: right; margin-right: 5em;">
						<tr>
							<td><?php echo smartyTranslate(array('s'=>'Subtotal:','mod'=>'blockfactura'),$_smarty_tpl);?>
</td>
							<td><span id="invoice-subtotal"></span></td>
						</tr>
						<!-- <tr id="td-discount" hidden="true">
							<td>Descuento:</td>
							<td><span id="invoice-discount"></span></td>
						</tr> -->
						<tr>
							<td><?php echo smartyTranslate(array('s'=>'VAT:','mod'=>'blockfactura'),$_smarty_tpl);?>
</td>
							<td><span id="invoice-iva"></span></td>
						</tr>
						<tr>
							<td><?php echo smartyTranslate(array('s'=>'Total:','mod'=>'blockfactura'),$_smarty_tpl);?>
</td>
							<td><span id="invoice-total"></span></td>
						</tr>
				</table>
			</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				 	<button style="float: right; margin-left: 20px; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;" id="btn-invoice" type="button" name="button" class="btn btn-info"><?php echo smartyTranslate(array('s'=>'CREATE INVOICE','mod'=>'blockfactura'),$_smarty_tpl);?>
</button>
					<button style="max-width: 200px; float: right; width: 158px;" id="btn-back" type="button" name="button" class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Back','mod'=>'blockfactura'),$_smarty_tpl);?>
</button>
			</div>
		</div>
		</div>
</div>

<div class="container" id="block-four" hidden="true">
			<div class="bloque-downloads">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-xs-12">
					<legend id="legend"><?php echo smartyTranslate(array('s'=>'Download invoice','mod'=>'blockfactura'),$_smarty_tpl);?>

					<h6 id="aviso-factura"><?php echo smartyTranslate(array('s'=>'The invoice was successful','mod'=>'blockfactura'),$_smarty_tpl);?>
</h6>
					</legend>
						<br>
						<a href="#" class="boton-login animation-boton" id="btn-pdf" style="background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;"><?php echo smartyTranslate(array('s'=>'PDF','mod'=>'blockfactura'),$_smarty_tpl);?>
</a>
						<a href="#" class="boton-login animation-boton" id="btn-xml" style="background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;"><?php echo smartyTranslate(array('s'=>'XML','mod'=>'blockfactura'),$_smarty_tpl);?>
</a>
						<hr style="height: 2px; width:60%; background-color: #999; margin-top: 2em;">
						<a  href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockfactura','factura',array(),true),'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="boton-login animation-boton" style="margin-top: 1em; background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;"><?php echo smartyTranslate(array('s'=>'Exit','mod'=>'blockfactura'),$_smarty_tpl);?>
</a>
				</div>
			</div>
			</div>
</div>

<div id="bar-progress" class="container" hidden="true">
	<div class="bloque-progress">
		<label for=""><?php echo smartyTranslate(array('s'=>'Load...','mod'=>'blockfactura'),$_smarty_tpl);?>
</label>
		    <div id="progressBar"><div style="background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['colors']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;"></div></div>
	</div>
</div>

      </section>
    

    
      <footer class="page-footer">
        
          <!-- Footer content -->
        
      </footer>
    

  </section>


  </div>


          
        </div>
      </section>

      <footer id="footer">
        
          <?php /*  Call merged included template "_partials/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d72a63a6_40908304($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer.tpl" */?>
        
      </footer>

    </main>

    
      <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71c3386_42200651($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    

    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    
  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71a9a03_59698895')) {function content_5a6f67d71a9a03_59698895($_smarty_tpl) {?>

  <meta charset="utf-8">


  <meta http-equiv="x-ua-compatible" content="ie=edge">



  <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
</title>
  <meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
">
  <meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['keywords'], ENT_QUOTES, 'UTF-8');?>
">
  <?php if ($_smarty_tpl->tpl_vars['page']->value['meta']['robots']!=='index') {?>
    <meta name="robots" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['robots'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['page']->value['canonical']) {?>
    <link rel="canonical" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['canonical'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }?>



  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon_update_time'], ENT_QUOTES, 'UTF-8');?>
">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon_update_time'], ENT_QUOTES, 'UTF-8');?>
">



  <?php /*  Call merged included template "_partials/stylesheets.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71b8ce1_33673873($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '19158158875a6f67d7192d62-09815640');
content_5a6f67d71c3386_42200651($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>



  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>




<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71b8ce1_33673873')) {function content_5a6f67d71b8ce1_33673873($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value['external']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['media'], ENT_QUOTES, 'UTF-8');?>
">
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value['inline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
  <style>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['content'], ENT_QUOTES, 'UTF-8');?>

  </style>
<?php } ?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71c3386_42200651')) {function content_5a6f67d71c3386_42200651($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript']->value['external']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
  <script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['attribute'], ENT_QUOTES, 'UTF-8');?>
></script>
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript']->value['inline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
  <script type="text/javascript">
    <?php echo $_smarty_tpl->tpl_vars['js']->value['content'];?>

  </script>
<?php } ?>

<?php if (isset($_smarty_tpl->tpl_vars['vars']->value)&&count($_smarty_tpl->tpl_vars['vars']->value)) {?>
  <script type="text/javascript">
    <?php  $_smarty_tpl->tpl_vars['var_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var_value']->_loop = false;
 $_smarty_tpl->tpl_vars['var_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var_value']->key => $_smarty_tpl->tpl_vars['var_value']->value) {
$_smarty_tpl->tpl_vars['var_value']->_loop = true;
 $_smarty_tpl->tpl_vars['var_name']->value = $_smarty_tpl->tpl_vars['var_value']->key;
?>
    var <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
 = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['var_value']->value);?>
;
    <?php } ?>
  </script>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71d3b12_88812555')) {function content_5a6f67d71d3b12_88812555($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page']->value['admin_notifications']) {?>
  <div class="alert alert-warning row" role="alert">
    <div class="container">
      <div class="row">
        <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['admin_notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
          <div class="col-sm-12">
            <i class="material-icons pull-xs-left">&#xE001;</i>
            <p class="alert-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value['message'], ENT_QUOTES, 'UTF-8');?>
</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71d8121_98674943')) {function content_5a6f67d71d8121_98674943($_smarty_tpl) {?>

  <div class="header-banner">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBanner'),$_smarty_tpl);?>

  </div>



  <nav class="header-nav">
    <div class="container">
        <div class="row">
          <div class="hidden-sm-down">
            <div class="col-md-4 col-xs-12">
              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNav1'),$_smarty_tpl);?>

            </div>
            <div class="col-md-8 right-nav">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNav2'),$_smarty_tpl);?>

            </div>
          </div>
          <div class="hidden-md-up text-xs-center mobile">
            <div class="pull-xs-left" id="menu-icon">
              <i class="material-icons d-inline">&#xE5D2;</i>
            </div>
            <div class="pull-xs-right" id="_mobile_cart"></div>
            <div class="pull-xs-right" id="_mobile_user_info"></div>
            <div class="top-logo" id="_mobile_logo"></div>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
  </nav>



  <div class="header-top">
    <div class="container">
       <div class="row">
        <div class="col-md-2 hidden-sm-down" id="_desktop_logo">
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
">
            <img class="logo img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
          </a>
        </div>
        <div class="col-md-10 col-sm-12 position-static">
          <div class="row">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayTop'),$_smarty_tpl);?>

            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
        <div class="js-top-menu-bottom">
          <div id="_mobile_currency_selector"></div>
          <div id="_mobile_language_selector"></div>
          <div id="_mobile_contact_link"></div>
        </div>
      </div>
    </div>
  </div>
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNavFullWidth'),$_smarty_tpl);?>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71dedc8_87818960')) {function content_5a6f67d71dedc8_87818960($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['notifications']->value)) {?>
<aside id="notifications">
  <div class="container">
    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['error']) {?>
      
        <article class="alert alert-danger" role="alert" data-alert="danger">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
            <?php } ?>
          </ul>
        </article>
      
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['warning']) {?>
      
        <article class="alert alert-warning" role="alert" data-alert="warning">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['warning']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
            <?php } ?>
          </ul>
        </article>
      
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['success']) {?>
      
        <article class="alert alert-success" role="alert" data-alert="success">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
            <?php } ?>
          </ul>
        </article>
      
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['info']) {?>
      
        <article class="alert alert-info" role="alert" data-alert="info">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value, ENT_QUOTES, 'UTF-8');?>
</li>
            <?php } ?>
          </ul>
        </article>
      
    <?php }?>
  </div>
</aside>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/breadcrumb.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d71ecf74_64407453')) {function content_5a6f67d71ecf74_64407453($_smarty_tpl) {?>
<nav data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="breadcrumb hidden-sm-down">
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php  $_smarty_tpl->tpl_vars['path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['path']->key => $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['path']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']++;
?>
      
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
          <a itemprop="item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
            <span itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
          </a>
          <meta itemprop="position" content="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumb']['iteration'], ENT_QUOTES, 'UTF-8');?>
">
        </li>
      
    <?php } ?>
  </ol>
</nav>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:58:39
         compiled from "/home/felipe/vhosts/prestashop/themes/classic/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5a6f67d72a63a6_40908304')) {function content_5a6f67d72a63a6_40908304($_smarty_tpl) {?>
<div class="container">
  <div class="row">
    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooterBefore'),$_smarty_tpl);?>

    
  </div>
</div>
<div class="footer-container">
  <div class="container">
    <div class="row">
      
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooter'),$_smarty_tpl);?>

      
    </div>
    <div class="row">
      
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooterAfter'),$_smarty_tpl);?>

      
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>
          
            <a class="_blank" href="http://www.prestashop.com" target="_blank">
              <?php echo smartyTranslate(array('s'=>'%copyright% %year% - Ecommerce software by %prestashop%','sprintf'=>array('%prestashop%'=>'PrestaShop™','%year%'=>date('Y'),'%copyright%'=>'©'),'d'=>'Shop.Theme'),$_smarty_tpl);?>

            </a>
          
        </p>
      </div>
    </div>
  </div>
</div>
<?php }} ?>
