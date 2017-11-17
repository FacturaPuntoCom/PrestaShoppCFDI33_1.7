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

    public function setMedia()
    {
        parent::setMedia();
        $this->addjQuery();

        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/table.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/dataTables.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/sweetalert.min.js');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/sweetalert.css');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/dataTables.css');
    }

    public function initContent()
    {
        parent::initContent();

        $invoices = array();
        // $url = $this->module->urlapi.'invoices';
        $url = $this->module->urlapi33.'list?=&type_document=factura';
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
        ));
    }

    public function ajaxProcessInvoiceCancel()
    {
        $uid = Tools::getValue('uid');

        $url = $this->module->urlapi33.$uid.'/cancel';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;

        die(Curls::adminCurl($url, $keyapi, $keysecret));
    }

    public function ajaxProcessInvoiceEmail()
    {
        $uid = Tools::getValue('uid');

        $url = $this->module->urlapi33.$uid.'/email';
        $keyapi = $this->module->keyapi;
        $keysecret = $this->module->keysecret;

        die(Curls::adminCurl($url, $keyapi, $keysecret));
    }
}
