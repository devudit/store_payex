<?php

namespace Omnipay\PayEx;

use Omnipay\Common\AbstractGateway;

/**
 * Store Check payment gateway
 *
 * This is an example of a custom gateway. It simply extends the existing
 * Omnipay Manual payment gateway.
 *
 * For more information about developing custom gateways, please see
 * https://github.com/omnipay/omnipay
 */
/*
 * Live Details
 * accountNumber = 30947479
 * encryptionKey = khzN7vrmHvinx2nWmAhD
 */

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'PayEx';
    }

    public function getDefaultParameters()
    {
        return array(
            'accountNumber' => '83157690',
            'encryptionKey' => 'uAcjb8UFz9h2xCCqz3Yz',
            'language' => array(
                'English' => 'en-US',
                'Swedish' => 'sv-SE',
                'Norway' => 'nb-NO',
                'Danish' => 'da-DK',
                'Spanish' => 'es-ES',
                'German' => 'de-DE',
                'Finnish' => 'fi-FI',
                'French' => 'fr-FR',
                'Polish' => 'pl-PL',
                'Czech' => 'cs-CZ',
                'Hungarian' => 'hu-HU'
            ),
            'vat' => '0',
            'testMode' => array(
                'True' => 'true',
                'False' => 'false'
            ),
        );
    }

    public function getAccountNumber()
    {
        return $this->getParameter('accountNumber');
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

    public function getVat()
    {
        return $this->getParameter('vat');
    }

    public function setVat($value)
    {
        return $this->setParameter('vat', intval($value));
    }

    public function getTestMode()
    {
        return ($this->getParameter('testMode') == 'true') ? true : false;
    }

    public function setTestMode($value)
    {
        return $this->setParameter('testMode', $value);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayEx\Message\PxAuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayEx\Message\PxCaptureRequest', $parameters);
    }

    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayEx\Message\PxCompleteAuthorizeRequest', $parameters);
    }

}
