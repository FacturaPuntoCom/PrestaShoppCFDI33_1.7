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

class Curls
{
    public static function frontCurl($url, $request, $keyapi, $keysecret, $params = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);

        if (!isset($params)) {
            $params = 'no data';
        }

        if ($request == 'post') {
            $dataString = Tools::jsonEncode($params);
            //die($dataString);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'F-PLUGIN: f6a36f158b2b09cae5054e2170d62f750f7e9ff7',
                'F-API-KEY: '.$keyapi,
                'F-SECRET-KEY: '.$keysecret,
            ));
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'F-PLUGIN: f6a36f158b2b09cae5054e2170d62f750f7e9ff7',
                'F-API-KEY: '.$keyapi,
                'F-SECRET-KEY: '.$keysecret,
            ));
        }

        try {
            $data = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            echo 'Exception occured: '.$e->getMessage();
        }

        return $data;
    }
}
