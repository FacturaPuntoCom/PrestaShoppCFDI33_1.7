{*
* 2016 FACTURA PUNTO COM SAPI de CV
*
* NOTICE OF LICENSE
*
* This source file is subject to License
* It is also available through the world-wide-web at this URL:
* http://factura.com
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to apps@factura.com so we can send you a copy immediately.
*
*  @author factura.com <apps@factura.com>
*  @copyright  2016 Factura Punto Com
*  International Registered Trademark & Property of factura.com
*}

<h1>{l s='List of Invoices' mod='blockfactura'}</h1>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <table id="tabla" class="display" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>{l s='Name' mod='blockfactura'}</th>
              <th>{l s='RFC' mod='blockfactura'}</th>
              <th>{l s='Order' mod='blockfactura'}</th>
              <th>{l s='Downloads' mod='blockfactura'}</th>
              <th>{l s='Options' mod='blockfactura'}</th>
            </tr>
          </thead>
          <tbody>
              {foreach key=key item=con from=$content}
            <tr>
              <td>{$con.name|escape:'htmlall':'UTF-8'}</td>
              <td>{$con.receptor|escape:'htmlall':'UTF-8'}</td>
              <td>{$con.order|escape:'htmlall':'UTF-8'}</td>
              <td>
                {if $con.status eq 'cancelada'}
                <a class="btn btn-info" role="button"  href="" disabled="true">Documento PDF</a>
                <a class="btn btn-default" href="" disabled="true">Documento XML</a>
                {else}
                <a id="pdf-{$con.uid|escape:'htmlall':'UTF-8'}" class="btn btn-info" role="button"  href="{$pub_url|escape:'htmlall':'UTF-8'}{$con.uid|escape:'htmlall':'U-8'}/pdf">Documento PDF</a>
		            <a id="xml-{$con.uid|escape:'htmlall':'UTF-8'}" class="btn btn-default" href="{$pub_url|escape:'htmlall':'UTF-8'}{$con.uid|escape:'htmlall':'UTF-8'}/xml">Documento XML</a> 
                {/if}
              </td>
              <td>
                {if $con.status eq 'cancelada'}
                <a class="btn btn-default" disabled="true">Factura Cancelada</a>
                {else}
                <a id="cancel-{$con.uid|escape:'htmlall':'UTF-8'}" class="display btn btn-danger" onclick="invoiceCancel('{$con.uid|escape:'htmlall':'UTF-8'}')">Cancelar factura</a>
                <a id="mail-{$con.uid|escape:'htmlall':'UTF-8'}" class="btn btn-success" onclick="invoiceEmail('{$con.uid|escape:'htmlall':'UTF-8'}')">Enviar por correo</a>
                {/if}
              </td>
            </tr>
            {/foreach}
          </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    {if $ajax_url}
    <input id="url-admin" type="hidden" value="{$ajax_url|escape:'htmlall':'UTF-8'}">
    {/if}
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
