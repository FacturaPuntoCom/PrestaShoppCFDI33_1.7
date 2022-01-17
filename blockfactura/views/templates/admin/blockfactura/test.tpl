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
                <a id="pdf-{$con.uid|escape:'htmlall':'UTF-8'}" class="btn btn-info" role="button"  onclick="downloadFile('{$con.uid|escape:'htmlall':'UTF-8'}', 'pdf')">Documento PDF</a>
		            <a id="xml-{$con.uid|escape:'htmlall':'UTF-8'}" class="btn btn-default" role="button"  onclick="downloadFile('{$con.uid|escape:'htmlall':'UTF-8'}', 'xml')">Documento XML</a>
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

    Swal.fire({
      title: 'Cancelar factura',
      html: `
      <div class="cancelacion">
        <div>
          <h2>¿Estás seguro que quieres cancelar esta factura?, esta acción es irreversible</h2>
          <p>Sí es así, por favor selecciona un motivo de cancelación</p>
          <select id="motivo" class="swal2-input" name="motivo" placeholder="Selecciona una opción">
            <option value="01">01 - Comprobante emitido con errores con relación</option>
            <option value="02">02 - Comprobante emitido con errores sin relación</option>
            <option value="03">03 - No se llevó a cabo la operación</option>
            <option value="04">04 - Operación nominiativa relacionada en una factura global</option>
          </select>
        </div>
        <div id="grupoUID">
          <p>Escribe el UID o el UUID/folio físcal del CFDI sustituto</p>
          <input type="text" class="swal2-input" id="uid" name="uid" placeholder="Escribe el folio fiscal o uid">
        </div>
      </div>`,
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Sí, quiero cancelarla',
      confirmButtonColor: '#72C279',
      cancelButtonColor: '#d33',
      cancelButtonText: 'No',

      focusConfirm: false,
      onOpen: () => {
        $('#motivo').on('change', function(){
          if(this.value == "01"){
            $('#grupoUID').show();
          } else {
            $('#grupoUID').hide();
            if($('#swal2-validation-message').length){
              $('#swal2-validation-message').hide();
            }
          }
        });
      },
      preConfirm: () => {
        const motivo = $('#motivo').val();
        const folioSustituto = $('#uid').val();
        if (motivo == '01' && folioSustituto == '') {
          Swal.showValidationMessage(`Por favor, ingrese el folio o uid del CFDI que sustituirá esta factura a cancelar.`)
        }
        return { motivo, folioSustituto }
      }
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'post',
          url: url_admin,
          dataType: 'json',
          data: {
            controller : 'AdminBlockfactura',
            action : 'invoiceCancel',
            uid: uid,
            motivo: result.value.motivo,
            folioSustituto: result.value.folioSustituto,
            ajax : true,
          },
          beforeSend: function(){
            Swal.fire({
              html: '<h5>Cancelando factura, por favor espere ...</h5>',
              showConfirmButton: false,
              onOpen: () => Swal.showLoading()
            });
          },
          success: function(response){
            console.log(response);
              if (response.response != 'error') {
                Swal.fire({
                  icon: 'success',
                  text: 'La factura ha sido cancelada'
                });

                $('#cancel-'+uid).text('Factura Cancelada');
                $('#cancel-'+uid).attr('class', 'btn btn-default');
                $('#cancel-'+uid).attr('disabled', true);
                $('#pdf-'+uid).attr('disabled', true);
                $('#xml-'+uid).attr('disabled', true);
                $('#mail-'+uid).stop().hide();
              }else{
                Swal.fire({
                  icon: 'error',
                  html: '<h5>' + response.message + '</h5>'
              });
              }
          },
          error: function(e) {
            console.log(e);
              Swal.fire({
                  icon: 'error',
                  html: '<h5>Oops, ocurrió un error :( </h5>'
              });
              return false;
          }
        });
      }
    });

    
  }

  function invoiceEmail(uid){
    var url_admin = $('#url-admin').val();
    Swal.fire({
      title: "Envío de factura",
      text: "enviando email a tu cliente...",
      icon: "info",
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
              Swal.fire({
                title: "¡Factura Envíada!",
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
              });
            }, 2000);
          }else {
            Swal.fire("Algo salió mal :( ", "error");
          }
      }
    });
  }
  
  function downloadFile(uid, type) {
    var url_admin = $('#url-admin').val();
    Swal.fire({
      title: "Factura " + uid,
      text: "Descargando...",
      timer: 6000,
      showConfirmButton: false
    });
    $.ajax({
      type: 'post',
      url: url_admin,
      dataType: 'json',
      processData: 'false',
      data: {
        controller : 'AdminBlockfactura',
  			action : 'downloadFile',
        uid: uid,
        type: type,
  			ajax : true,
      },
      success: function(response){
        var b64 = response.file.toString();

        // Decodificar la cadena para mostrar contenido pdf
        var bin = atob(b64);

        // Insertar el link que contendrá el archivo pdf
        var link = document.createElement('a');
        if(type == 'pdf') {
          link.download = uid + '.pdf';
        } else {
          link.download = uid + '.xml';
        }

        link.href = 'data:application/octet-stream;base64,' + b64;
        document.body.appendChild(link);
        link.click();
      },
      error: function(error) {
        console.log('todo mal');
        console.log(error);
      }
    });
  }
  </script>
</div>

<style type="text/css">
  .swal2-validation-message{
    font-size: 14px;
    text-align: left;
  }
  .cancelacion{
    font-size: 12px;
  }
</style>
