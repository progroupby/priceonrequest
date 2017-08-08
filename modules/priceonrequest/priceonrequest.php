<?php
if (!defined('_PS_VERSION_'))
    exit;
class PriceOnRequest extends Module
{
    public function __construct()
    {
        $this->name = 'priceonrequest';
        $this->tab = 'front_office_features';
        $this->version = '0.0.1';
        $this->author = 'progroup.by';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Price on Request');
        $this->description = $this->l('To the item price on request');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->module_key = '';
    }

    public function install()
    {
        if (!parent::install()
            || !Configuration::updateValue('PRICEONREQUEST_EMAIL', '')
            || !Configuration::updateValue('PRICEONREQUEST_PHONE', '')
            || !$this->registerHook('displayPriceOnRequest')
            || !$this->registerHook('displayProductButtons')
            || !$this->registerHook('header'))
            return false;
        return true;
    }

    public function uninstall()
    {
        if (!Configuration::deleteByName('PRICEONREQUEST_EMAIL')
            || !Configuration::deleteByName('PRICEONREQUEST_PHONE')
            || !parent::uninstall())
            return false;
        return true;
    }

    public function hookDisplayPriceOnRequest($param) {
        $this->smarty->assign('product', $param['product']);
        $this->smarty->assign('email', Tools::getValue('PRICEONREQUEST_EMAIL', Configuration::get('PRICEONREQUEST_EMAIL')));
        return $this->display(__FILE__, 'buttonpriceonrequest.tpl');
    }

    public function hookDisplayProductButtons()
    {
        $this->smarty->assign('product', $this->getProductArray());
        $this->smarty->assign('email', Tools::getValue('PRICEONREQUEST_EMAIL', Configuration::get('PRICEONREQUEST_EMAIL')));
        return $this->display(__FILE__, 'buttonpriceonrequest.tpl');
    }

    public function hookHeader()
    {
        $this->context->controller->addCSS(($this->_path).'views/css/priceonrequest.css', 'all');
        $this->context->controller->addJS(($this->_path).'views/js/priceonrequest.js', 'all');
    }

    public function getContent() {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Price on Request'),
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Email'),
                        'name' => 'PRICEONREQUEST_EMAIL',
                        'desc' => $this->l('email'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Phone'),
                        'name' => 'PRICEONREQUEST_PHONE',
                        'desc' => $this->l('phone'),
                    ),

                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            )
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.
            '&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        return $helper->generateForm(array($fields_form));
    }

    private function getConfigFieldsValues() {
        return array(
            'PRICEONREQUEST_EMAIL' => Tools::getValue('PRICEONREQUEST_EMAIL', Configuration::get('PRICEONREQUEST_EMAIL')),
            'PRICEONREQUEST_PHONE' => Tools::getValue('PRICEONREQUEST_PHONE', Configuration::get('PRICEONREQUEST_PHONE')),
        );
    }

    private function getProductArray() {
        $p = $this->context->controller->getProduct();
        return array (
           'id'=>$p->id,
           'name'=>$p->name,
        );
    }
}