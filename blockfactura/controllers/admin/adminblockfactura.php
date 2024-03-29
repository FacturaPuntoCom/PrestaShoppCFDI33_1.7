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

class AdminBlockfacturaController extends ModuleAdminController
{
    public function __construct()
    {
        $this->lang = false;
        $this->display = 'test';
        $this->bootstrap = true;

        parent::__construct();

        $this->template = 'test.tpl';
    }

    public function setMedia($isNewTheme = false)
    {
        parent::setMedia();
        $this->addjQuery();

        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/table.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/dataTables.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/sweetalert2.all.min.js');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/sweetalert2.min.css');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/dataTables.css');
    }

    public function initContent()
    {
        parent::initContent();

        $invoices = array();
        // $url = $this->module->urlapi.'invoices';
        $url_aux = ($this->module->checkbox_dev == 0) ? $this->module->urlapi40 : $this->module->urlapi40_dev;
        $url_pub = ($this->module->checkbox_dev == 0) ? $this->module->urlpub : $this->module->urlpub_dev;
        
        $url = $url_aux.'list?=&type_document=factura&per_page=1000';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;

        $response = Tools::jsonDecode(Curls::adminCurl($url, $keyapi, $keysecret));

        $query = new DbQuery();
        $query->select('o.reference, c.firstname, c.lastname');
        $query->from('orders', 'o');
        $query->join('LEFT JOIN`'._DB_PREFIX_.'customer` c ON o.`id_customer` = c.`id_customer`');
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);

        if ($response->status != 'error') {
            foreach ($result as &$row) {
                foreach ($response->data as &$res) {
                    if (($res->NumOrder) == ($row['reference'])) {
                        $invoices[] = array(
                          'name' => $row['firstname'].'  '.$row['lastname'],
                          'receptor' => $res->Receptor,
                          'order' => $res->NumOrder,
                          'status' => $res->Status,
                          'uid' => $res->UID,
                        );
                    }
                }
            }
        }

        $url_ajax = $this->context->link->getAdminLink('AdminBlockfactura');
        //var_dump($url_ajax);

        $this->context->smarty->assign(array(
        'content' => $invoices,
        'ajax_url' => $url_ajax,
        'pub_url' => $url_pub,
        ));
    }

    public function ajaxProcessInvoiceCancel()
    {
        $uid = Tools::getValue('uid');
        $data = ['motivo' => Tools::getValue('motivo'), 'folioSustituto' => Tools::getValue('folioSustituto')];

        $url_aux = ($this->module->checkbox_dev == 0) ? $this->module->urlapi40 : $this->module->urlapi40_dev;
        $url = $url_aux.$uid.'/cancel';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;

        die(Curls::frontCurl($url, 'post', $keyapi, $keysecret, $data));
    }

    public function ajaxProcessInvoiceEmail()
    {
        $uid = Tools::getValue('uid');

        $url_aux = ($this->module->checkbox_dev == 0) ? $this->module->urlapi40 : $this->module->urlapi40_dev;
        $url = $url_aux.$uid.'/email';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;

        die(Curls::adminCurl($url, $keyapi, $keysecret));
    }
    
    public function ajaxProcessDownloadFile()
    {
      $uid  = Tools::getValue('uid');
      $type = Tools::getValue('type');

      $url_aux = ($this->module->checkbox_dev == 0) ? $this->module->urlapi40 : $this->module->urlapi40_dev;
      $url = ($type == 'pdf') ? $url_aux.$uid.'/pdf' : $url_aux.$uid.'/xml' ;
      $keyapi = $this->module->keyapi;
      $keysecret = $this->module->keysecret;

      $response = Curls::adminCurl($url, $keyapi, $keysecret);

      header('Content-type: application/json');
      $data = array('file' => base64_encode($response));

      echo json_encode($data);
    }
}
