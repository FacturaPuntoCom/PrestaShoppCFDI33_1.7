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

<style>
.dataTables_filter {
  display: inline-block;
}
.dt-buttons {
  display: inline-block;
}
.dt-button {
  padding: 7px 12px;
  background-color: #1d1d1d;
  color: white;
  border: 2px solid #1d1d1d;
  transition-duration: 0.4s;
}
.dt-button:hover {
  background-color: #eff1f2;; /* Green */
  color: #1d1d1d;
}
.tabla_wrapper {
  margin-top: 10px;
}
</style>

<h1>{l s='Orders' mod='blockfactura'}</h1>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <table id="tabla" class="display" width="100%" cellspacing="0">
          <thead>
            <tr>
			        <th></th>
              <th>{l s='ID' mod='blockfactura'}</th>
              <th>{l s='Referencia' mod='blockfactura'}</th>
              <th>{l s='Cliente' mod='blockfactura'}</th>
              <th>{l s='Total' mod='blockfactura'}</th>
              <th>{l s='Estado' mod='blockfactura'}</th>
              <th>{l s='Fecha' mod='blockfactura'}</th>
            </tr>
          </thead>
          <tbody>
              {foreach key=key item=con from=$content}
            <tr>
			        <td></td>
              <td>{$con.id_order}</td>
              <td>{$con.reference|escape:'htmlall':'UTF-8'}</td>
              <td>{$con.firstname|escape:'htmlall':'UTF-8'} {$con.lastname|escape:'htmlall':'UTF-8'}</td>
              <td>{$con.total_paid|string_format:"%.2f"}</td>
              <td>{$con.status|escape:'htmlall':'UTF-8'}</td>
              <td>{$con.invoice_date}</td>
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
	  	var table = $('#tabla').DataTable( {
        dom: 'Bfrtip',
        "pageLength": 20,
        columnDefs: [ {
          orderable: false,
          className: 'select-checkbox',
          targets:   0
        } ],
        select: true,
        buttons: [
            {
                text: 'Timbrar',
                action: function () {
                    let responses = [];
                    let data = table.rows( { selected: true } ).data();
                    
                    if(data.length > 0) {
                      Swal.fire({
                        title: 'Atendiendo tu petición',
                        text: 'Creando facturas...',
                        icon: 'info',
                      })
                      
                      for(let i=0; i < data.length; i++) {
                        let arrTemp = []
                        arrTemp['order'] = data[i][2]
                        arrTemp['result'] = createInvoice(data[i][2])
                        responses.push(arrTemp)
                      }
                      let strToShow = '';
                      responses.forEach(function(data){
                        let message = '';
                        if(data.result.message.message) {
                          message = data.result.message.message
                        }else {
                          message = data.result.message
                        }
                        strToShow += 'Orden: ' + data.order + ', ' + message + '.<br><br>';
                        console.log(data.order, data.result.message.message)
                      })
                      
                      Swal.fire({
                        title: 'Resultado facturas',
                        html: strToShow,
                        icon: 'success',
                      })
                    }else {
                      Swal.fire({
                        title: 'Aviso',
                        text: 'Debes seleccionar al menos 1 registro',
                        icon: 'warning',
                      })
                    }
                }
            }
        ]
      });
  } );

  function createInvoice(uid){
    var url_admin = $('#url-admin').val();
    let response = "vacio";

    $.ajax({
      async: false,
      type: 'post',
      url: url_admin,
      dataType: 'json',
      data: {
        controller : 'AdminInvoicesbyblock',
  			action : 'CreateInvoice',
        uid: uid,
  			ajax : true,
      },
      success: function(res){
        response = res;
      },
      error: function(error){
        response = error;
      }
    });
    
    return response;
  }
  
  
  </script>
</div>