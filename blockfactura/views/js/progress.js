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
 
var valor=0;
var int=0;

$(function() {
    $("#progressbar").progressbar({

        max:100,        // definimos el valor maximo
        value:valor,    // definimos el valor actual
        complete:function(){
            // en el momento que se llene, detenemos el setInterval
            clearInterval(int);
        }

    });

    //$("#progressbar > div").css({'background': 'red'});

    function aumentar()
    {
        valor++;

        // Modificamos el valor de la variable value del progressbar

        $("#progressbar").progressbar("value",valor);
    }

    // indicamos que cada 50 milisegundos ejecute la funcion aumentar
    var int=setInterval(aumentar,50);

});
