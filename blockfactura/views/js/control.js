/**
 * 2016 FACTURA PUNTO COM SAPI de CV

 * The contents of this file are subject to the factura.com Public License
 * Version 1.0 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * https://factura.com
 *
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 *
 * Copyright (C) factura.com All Rights Reserved.
 * @autor factura.com <apps@factura.com>
 */

var get_rfc;
var num_order;
var get_uid;

//definiendo la version_ps
if ($('#ps_version').val() == '17') {
  var baseUri = $('#base_uri_ps').val();
}


$(function (){
  $("#form-one").submit(function (event){
    event.preventDefault();

    get_rfc = $('#rfc-form-one').val();
    num_order = $('#order-form-one').val();
    var data_form = $(this).serialize();

    validateFormOne(data_form);
    //orderExist(data_form);

  });

  $('#form-two').submit(function (event){
    event.preventDefault();
    var data = $(this).serialize();

    orderDetail(data);

    });

      $("#select-payment").change(function(){
         var selected_method = $( "#select-payment option:selected" ).val();

         if(selected_method == 04 || selected_method == 03 || selected_method == 28){
           $("#num-cta-box").removeAttr('hidden');
         }else{
           $("#num-cta-box").attr('hidden', 'hidden');
         }
});

$('#btn-invoice').click(function (event){
  event.preventDefault();

      var selected_method = $( "#select-payment option:selected" ).val();

      var num_cta_method  = $( "#f-num-cta" ).val();

      if(selected_method == 04 || selected_method == 28 || selected_method == 03){
        if(num_cta_method == "" || num_cta_method.length < 4){
          $("#error").text('Ingresa los últimos 4 dí­gitos de tu cuenta o tarjeta.');
          swal("¡Algo ocurrió!", "Ingresa los últimos 4 dí­gitos de tu cuenta o tarjeta", "warning");
          return false;
        }
}

if(selected_method == 0){
  $("html, body").animate({
      scrollTop: 0
  }, 600);
  swal("¡Atención!", "Selecciona un método de pago", "warning");
  return false;
}else{
    invoice(get_rfc, get_uid, num_order, selected_method, num_cta_method);
}
  });

  $('#btn-back').click(function (event){
    event.preventDefault();

    $('#block-tree').stop().hide();
    $('#block-two').fadeIn('100');
  });

  $('#activar').click(function (event){
    event.preventDefault();

    unlockOrder(num_order);
  });

});

function validateFormOne(data_form){
  progress(0, $('#progressBar'));
  $.ajax({
             type: 'post',
             url: baseUri+'module/blockfactura/process',
             data: 'action=postprocess&'+data_form,
               success: function(json) {
                 console.log(json);
                  if(json){
                      var data = JSON.parse(json);
                      $("#error").text(data[0].invoice);
                      $("#error").text(data[0].rfc);
                      $("#error").text(data[0].order);
                      $("#error").text(data[0].email);
                      $("#error").text(data[0].days);
                      $("html, body").animate({
                          scrollTop: 0
                      }, 600);
                      $("#alerts").removeAttr('hidden');
                      // if (data[0].invoice != '') {
                      //   if (!data[0].order) {
                      //     $('#activar').show();
                      //   }
                      // }
                  }else{
                    $('#alerts').stop().hide();
                    orderExist(data_form);
                  }

              }
           });
}

function sendDataFormOne(data_form){
  $.ajax({
    type: 'post',
    url: baseUri+'module/blockfactura/process',
    data: 'action=entryone&'+data_form,
    dataType: 'json',
    success: function(response){
      if (response.status != 'error') {

        fillFormTwo(response);
        cleanFormTwo();

        $('#bar-progress').attr('hidden','hidden');
        progress(0, $('#progressBar'));
        $('#block-two').removeAttr('hidden');
      }else{
        if (response.message == 'El cliente no existe') {
          cleanFormTwo();

          $('#legend-two').text('Ingresar datos del cliente');
          $('#action-api').val('create');
          $('#data-rfc').val(get_rfc);
          $('#existente').stop().hide();

          $('#bar-progress').stop().hide();
          $('#block-two').stop().fadeIn('2000');
        }else {
          $('#bar-progress').stop().hide();
          $('#block-one').fadeIn('100');
          swal("¡Lo sentimos!", "Tu licencia no se encuentra activa o ha caducado ", "warning");
        }
      }

    }
  });
}

function progress(percent, $element) {
    var progressBarWidth = percent * $element.width() / 100;
    $element.find('div').animate({ width: progressBarWidth }, 500).html("...");
}

function fillFormTwo(data){
  $('#contact-nombre').val(data.Data.Contacto.Nombre);
  $('#contact-apellidos').val(data.Data.Contacto.Apellidos);
  $('#contact-email').val(data.Data.Contacto.Email);
  $('#contact-telefono').val(data.Data.Contacto.Telefono);

  $('#data-razonsocial').val(data.Data.RazonSocial);
  $('#data-razoncial').val(data.Data.RazonSocial);
  $('#data-rfc').val(data.Data.RFC);
  $('#data-calle').val(data.Data.Calle);
  $('#data-exterior').val(data.Data.Numero);
  $('#data-interior').val(data.Data.Interior);
  $('#data-colonia').val(data.Data.Colonia);
  $('#data-cp').val(data.Data.CodigoPostal);
  $('#data-ciudad').val(data.Data.Ciudad);
  $('#data-delegacion').val(data.Data.Delegacion);

  $('#UID').val(data.Data.UID);
}

function cleanFormTwo(){
  $('#form-two input').each(function(){
      $(this).removeAttr('disabled');
  });
}

function orderDetail(data){
  $('#block-two').stop().hide();
  $("html, body").animate({
      scrollTop: 0
  }, 600);
  $('#bar-progress').removeAttr('hidden');
  progress(100, $('#progressBar'));
$.ajax({
  type: 'post',
  url: baseUri+'module/blockfactura/process',
  data: 'action=clientdetail&'+data,
  dataType: 'json',
  success: function(json){
    get_uid = json.Data.UID;
    fillViewTree(json);
    getOrder();
    $('#bar-progress').stop().hide();
    $('#block-tree').removeAttr('hidden');
  }

});
}

function fillViewTree(data){
  $('#emisor-nombre').text(data.Data.Contacto.Nombre+ ' ' +data.Data.Contacto.Apellidos);
  $('#emisor-rfc').text(data.Data.RFC);
  $('#emisor-calle').text(data.Data.Calle);
  $('#emisor-colonia').text(data.Data.Colonia);
  $('#emisor-ciudad').text(data.Data.Ciudad);
  $('#emisor-email').text(data.Data.Contacto.Email);
  $('#emisor-telefono').text(data.Data.Contacto.Telefono);
}

function getOrder(){
$.ajax({
  type: 'post',
  url: baseUri+'module/blockfactura/process',
  data: 'action=orderdetail&order='+num_order,
  dataType: 'json',
  success: function(json){
    products = json.products;
    totals = json.totals;
    business = json.business;
    var r = new Array(), j = -1;
       for (var key=0, size=products.length; key<size; key++){

           r[++j] ='<tr><td>';
           r[++j] = products[key]['concept'];
           r[++j] = '</td><td>';
           r[++j] = products[key]['cantidad'];
           r[++j] = '</td><td>$';
           r[++j] = products[key]['precio'];
           r[++j] = '</td><td>$';
           r[++j] = products[key]['subtotal'];
           r[++j] = '</td></tr>';
       }
$('#datails-body').html(r.join(''));

for (var key=0, size=business.length; key<size; key++){
  $('#receptor-nombre').text(business[key]['nombre']);
  $('#receptor-rfc').text(business[key]['rfc']);
  $('#receptor-calle').text(business[key]['direccion']);
  $('#receptor-colonia').text(business[key]['colonia']);
  $('#receptor-ciudad').text(business[key]['ciudad']);
  $('#receptor-email').text(business[key]['email']);
}

for (var key=0, size=totals.length; key<size; key++){
  $('#invoice-subtotal').text('$ '+totals[key]['subtotal']);
  $('#invoice-iva').text('$ '+totals[key]['iva']);
  $('#invoice-total').text('$ '+totals[key]['total']);
}

}
});
}


function invoice(rfc, uid, order, method, num_cta){
  swal({
    title: "Preparando tu factura",
    text: "Timbrando...",
    type: 'info',
    showConfirmButton: false
  });
  $.ajax({
    type: 'post',
    url: baseUri+'module/blockfactura/process',
    data: 'action=invoice&rfc='+rfc+'&uid='+uid+'&order='+order+'&method='+method+'&num_cta='+num_cta,
    dataType: 'json',
    success: function(json){
      console.log(json);
      if (json.response != 'error') {
        $('#btn-pdf').stop().show().attr('href','https://factura.com/api/publica/cfdi33/'+json.invoice_uid+'/pdf');
        $('#btn-xml').stop().show().attr('href','https://factura.com/api/publica/cfdi33/'+json.invoice_uid+'/xml');
        $('#block-tree').stop().hide();
        $('#alerts').stop().hide();
        $('#block-four').removeAttr('hidden');
        setTimeout(function(){
          swal({
            title: "¡Facturado!",
            type: 'success',
            timer: 1000,
            showConfirmButton: false
          });
          }, 1000);

          $("html, body").animate({
              scrollTop: 0
          }, 600);
      }else{
        // alert(json.message);
        setTimeout(function(){
          swal({
            title: "¡Algo ocurrio!",
            text: json.message,
            type: 'warning',
            showConfirmButton: true
          });
          }, 2000);

      }
    }
  });
  }


function orderExist(data){
  $('#block-one').stop().hide();
  $("html, body").animate({
      scrollTop: 0
  }, 600);
  $('#bar-progress').removeAttr('hidden');
  progress(100, $('#progressBar'));
  $.ajax({
    type: 'post',
    url: baseUri+'module/blockfactura/process',
    data: 'action=orderlist&'+data,
    dataType: 'json',
    success: function(response){
      if (response[0]) {
        if (response[0].status == 'cancelada') {
          $('#bar-progress').stop().hide();
          $('#block-one').fadeIn('100');
          $("#error").text("LA ORDEN SE ENCUENTRA CANCELADA, por favor comunicate con el administrador");
          $("html, body").animate({
              scrollTop: 0
          }, 600);
          $("#alerts").show();
        }else {
          $('#aviso-factura').text('La orden ya se encuentra facturada');
          $('#btn-pdf').stop().show().attr('href','https://factura.com/api/publica/cfdi33/'+response[0].UID+'/pdf');
          $('#btn-xml').stop().show().attr('href','https://factura.com/api/publica/cfdi33/'+response[0].UID+'/xml');
          $('#bar-progress').stop().hide();
          $('#block-four').removeAttr('hidden');
        }
      }else{
        sendDataFormOne(data);
      }
    }
  });
}
//función agregada para el demo
function unlockOrder(order){
  $('#alerts').hide();
  $('#activar').hide();
  swal({
    title: "Atendiendo tu petición",
    text: "LIBERANDO EL PEDIDO...",
    timer: 2000,
    showConfirmButton: false
  });
  $.ajax({
    type: 'post',
    url: baseUri+'module/blockfactura/process',
    data: 'action=unlockorder&'+'&order='+order+'&id_order_state=2',
    dataType: 'json',
    success: function(response){
      swal("¡En hora buena!", "El pedido se encuentra liberado, intenta facturar de nuevo", "success");
    }
  });
}
