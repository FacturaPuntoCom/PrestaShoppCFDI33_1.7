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
 include_once dirname(__FILE__).'/rfcvalidate.php';

class BlockfacturaProcessModuleFrontController extends ModuleFrontController
{
    public $products_invoice = array();
    public $order_save;

    public function __construct()
    {
        parent::__construct();
        $this->context = Context::getContext();
    }

    public function initContent()
    {
        parent::initContent();
        $this->ajax = true; // enable ajax
    }

    public function displayAjaxPostProcess()
    {
        $errors = array();

        if (!($email = trim(Tools::getValue('email'))) || !Validate::isEmail($email)) {
            $errors[] = array('email' => 'Email incorrecto.');
        } else {
            //$string = strval(Tools::getValue('email'));
            $string = Tools::getValue('email');
            if (Customer::customerExists($string, true)) {
                $customers = Customer::getCustomersByEmail(Tools::getValue('email'));
                foreach ($customers as &$customer) {
                    $orders = new Order();
                    $array_orders = $orders->getCustomerOrders($customer['id_customer']);
                    if ($array_orders) {
                        foreach ($array_orders as &$order) {
                            if ((trim(Tools::getValue('order'))) == ($orders->getUniqReferenceOf($order['id_order']))) {
                                $status = true;
                            }
                        }
                        if (!isset($status)) {
                            $errors[] = array(
                              'order' => 'El pedido NO coincide con la cuenta del correo electrónico proporcionado.'
                            );
                        }
                    } else {
                        $errors[] = array('order' => 'El cliente no tiene ordenes generadas');
                    }
                }
            } else {
                $errors[] = array('order' => 'El cliente no se encuentra logueado o no está registrado en la tienda.');
            }
        }
        if (!($rfc = trim(Tools::getValue('rfc'))) || !Rfcvalidate::isRfc($rfc)) {
            $errors[] = array('rfc' => 'Rfc incorrecto.');
        }

        $order_invoice = trim(Tools::getValue('order'));

        //method order state payment accepted
        $query = new DbQuery();
        $query->select('o.reference, o.id_order, h.id_order_state, h.id_order_history');
        $query->from('orders', 'o');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'order_history` h ON o.`id_order` = h.`id_order`');
        $query->where('o.reference = "'.pSQL($order_invoice).'"');
        $query->orderBy('id_order_history DESC');
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

        // --- method order state --
        $count_ord = 0;
        foreach ($result as &$row) {
            if ($count_ord == 0) {
              if ($row['id_order_state'] != '2') {
                  $errors[] = array('invoice' => 'LA ORDEN NO SE PUEDE FACTURAR, ya que no se encuentra liberada.');
              }
            }
          $count_ord ++;
        }

        // --- end method order state ---

        //method days invoice
        // var_dump($this->module->days);
        if ($this->module->days != "0") {
            $query = new DbQuery();
            $query->select('o.reference, o.id_order, i.id_order_invoice, i.date_add');
            $query->from('orders', 'o');
            $query->join('LEFT JOIN`'._DB_PREFIX_.'order_invoice` i ON o.`id_order` = i.`id_order`');
            $query->where('o.reference = "'.pSQL($order_invoice).'"');
            $query->groupBy('id_order');
            $days_result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

            foreach ($days_result as &$row) {
                // $date_invoice = date_create($row['date_add']);
                $to_date =  date_create(date("Y-m-d H:i:s"));

                $date_new_invoice = new DateTime($row['date_add']);
                $date_new_invoice->add(new DateInterval('P1M'));
                $date_new_invoice->setDate($date_new_invoice->format('Y'), $date_new_invoice->format('m'), 01);

                if ($to_date > $date_new_invoice) {
                    $date_new_invoice->add(new DateInterval('P'.$this->module->days.'D'));
                    if ($to_date >= $date_new_invoice) {
                        $errors[] = array('days' => 'LA ORDEN NO SE PUEDE FACTURAR,
                        los días disponibles para realizar la factura después del mes han expirado.');
                    }
                }
            }
        }
        // --- end method order invoice ---

        if (empty($errors)) {
            return false;
        } else {
            return die(Tools::jsonEncode($errors));
            // $orders = new Order();
            // $nueva = $orders->getCustomerOrders('2');
            // return die(Tools::jsonEncode($nueva));
        }
    }

/*
*@params  data form one
*@return Object json API
*/
    public function displayAjaxEntryOne()
    {
        $customerRfc = Tools::getValue('rfc');
        $url = $this->module->urlapi.'clients/'.$customerRfc;
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;
        $request = 'get';

        //agregar die por cambio en curl
        return die(Curls::frontCurl($url, $request, $keyapi, $keysecret));
    }

    public function displayAjaxClientDetail()
    {
        $params = array(
          'nombre' => Tools::getValue('contact-nombre'),
          'apellidos' => Tools::getValue('contact-apellidos'),
          'email' => Tools::getValue('contact-email'),
          'telefono' => Tools::getValue('contact-telefono'),
          'razons' => Tools::getValue('data-razoncial'),
          'rfc' => Tools::getValue('data-rfc'),
          'calle' => Tools::getValue('data-calle'),
          'numero_exterior' => Tools::getValue('data-exterior'),
          'numero_interior' => Tools::getValue('data-interior'),
          'codpos' => Tools::getValue('data-cp'),
          'colonia' => Tools::getValue('data-colonia'),
          'ciudad' => Tools::getValue('data-ciudad'),
          'estado' => Tools::getValue('data-delegacion'),
        );

        if (Tools::getValue('action-api') != 'create') {
            $UID = Tools::getValue('UID');
            $url = $this->module->urlapi.'clients/'.$UID.'/update';
            $keyapi = $this->module->keyapi;
            $keysecret = $this->module->keysecret;
            $request = 'post';
        } else {
            $url = $this->module->urlapi.'clients/create';
            $keyapi = $this->module->keyapi;
            $keysecret = $this->module->keysecret;
            $request = 'post';
        }

          //agregar die por cambio en curl
          return die(Curls::frontCurl($url, $request, $keyapi, $keysecret, $params));
    }

    public function displayAjaxOrderDetail()
    {
        $array = array();
        $data = trim(Tools::getValue('order'));
        $this->context->cookie->__unset('Order');

        $sql = 'SELECT id_order, total_products, total_products_wt
        FROM '._DB_PREFIX_.'orders WHERE reference="'.pSQL($data).'"';
        if ($results = Db::getInstance()->executeS($sql)) {
            foreach ($results as $row) {
                $order_customer = $row['id_order'];
                $this->context->cookie->__set('Order', $row['id_order']);
                $subtotal_order = $row['total_products'];
                $total_order = $row['total_products_wt'];
            }
        }

        $order_id = (int) $order_customer;
        $order = new Order($order_id);
        $products = $order->getProducts();



        foreach ($products as &$product) {
            $unit_price = (float) $product['unit_price_tax_excl'];
            $total_price = (float) $product['total_price_tax_excl'];

            $array['products'][] = array(
              'cantidad' => $product['product_quantity'],
              'unidad' => 'Pieza',
              'concept' => $product['product_name'],
              'precio' => Tools::ps_round($unit_price, 2),
              'subtotal' => Tools::ps_round($total_price, 2),
            );
        }

        //nuevo método para calcular gastos de envío
        $query = new DbQuery();
        $query->select('o.id_order, c.shipping_cost_tax_excl, c.shipping_cost_tax_incl');
        $query->from('orders', 'o');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'order_carrier` c ON o.`id_order` = c.`id_order`');
        $query->where('o.reference = "'.pSQL($data).'"');

        if ($result_carrier = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query)) {
            foreach ($result_carrier as $carrier) {
                $price = (float) $carrier['shipping_cost_tax_excl'];
                $round = Tools::ps_round($price, 2);

                if ($carrier['shipping_cost_tax_excl'] != '0') {
                    $subtotal_order += $carrier['shipping_cost_tax_excl'];
                    $total_order += $carrier['shipping_cost_tax_incl'];
                    $array['products'][] = array(
                      'cantidad' => 1,
                      'unidad' => 'NA',
                      'concept' => 'Costo de envío',
                      'precio' => $round,
                      'subtotal' => $round,
                      );
                }
            }
        }
        //var_dump($result_carrier);
       /* $iva = Tools::ps_round($subtotal_order * .16, 6);
        $array['totals'][] = array(
          'subtotal' => Tools::ps_round($subtotal_order, 6),
          'iva' => $iva,
          'total' => Tools::ps_round($total_order + $iva, 6),
        );*/
        $array['totals'][] = array(
            'subtotal' => Tools::ps_round($subtotal_order, 2),
            'iva' => Tools::ps_round($total_order - $subtotal_order, 2),
            'total' => Tools::ps_round($total_order, 2),
          );
  
        $url = $this->module->urlapi.'current/account';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;
        $request = 'get';

        //agregar die por cambio en curl
        $business = Tools::jsonDecode(Curls::frontCurl($url, $request, $keyapi, $keysecret));

        if ($business->status != 'error') {
            $bus = $business->data;
            $array['business'][] = array(
            'nombre' => $bus->razon_social,
            'rfc' => $bus->rfc,
            'direccion' => $bus->calle.' # '.$bus->exterior,
            'colonia' => $bus->colonia,
            'ciudad' => $bus->ciudad,
            'email' => $bus->email,
            );
        }

        //Cookies::saveCookie('order', $array['products']);

        return die(Tools::jsonEncode($array));
    }

    public function displayAjaxInvoice()
    {
        //$products_invoice = Cookies::getCookie('order');
        $products_invoice = array();

        $order_id = (int) $this->context->cookie->Order;
        $order = new Order($order_id);
        $products = $order->getProducts();
        // var_dump($products);die();

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
            
            //armar los impuestos por producto
            switch ($product['tax_rate']) {
              case 16:
                $base_calc = Tools::ps_round($unit_price, 2) * $product['product_quantity'];
                $decimas = explode(".", $base_calc);

                //verificamos que no exceda el máximo de decimales
                if(strlen($decimas[1]) > 6) {
                    $base_calc = round($base_calc, 6);
                }
                $taxes_product[] = array(
                  'Base' => $base_calc,
                  'Impuesto' => '002',
                  'TipoFactor' => 'Tasa',
                  'TasaOCuota' => '0.16',
                  'Importe' => Tools::ps_round($base_calc * .16, 6)
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
              'Impuestos' => $traslados,
            );

            if ($product['tax_rate'] == 0) {
              unset($products_invoice[$in]['Impuestos']);
            }
            $in++;
        }

        //método para obtener los gastos de envío
        $data = trim(Tools::getValue('order'));
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

        // método para obtener el numero en entero de la orden y no la referencia (por si se ocupa)
        // $data = Tools::getValue('order');
        //
        // $sql = 'SELECT id_order FROM '._DB_PREFIX_.'orders WHERE reference="'.$data.'"';
        // if ($results = Db::getInstance()->executeS($sql)) {
        //     foreach ($results as $row) {
        //         $num_order = intval($row['id_order']);
        //     }
        // }

        if (Tools::getValue('num_cta') != '') {
            //$num_cta = intval(Tools::getValue('num_cta'));
            $num_cta = (int) Tools::getValue('num_cta');
        } else {
            $num_cta = '';
        }

        if ($this->module->send_mail == 0) {
            $send = false;
        } else {
            $send = true;
        }

        $seriesget = Curls::frontCurl($this->module->urlapi . 'series', 'get', $this->module->keyapi, $this->module->keysecret);
        $decode_series = Tools::jsonDecode($seriesget, true);
        foreach ($decode_series['data'] as $key => $serie) {
            
            if ($serie['SerieName'] == $this->module->serie) {
                $id_serie = $serie['SerieID'];
            }
        }
        if ($id_serie == '' || $id_serie == null) {
            return die(Tools::jsonEncode(array('response' => 'error', 'message' => 'La serie con que intentas facturar no existe en tu catálogo de series y folios')));
        }
        //compruebo si el cliente le pone un uso de cfdi
        if (Tools::getValue('usocfdi') != '0') {
            $usocfdi = Tools::getValue('usocfdi');
        }else {
            $usocfdi = $this->module->u_cfdi; 
        }
        $params = array(
                 'Receptor' => array('UID' => Tools::getValue('uid')),
                 'TipoCfdi' => 'factura',
                 'Redondeo' => 2,
                 'Conceptos' => $products_invoice,
                 'UsoCFDI' => $usocfdi,
                 'Cuenta' => $num_cta,
                 'MetodoPago' => 'PUE',
                 'FormaPago' => Tools::getValue('method'),
                 'Moneda' => 'MXN',
                 'NumOrder' => Tools::getValue('order'),
                 'Serie' => $id_serie,
                 'EnviarCorreo' => $send,
               );
        $dataString = Tools::jsonEncode($params);
        $url = $this->module->urlapi33.'create';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;
        $request = 'post';
        
        //agregar die por cambio en curl
        return die(Curls::frontCurl($url, $request, $keyapi, $keysecret, $params));
    }

    public function displayAjaxOrderList()
    {
        $response = array();

        $customerRfc = trim(Tools::getValue('rfc'));
        $url = $this->module->urlapi.'invoices/'.$customerRfc;
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;
        $request = 'get';

        $orders = Tools::jsonDecode(Curls::frontCurl($url, $request, $keyapi, $keysecret));

        if ($orders->status != 'error') {
            foreach ($orders->data as &$order) {
                if ($order->NumOrder == trim(Tools::getValue('order'))) {
                    $response[] = array(
                    'status' => $order->Status,
                    'UID' => $order->UID,
                    );
                }
            }
        }

        return die(Tools::jsonEncode($response));
    }

    //método para el demo, liberar pedido
    public function displayAjaxUnlockOrder()
    {
        $message = array();

        $order = trim(Tools::getValue('order'));

        $sql = 'SELECT id_order
        FROM '._DB_PREFIX_.'orders WHERE reference="'.pSQL($order).'"';

        if ($results = Db::getInstance()->executeS($sql)) {
            foreach ($results as $row) {
                $id_order = $row['id_order'];
            }
        }

        $order = new Order($id_order);
        $order_state = new OrderState(Tools::getValue('id_order_state'));

        $current_order_state = $order->getCurrentOrderState();
        if ($current_order_state->id != $order_state->id) {
            // Create new OrderHistory
            $history = new OrderHistory();
            $history->id_order = $order->id;
            $history->id_employee = (int)$this->context->employee->id;

            $use_existings_payment = false;
            if (!$order->hasInvoice()) {
                $use_existings_payment = true;
            }
            $history->changeIdOrderState((int)$order_state->id, $order, $use_existings_payment);

            $carrier = new Carrier($order->id_carrier, $order->id_lang);
            $templateVars = array();
            if ($history->id_order_state == Configuration::get('PS_OS_SHIPPING') && $order->shipping_number) {
                $templateVars = array('{followup}' => str_replace('@', $order->shipping_number, $carrier->url));
            }

            // Save all changes
            if ($history->addWithemail(true, $templateVars)) {
                // synchronizes quantities if needed..
                if (Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT')) {
                    foreach ($order->getProducts() as $product) {
                        if (StockAvailable::dependsOnStock($product['product_id'])) {
                            StockAvailable::synchronize($product['product_id'], (int)$product['id_shop']);
                        }
                    }
                }
                $message[] = array('status' => 'Operación correcta');
            }
        }
        return die(Tools::jsonEncode($message));
    }
}
