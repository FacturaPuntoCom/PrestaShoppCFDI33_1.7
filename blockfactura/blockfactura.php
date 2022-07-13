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

if (!defined('_PS_VERSION_')) {
    exit;
}

class BlockFactura extends Module
{
    public $keyapi;
    public $secretkey;
    public $serie;
    public $days;
    public $urlapi;
    public $urlapi40;
    public $urlapi_dev;
    public $urlapi40_dev;
    public $urlpub;
    public $urlpub_dev;
    public $encabezado;
    public $color_fields;
    public $send_mail;
    public $u_cfdi;
    public $checkbox_dev;

    protected static $factura_fields = array(
    'FACTURA_KEYAPI',
    'FACTURA_SECRETAPI',
    'FACTURA_SERIE',
    'FACTURA_DAYS',
    'FACTURA_ENCABEZADO',
    'FACTURA_COLORS',
    'FACTURA_SENDEMAIL',
    'FACTURA_USOCFDI',
    'FACTURA_SANDBOX',
    );

    public function __construct()
    {
        $this->name = 'blockfactura';
        $this->tab = 'billing_invoicing';
        $this->controllers = array('factura', 'curls', 'process', 'adminblockfactura');
        $this->version = '3.0';
        $this->author = 'factura.com';
        $this->need_instance = 0;
        $this->bootstrap = true;
        $this->module_key = '6eb673a206debeaf7e9ae0b6223e73a8';

        parent::__construct();

        $this->displayName = $this->l('Electronic Invoice');
        $this->description = $this->l('This module lets you create electronic invoice');

        $this->confirmUninstall = $this->l('Confirm uninstall ?');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);

        $config = Configuration::getMultiple(array('FACTURA_KEYAPI', 'FACTURA_SECRETAPI',
        'FACTURA_SERIE', 'FACTURA_DAYS', 'FACTURA_ENCABEZADO', 'FACTURA_COLORS', 'FACTURA_SENDEMAIL', 'FACTURA_USOCFDI','FACTURA_SANDBOX',));

        if (isset($config['FACTURA_KEYAPI'])) {
            $this->keyapi = $config['FACTURA_KEYAPI'];
        }
        if (isset($config['FACTURA_SECRETAPI'])) {
            $this->keysecret = $config['FACTURA_SECRETAPI'];
        }
        if (isset($config['FACTURA_SERIE'])) {
            $this->serie = $config['FACTURA_SERIE'];
        }
        if (isset($config['FACTURA_ENCABEZADO'])) {
            $this->encabezado = $config['FACTURA_ENCABEZADO'];
        }
        if (isset($config['FACTURA_COLORS'])) {
            $this->color_fields = $config['FACTURA_COLORS'];
        }
        if (isset($config['FACTURA_SENDEMAIL'])) {
            $this->send_mail = $config['FACTURA_SENDEMAIL'];
        }
        if (isset($config['FACTURA_DAYS'])) {
            $this->days = $config['FACTURA_DAYS'];
        }
        if (isset($config['FACTURA_USOCFDI'])) {
            $this->u_cfdi = $config['FACTURA_USOCFDI'];
        }
        if (isset($config['FACTURA_SANDBOX'])) {
            $this->checkbox_dev = $config['FACTURA_SANDBOX'];
        }

        //urls_producción
        $this->urlapi = 'https://factura.com/api/v1/';
        $this->urlapi40 = 'https://factura.com/api/v3/cfdi40/';
        $this->urlpub = 'https://factura.com/api/publica/cfdi40/';

        //urls_sandbox
        $this->urlapi_dev = 'https://sandbox.factura.com/api/v1/';
        $this->urlapi40_dev = 'https://sandbox.factura.com/api/v3/cfdi40/';
        $this->urlpub_dev = 'https://sandbox.factura.com/api/publica/cfdi40/';

        //defined version
        $version = _PS_VERSION_;
        $exp = explode('.', $version);
        $this->version_ps = $exp[0] . $exp[1];
    }

    public function install()
    {
        $parent_tab = new Tab();
        // Need a foreach for the language

        $parent_tab->name = array();
        foreach (Language::getLanguages(true) as $lang)
          $parent_tab->name[$lang['id_lang']] = 'Facturacom';
          
        $parent_tab->class_name = 'AdminBlockfactura';
        $parent_tab->id_parent = Tab::getIdFromClassName('AdminAdmin'); // Home tab
        $parent_tab->module = $this->name;
        $parent_tab->add();

        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install() ||
        !$this->registerHook('header') ||
        !$this->registerHook('footer') ||
        !$this->registerHook('displayLeftColumn')
        ) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        $tab = new Tab((int) Tab::getIdFromClassName('AdminBlockfactura'));
        $tab->delete();

        if (!parent::uninstall() ||
        !Configuration::deleteByName('FACTURA_KEYAPI') ||
        !Configuration::deleteByName('FACTURA_SECRETAPI') ||
        !Configuration::deleteByName('FACTURA_SERIE') ||
        !Configuration::deleteByName('FACTURA_DAYS') ||
        !Configuration::deleteByName('FACTURA_ENCABEZADO') ||
        !Configuration::deleteByName('FACTURA_COLORS') ||
        !Configuration::deleteByName('FACTURA_USOCFDI') ||
        !Configuration::deleteByName('FACTURA_SENDEMAIL') ||
        !Configuration::deleteByName('FACTURA_SANDBOX')

        ) {
            return false;
        }
            return true;
    }

    //metodo para validar las variables que vienen del form "back-end"
    private function postValidation()
    {
        if (!Tools::getValue('FACTURA_KEYAPI')) {
            $this->_errors[] = $this->l('The API KEY field is required');
        } elseif (!Tools::getValue('FACTURA_SECRETAPI')) {
            $this->_errors[] = $this->l('The SECRET KEY field is required');
        } elseif (!Tools::getValue('FACTURA_SERIE')) {
            $this->_errors[] = $this->l('The SERIE DE FACTURACIÓN field is required');
        } elseif (Tools::strlen(Tools::getValue('FACTURA_SERIE')) != 1) {
            $this->_errors[] = $this->l('The SERIE DE FACTURACIÓN field must contain one letter (F, G, H)');
        }
        // elseif(!Tools::getValue('FACTURA_DAYS'))
        // $this->_errors[] = $this->l('El campo DÍAS PARA FACTURAR es obligatorio');
    }

    //metodo que muestra la información del módulo
    private function displayInfo()
    {
        return $this->display(__FILE__, 'info.tpl');
    }

    //metodo para crear el nuevo hook en la bd
    private function addHookFactura()
    {
        return Db::getInstance()->execute(
            'INSERT IGNORE INTO`'._DB_PREFIX_.'hook`(`name`,`title`, `description`, `position`)
            VALUES (\'displayHookFactura\', \'Block Factura\', \'Muestra el bloque "Facturacion" en el footer\', 1)'
        );
    }

    //metodo para remover el hook en caso de ser desinstalado el módulo
    private function removeHookFactura()
    {
        return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'hook` WHERE `name` = \'displayHookFactura\'');
    }

    public function hookFooter($params)
    {
        if (!$this->isCached('blockfactura.tpl', $this->getCacheId())) {
            $this->smarty->assign(array(
            'voucherAllowed' => CartRule::isFeatureActive(),
            'returnAllowed' => (int) Configuration::get('PS_ORDER_RETURN'),
            'HOOK_FACURA' => Hook::exec('displayHookFactura'),
            ));
        }

        return $this->display(__FILE__, 'blockfactura.tpl', $this->getCacheId());
    }

    //metodo que carga la vista para el back-end
    public function getContent()
    {
        $html = '';

        if (Tools::isSubmit('botonazo')) {
            $this->postValidation();

            if (!count($this->_errors)) {
                foreach (self::$factura_fields as $fields) {
                    Configuration::updateValue($fields, Tools::getValue($fields));
                }
                $html .= $this->displayConfirmation($this->l('Successful update'));
            } else {
                foreach ($this->_errors as $error) {
                    $html .= $this->displayError($error);
                }
            }
        }

        $html .= $this->displayInfo();

        return $html.$this->displayForm();
    }

    //metodo que genera el formulario
    public function displayForm()
    {

        // Get default language
        $default_lang = (int) Configuration::get('PS_LANG_DEFAULT');

        //--- new ---
        //Load days for billling
        $days_billing = array();

        array_push($days_billing, array('id_option' =>  '0', 'name' => 'No aplicar restricción'));

        for ($i=1; $i < 31; $i++) {
            array_push($days_billing, array('id_option' =>  $i, 'name' => $i . ' días'));
        }
        // --- new ----

        $options = array(
          array(
            'id_option' => 0,
            'name' => $this->l('Send mail manually from the administrator'),
          ),
          array(
            'id_option' => 1,
            'name' => $this->l('Send Mail automatically when you create the invoice'),
          ),
        );

        //UsoCFDI
        $uso_cfdi = array(
          array(
            'id_option' => 'G01',
            'name' => $this->l('Adquisición de mercancias'),
          ),
          array(
            'id_option' => 'G02',
            'name' => $this->l('Devoluciones, descuentos o bonificaciones'),
          ),
          array(
            'id_option' => 'G03',
            'name' => $this->l('Gastos en general'),
          ),
          array(
            'id_option' => 'I01',
            'name' => $this->l('Construcciones'),
          ),
          array(
            'id_option' => 'I02',
            'name' => $this->l('Mobilario y equipo de oficina por inversiones'),
          ),
          array(
            'id_option' => 'I03',
            'name' => $this->l('Equipo de transporte'),
          ),
          array(
            'id_option' => 'I04',
            'name' => $this->l('Equipo de computo y accesorios'),
          ),
          array(
            'id_option' => 'I05',
            'name' => $this->l('Dados, troqueles, moldes, matrices y herramental'),
          ),
          array(
            'id_option' => 'I06',
            'name' => $this->l('Comunicaciones telefónicas'),
          ),
          array(
            'id_option' => 'I07',
            'name' => $this->l('Comunicaciones satelitales'),
          ),
          array(
            'id_option' => 'I08',
            'name' => $this->l('Otra maquinaria y equipo'),
          ),
          array(
            'id_option' => 'D01',
            'name' => $this->l('Honorarios médicos, dentales y gastos hospitalarios'),
          ),
          array(
            'id_option' => 'D02',
            'name' => $this->l('Gastos médicos por incapacidad o discapacidad'),
          ),
          array(
            'id_option' => 'D03',
            'name' => $this->l('Gastos funerales'),
          ),
          array(
            'id_option' => 'D04',
            'name' => $this->l('Donativos'),
          ),
          array(
            'id_option' => 'D05',
            'name' => $this->l('Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)'),
          ),
          array(
            'id_option' => 'D06',
            'name' => $this->l('Aportaciones voluntarias al SAR'),
          ),
          array(
            'id_option' => 'D07',
            'name' => $this->l('Primas por seguros de gastos médicos'),
          ),
          array(
            'id_option' => 'D08',
            'name' => $this->l('Gastos de transportación escolar obligatoria'),
          ),
          array(
            'id_option' => 'D09',
            'name' => $this->l('Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones'),
          ),
          array(
            'id_option' => 'D10',
            'name' => $this->l('Pagos por servicios educativos (colegiaturas)'),
          ),
          array(
            'id_option' => 'S01',
            'name' => $this->l('Sin efectos fiscales'),
          ),
        );

        // Init Fields form array
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('API KEY: '),
                        'name' => 'FACTURA_KEYAPI',
                        'required' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('SECRET KEY: '),
                        'name' => 'FACTURA_SECRETAPI',
                        'required' => true,
                    ),
                    array(
                      'type' => 'switch',
                      'label' => $this->l('SANDBOX'),
                      'name' => 'FACTURA_SANDBOX',
                      'required' => true,
                      'is_bool' => true,
                      'values' => array(
                        array(
                          'id' => 'active_on',
                          'value' => 1,
                          'label' => $this->l('Yes')
                        ),
                        array(
                          'id' => 'active_off',
                          'value' => 0,
                          'label' => $this->l('No')
                        )
                      ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Billing Series: '),
                        'name' => 'FACTURA_SERIE',
                        'size' => 1,
                        'required' => true,
                    ),
                    array(
                       'type' => 'select',
                       'label' => $this->l('Uso de Cfdi: '),
                       'name' => 'FACTURA_USOCFDI',
                       'required' => true,
                       'desc' => $this->l('Deberá indicar cuál es el uso que el receptor del comprobante le dará al mismo'),
                       'options' => array(
                          'query' => $uso_cfdi,
                          'id' => 'id_option',
                          'name' => 'name'
                       )
                     ),
                   array(
                     'type' => 'color',
                     'label' => $this->l('Choose the color of your fields: '),
                     'name' => 'FACTURA_COLORS',
                     'required' => true,
                    ),
                  array(
                    'type' => 'textarea',
                    'label' => $this->l('Customer header information (optional): '),
                    'name' => 'FACTURA_ENCABEZADO',
                   ),
                  array(
                     'type' => 'select',
                     'label' => $this->l('Email delivery options: '),
                     'name' => 'FACTURA_SENDEMAIL',
                     'required' => true,
                     'options' => array(
                        'query' => $options,
                        'id' => 'id_option',
                        'name' => 'name'
                     )
                   ),
                  array(
                     'type' => 'select',
                     'label' => $this->l('Días permitidos para facturar (Después de terminado el mes)'),
                     'name' => 'FACTURA_DAYS',
                     'required' => true,
                     'desc' => $this->l('Seleccione una opción'),
                     'options' => array(
                       'query' => $days_billing,
                       'id' => 'id_option',
                       'name' => 'name'
                     )
                   ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );

        $helper = new HelperForm();

        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        // Language
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;

        // Title and toolbar
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;        // false -> remove toolbar
        $helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
        $helper->submit_action = 'botonazo';
        $this->fields_form = array();

        $helper->tpl_vars = array(
            'fields_value' => array(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        foreach (self::$factura_fields as $field) {
            $helper->tpl_vars['fields_value'][$field] = Tools::getValue($field, Configuration::get($field));
        }

        return $helper->generateForm(array($fields_form));
    }
}
