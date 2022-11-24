<?php
/**
* 2016 FACTURA PUNTO COM SAPI de CV
*
* NOTICE OF LICENSE
*
* This source file is subject to License
* It is also available through the world-wide-web at this URL:
* https://factura.com
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to apps@factura.com so we can send you a copy immediately.
*
*  @author    factura.com <app@factura.com>
*  @copyright 2016 FACTURA PUNTO COM
*  @license   https://factura.com
*  International Registered Trademark & Property of factura.com
*/

include_once dirname(__FILE__).'/curls.php';

class AdminInvoicesbyblockController extends ModuleAdminController
{
    public function __construct()
    {
        $this->lang = false;
        $this->display = 'index';
        $this->bootstrap = true;

        parent::__construct();


        $this->template = 'index.tpl';
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia($isNewTheme);
        $this->addjQuery();

        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/dataTables.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/dataTablesSelect.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/dataTablesButtons.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/sweetalert2.all.min.js');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/sweetalert.css');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/dataTables.css');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/dataTablesSelect.css');
    }

    public function initContent()
    {
        parent::initContent();

        // $url = $this->module->urlapi.'invoices';
        $url_aux = ($this->module->checkbox_dev == 0) ? $this->module->urlapi40 : $this->module->urlapi40_dev;
        $url_pub = ($this->module->checkbox_dev == 0) ? $this->module->urlpub : $this->module->urlpub_dev;

        $url = $url_aux.'list?=&type_document=factura&per_page=1000';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;

        $response = Tools::jsonDecode(Curls::adminCurl($url, $keyapi, $keysecret));

        $url_ajax = $this->context->link->getAdminLink('AdminInvoicesbyblock');

        $query = new DbQuery();
        $query->select('o.id_order, o.reference, o.invoice_date, o.total_paid, c.firstname, c.lastname, osl.name as status');
        $query->from('orders', 'o');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'customer` c ON o.`id_customer` = c.`id_customer`');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'order_state` os ON os.`id_order_state` = o.`current_state`');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'order_state_lang` osl ON (os.`id_order_state` = osl.`id_order_state` AND osl.`id_lang` = '.(int)$this->context->language->id.')');
        $query->where("c.email = 'customer@ecopipomorelos.com'");
        $query->where('os.id_order_state = 2');
        $query->orderBy('o.invoice_date desc');
        $query->limit('500');
        $orders = Db::getInstance()->executeS($query);


        $this->context->smarty->assign(array(
        'content' => $orders,
        'ajax_url' => $url_ajax,
        'pub_url' => $url_pub,
        ));
    }

    public function ajaxProcessCreateInvoice()
    {
        $orderReference = Tools::getValue('uid');
        $query = new DbQuery();
        $query->select('id_order, total_products, total_products_wt, total_discounts_tax_excl, total_discounts');
        $query->from('orders');
        $query->where("reference = '".$orderReference."'");
        $order_id = "";

        if ($results = Db::getInstance()->executeS($query)) {
            foreach ($results as $row) {
                $order_id = (int) $row['id_order'];
                $discount = $row['total_discounts_tax_excl'];
            }
        }

        //$products_invoice = Cookies::getCookie('order');
        $products_invoice = array();
        $flag_discount = false;
        $order = new Order($order_id);


        $products = $order->getProducts();
        $url_aux = ($this->module->checkbox_dev == 0) ? $this->module->urlapi : $this->module->urlapi_dev;

        $in = 0;
        foreach ($products as &$product) {
            $unit_price = (float) $product['unit_price_tax_excl'];
            $total_price = (float) $product['total_price_tax_excl'];

            //query para obtener los atributos SAT del producto
            $querySAT = new DbQuery();
            $querySAT->select('psfp.id_product, psfl.name, psfv.value');
            $querySAT->from('feature_product', 'psfp');
            $querySAT->join('INNER JOIN`'._DB_PREFIX_.'feature_lang` psfl ON psfl.`id_feature` = psfp.`id_feature` AND psfl.`name` IN ("F_ClaveProdServ", "F_ClaveUnidad", "F_Unidad")');
            $querySAT->join('INNER JOIN`'._DB_PREFIX_.'feature_value_lang` psfv ON psfv.`id_feature_value` = psfp.`id_feature_value`');
            $querySAT->where('psfp.`id_product` = "'.pSQL($product['id_product']).'"');
            $querySAT->groupBy('psfl.name');
            $resultSAT = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($querySAT);

            //decidir en los items las características
            foreach ($resultSAT as &$feature) {
              switch ($feature['name']) {
                case 'F_ClaveProdServ':
                  $f_prodserv = $feature['value'];
                  break;
                case 'F_ClaveUnidad':
                  $f_claveunidad = $feature['value'];
                  break;
                case 'F_Unidad':
                  $f_unidad = $feature['value'];
                  break;
              }
            }

            //Agregar descuentos en el item productos
            if($flag_discount) {
                $set_discount = 0;
            } else {
                if($discount == 0){
                    $set_discount = 0;
                    $flag_discount = true;
                } else if ($discount > $unit_price * $product['product_quantity']){
                    $set_discount = $unit_price * $product['product_quantity'];
                    $discount -= $unit_price * $product['product_quantity'];
                } else {
                    $set_discount = $discount;
                    $discount = 0;
                }
            }

            //armar los impuestos por producto
            switch ($product['tax_rate']) {
              case 16:
                $base_calc = (Tools::ps_round($unit_price, 2) * $product['product_quantity']) - $set_discount;
                $decimas = explode(".", $base_calc);

                //verificamos que no exceda el máximo de decimales
                if(strlen($decimas[1]) > 6) {
                    $base_calc = number_format(round($base_calc, 6), 6);
                }

                $taxes_product[] = array(
                  'Base' => $base_calc,
                  'Impuesto' => '002',
                  'TipoFactor' => 'Tasa',
                  'TasaOCuota' => '0.16',
                  'Importe' => number_format(Tools::ps_round($base_calc * .16, 6), 6)
                );
                $traslados = array('Traslados' => $taxes_product);
              break;
              case 0:
                $base_calc = (Tools::ps_round($unit_price, 2) * $product['product_quantity']) - $set_discount;
                $decimas = explode(".", $base_calc);

                //verificamos que no exceda el máximo de decimales
                if(strlen($decimas[1]) > 6) {
                    $base_calc = number_format(round($base_calc, 6), 6);
                }

                $taxes_product[] = array(
                  'Base' => $base_calc,
                  'Impuesto' => '002',
                  'TipoFactor' => 'Tasa',
                  'TasaOCuota' => '0',
                  'Importe' => number_format(Tools::ps_round($base_calc * 0, 6), 6)
                );
                $traslados = array('Traslados' => $taxes_product);
              break;
              default:
                $traslados = [];
                break;
            }

            $taxes_product = null;

            $products_invoice[] = array(
              'ClaveProdServ' => $f_prodserv,
              'ClaveUnidad' => $f_claveunidad,
              'Unidad' => $f_unidad,
              'Cantidad' => $product['product_quantity'],
              'Descripcion' => $product['product_name'],
              'ValorUnitario' => Tools::ps_round($unit_price, 2),
              'Descuento' => $set_discount,
              'Impuestos' => $traslados,
            );
        }

        //método para obtener los gastos de envío
        $data = trim($orderReference);
        $query = new DbQuery();
        $query->select('o.id_order, c.shipping_cost_tax_excl, c.shipping_cost_tax_incl');
        $query->from('orders', 'o');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'order_carrier` c ON o.`id_order` = c.`id_order`');
        $query->where('o.reference = "'.pSQL($data).'"');

        if ($result_carrier = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query)) {

            foreach ($result_carrier as $carrier) {
                $price = (float) $carrier['shipping_cost_tax_excl'];
                $round = Tools::ps_round($price, 2);

                //impuesto envío
                if ($carrier['shipping_cost_tax_excl'] == $carrier['shipping_cost_tax_incl']) {
                  $traslados_carrier = [];
                }else {
                  $taxes_carrier[] = array(
                    'Base' => $carrier['shipping_cost_tax_excl'],
                    'Impuesto' => '002',
                    'TipoFactor' => 'Tasa',
                    'TasaOCuota' => '0.16',
                    'Importe' => $carrier['shipping_cost_tax_excl'] * .16
                  );
                  $traslados_carrier = array('Traslados' => $taxes_carrier);
                }

                if ($carrier['shipping_cost_tax_excl'] != '0') {
                    $products_invoice[] = array(
                      'ClaveProdServ' => '78102203',
                      'ClaveUnidad' => 'SX',
                      'Unidad' => 'Envío',
                      'Cantidad' => 1,
                      'Descripcion' => 'Costo de envío',
                      'ValorUnitario' => $round,
                      'Impuestos' => $traslados_carrier
                      );

                      if (count($traslados_carrier) < 1) {
                        unset($products_invoice[$in]['Impuestos']);
                      }
                      $in++;
                }
            }
        }

        if (Tools::getValue('num_cta') != '') {
            $num_cta = (int) Tools::getValue('num_cta');
        } else {
            $num_cta = '';
        }

        if ($this->module->send_mail == 0) {
            $send = false;
        } else {
            $send = true;
        }

        $seriesget = Curls::frontCurl($url_aux . 'series', 'get', $this->module->keyapi, $this->module->keysecret);
        $decode_series = Tools::jsonDecode($seriesget, true);

        foreach ($decode_series['data'] as $key => $serie) {
            if ($serie['SerieName'] == $this->module->serie)
                $id_serie = $serie['SerieID'];
        }

        if ($id_serie == '' || $id_serie == null)
            return die(Tools::jsonEncode(array('response' => 'error', 'message' => 'La serie con que intentas facturar no existe en tu catálogo de series y folios')));

        $getClient = json_decode(Curls::frontCurl($url_aux.'clients/XAXX010101000', 'get', $this->module->keyapi, $this->module->keysecret));

        if($getClient->status == 'error'){
          return die(Tools::jsonEncode(array('response' => 'error', 'message' => 'No se encontró ningún cliente con RFC XAXX010101000')));
        }

        $params = array(
                 'Receptor' => array('UID' => $getClient->Data->UID),
                 'TipoCfdi' => 'factura',
                 'Redondeo' => 2,
                 'Conceptos' => $products_invoice,
                 'UsoCFDI' => 'G03',
                 'Cuenta' => $num_cta,
                 'MetodoPago' => 'PUE',
                 'FormaPago' => '31',
                 'Moneda' => 'MXN',
                 'NumOrder' => $orderReference,
                 'Serie' => $id_serie,
                 'EnviarCorreo' => $send,
               );

        $dataString = Tools::jsonEncode($params);
        $url_invoice = ($this->module->checkbox_dev == 0) ? $this->module->urlapi40 : $this->module->urlapi40_dev;
        $url = $url_invoice.'create';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;
        $request = 'post';

        //agregar die por cambio en curl
        return die(Curls::frontCurl($url, $request, $keyapi, $keysecret, $params));
    }

}