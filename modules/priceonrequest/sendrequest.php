<?php
require_once(dirname(__FILE__).'../../../config/config.inc.php');
require_once(dirname(__FILE__).'../../../init.php');

function sendData($data) {
    if (($data['pid']&&$data['pname'])&&($data['email']&&$data['name'])) {
        $to =  Tools::getValue('PRICEONREQUEST_EMAIL', Configuration::get('PRICEONREQUEST_EMAIL'));
        if ($to)
            Mail::Send((int)(Configuration::get('PS_LANG_DEFAULT')),
                'price_request',
                'Запрос цены товара',
                array(
                    '{product_name}' => $data['pname'],
                    '{product_id}' => $data['pid'],
                    '{name}' => $data['name'],
                    '{email}' => $data['email'],
                    '{phone}' => $data['phone'],
                    '{message}' => $data['message'],
                ),
                $to,
                NULL, NULL, NULL, NULL, NULL,
                dirname(__FILE__));

        return true;
    }
    else return false;
}

switch (Tools::getValue('send')) {
    case 'request' :
        die( sendData(Tools::getValue('data')));
        break;
    default:
        exit;
}
exit;

