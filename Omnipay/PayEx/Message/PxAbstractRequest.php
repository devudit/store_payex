<?php

namespace Omnipay\PayEx\Message;

use Omnipay\Api\Px;
use Omnipay\Common\Message\AbstractRequest;
/**
 * Payex AbstractRequest Class
 * @package Omnipay\PayEx\Message
 */
abstract class PxAbstractRequest extends AbstractRequest
{
    public function getAccountNumber()
    {
        return intval($this->getParameter('accountNumber'));
    }

    public function setAccountNumber($value)
    {
        return $this->setParameter('accountNumber', $value);
    }

    public function getEncryptionKey()
    {
        return $this->getParameter('encryptionKey');
    }

    public function setEncryptionKey($value)
    {
        return $this->setParameter('encryptionKey', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getTestMode()
    {
        return ($this->getParameter('testMode') == 'true') ? true : false;
    }

    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    public function getVat()
    {
        if (trim($this->getParameter('vat')) == '') {
            return 0;
        } else {
            return intval($this->getParameter('vat'));
        }
    }

    public function setVat($value)
    {
        return $this->setParameter('vat', intval($value));

    }

    public function getDescription()
    {
        return $this->getParameter('description');
    }

    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    public function getPxObject(){

        $px = new Px();
        $px->setEnvironment($this->getAccountNumber(),$this->getEncryptionKey(),$this->getTestMode());
        return $px;
    }

}