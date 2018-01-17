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

class BlockfacturaFacturaModuleFrontController extends ModuleFrontController
{
    //public $auth = true;
//  public $authRedirection = 'facturacion';
    public $ssl = true;
    public $hide_left_column = true;

    public function __construct()
    {
        $this->bootstrap = true;

        parent::__construct();
        $this->context = Context::getContext();
    }

    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(
            array(
              'hide_left_column' => $this->hide_left_column,
              'keyapi' => $this->module->keyapi,
              'keysecret' => $this->module->keysecret,
              'encabezado' => $this->module->encabezado,
              'colors' => $this->module->color_fields,
              'ps_version' => $this->module->version_ps,
              'base_dir' => _PS_BASE_URL_.__PS_BASE_URI__,
              'base_dir_ssl' => 'https://'.Configuration::get('PS_SHOP_DOMAIN_SSL').__PS_BASE_URI__,
              'ssl_active' => Configuration::get('PS_SSL_ENABLED')
            )
        );

        if ($this->module->version_ps == '17') {
            $this->setTemplate('module:blockfactura/views/templates/front/factura.tpl');
        } elseif ($this->module->version_ps == '16') {
            $this->setTemplate('factura.tpl');
        }
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addjQuery();
        $this->addJqueryUI('ui.progressbar');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/progress.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/control.js');
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/sweetalert.min.js');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/sweetalert.css');
        $this->addCSS(_MODULE_DIR_.$this->module->name.'/views/css/factura.css');
      //   $this->registerStylesheet(
      //     'factura_style',
      //     'modules/'.$this->module->name.'/views/css/factura.css',
      //     [
      //       'media' => 'all',
      //       'priority' => 1000,
      //     ]
      // );
      //   $this->registerStylesheet(
      //     'sweet_style',
      //     'modules/'.$this->module->name.'/views/css/sweetalert.css',
      //     [
      //       'media' => 'all',
      //       'priority' => 1000,
      //     ]
      // );
      //
      // $this->registerJavascript(
      //       'control_js',
      //       'modules/'.$this->module->name.'/views/js/control.js',
      //       [
      //         'priority' => 200,
      //         'attribute' => 'async',
      //       ]
      //   );
      //
      // $this->registerJavascript(
      //       'swal_js',
      //       'modules/'.$this->module->name.'/views/js/sweetalert.min.js',
      //       [
      //         'priority' => 200,
      //         'attribute' => 'async',
      //       ]
      //   );
      //
      //
      // $this->registerJavascript(
      //       'progress_js',
      //       'modules/'.$this->module->name.'/views/js/progress.js',
      //       [
      //         'priority' => 300,
      //         'attribute' => 'async',
      //       ]
      //   );
    }
}
