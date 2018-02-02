<?php /* Smarty version Smarty-3.1.19, created on 2018-01-29 22:44:10
         compiled from "/home/felipe/vhosts/prestashop/modules/blockfactura/views/templates/admin/blockfactura/test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19073452585a6f6472912152-68290642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '578feef7c831e0e25ed207171e5e7259b817f4f8' => 
    array (
      0 => '/home/felipe/vhosts/prestashop/modules/blockfactura/views/templates/admin/blockfactura/test.tpl',
      1 => 1516221606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19073452585a6f6472912152-68290642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
    'con' => 0,
    'ajax_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a6f64729416f9_85319478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6f64729416f9_85319478')) {function content_5a6f64729416f9_85319478($_smarty_tpl) {?>

<h1><?php echo smartyTranslate(array('s'=>'List of Invoices','mod'=>'blockfactura'),$_smarty_tpl);?>
</h1>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <table id="tabla" class="display" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><?php echo smartyTranslate(array('s'=>'Name','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'RFC','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Order','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Downloads','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Options','mod'=>'blockfactura'),$_smarty_tpl);?>
</th>
            </tr>
          </thead>
          <tbody>
              <?php  $_smarty_tpl->tpl_vars['con'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['con']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['con']->key => $_smarty_tpl->tpl_vars['con']->value) {
$_smarty_tpl->tpl_vars['con']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['con']->key;
?>
            <tr>
              <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['name'],'htmlall','UTF-8');?>
</td>
              <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['receptor'],'htmlall','UTF-8');?>
</td>
              <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['order'],'htmlall','UTF-8');?>
</td>
              <td>
                <?php if ($_smarty_tpl->tpl_vars['con']->value['status']=='cancelada') {?>
                <a class="btn btn-info" role="button"  href="" disabled="true">Documento PDF</a>
                <a class="btn btn-default" href="" disabled="true">Documento XML</a>
                <?php } else { ?>
                <a id="pdf-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
" class="btn btn-info" role="button"  href="https://factura.com/api/publica/cfdi33/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','U-8');?>
/pdf">Documento PDF</a>
		            <a id="xml-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
" class="btn btn-default" href="https://factura.com/api/publica/cfdi33/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
/xml">Documento XML</a> 
                <?php }?>
              </td>
              <td>
                <?php if ($_smarty_tpl->tpl_vars['con']->value['status']=='cancelada') {?>
                <a class="btn btn-default" disabled="true">Factura Cancelada</a>
                <?php } else { ?>
                <a id="cancel-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
" class="display btn btn-danger" onclick="invoiceCancel('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
')">Cancelar factura</a>
                <a id="mail-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
" class="btn btn-success" onclick="invoiceEmail('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['con']->value['uid'],'htmlall','UTF-8');?>
')">Enviar por correo</a>
                <?php }?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <?php if ($_smarty_tpl->tpl_vars['ajax_url']->value) {?>
    <input id="url-admin" type="hidden" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['ajax_url']->value,'htmlall','UTF-8');?>
">
    <?php }?>
  </div>

  <script type="text/javascript">

  $(document).ready(function() {

  } );

  function invoiceCancel(uid){
    var url_admin = $('#url-admin').val();
    swal({
      title: "Cancelación de factura",
      text: "cancelando...",
      type: "info",
      showConfirmButton: false
    });
    $.ajax({
      type: 'post',
      url: url_admin,
      dataType: 'json',
      data: {
        controller : 'AdminBlockfactura',
  			action : 'invoiceCancel',
        uid: uid,
  			ajax : true,
      },
      success: function(response){
          if (response.status != 'error') {
            $('#cancel-'+uid).text('Factura Cancelada');
            $('#cancel-'+uid).attr('class', 'btn btn-default');
            $('#cancel-'+uid).attr('disabled', true);
            $('#pdf-'+uid).attr('disabled', true);
            $('#xml-'+uid).attr('disabled', true);
            $('#mail-'+uid).stop().hide();
            setTimeout(function(){
              swal({
                title: "¡Factura Cancelada!",
                type: 'success',
                timer: 2000,
                showConfirmButton: false
              });
            }, 2000);
          }else{
            swal("Algo salió mal :( ", "error");
          }
      }
    });
  }

  function invoiceEmail(uid){
    var url_admin = $('#url-admin').val();
    swal({
      title: "Envío de factura",
      text: "enviando email a tu cliente...",
      type: "info",
      showConfirmButton: false
    });
    $.ajax({
      type: 'post',
      url: url_admin,
      dataType: 'json',
      data: {
        controller : 'AdminBlockfactura',
  			action : 'invoiceEmail',
        uid: uid,
  			ajax : true,
      },
      success: function(response){
          if (response.status != 'error') {
            setTimeout(function(){
              swal({
                title: "¡Factura Envíada!",
                type: 'success',
                timer: 2000,
                showConfirmButton: false
              });
            }, 2000);
          }else {
            swal("Algo salió mal :( ", "error");
          }
      }
    });
  }
  </script>
</div>
<?php }} ?>
