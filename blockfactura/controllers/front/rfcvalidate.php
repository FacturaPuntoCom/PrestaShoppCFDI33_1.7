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

class Rfcvalidate
{
  /**
  * Check for rfc validity
  *
  * @param string $rfc Moral and Fisica person
  * @return bool Validity is ok or not
  */
    public static function isRfc($rfc)
    {
        return !empty($rfc) && preg_match('/^[a-zA-z]{3,4}\d{6}[a-zA-Z0-9]{3}$/', $rfc);
    }
}
