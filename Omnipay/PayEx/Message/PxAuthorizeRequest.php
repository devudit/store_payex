<?php
namespace Omnipay\PayEx\Message;

use Omnipay\Common\Exception\InvalidResponseException;

class PxAuthorizeRequest extends PxAbstractRequest
{
    public function getData()
    {
        $data['accountNumber'] = $this->getAccountNumber();
        $data['purchaseOperation'] = 'AUTHORIZATION';
        $data['price'] = intval($this->getAmount()*100);
        $data['priceArgList'] = '';
        $data['currency'] = $this->getCurrency();
        $data['vat'] = $this->getVat();
        $data['orderID'] = $this->getOrderId();
        $data['productNumber'] = $this->getOrderId();
        $data['description'] = $this->getDescription();
        $data['clientIPAddress'] = $this->getClientIp();
        $data['clientIdentifier'] = 'USERAGENT=' . $_SERVER['HTTP_USER_AGENT'];
        $data['additionalValues'] = '';
        $data['externalID'] = '';
        $data['returnUrl'] = $this->getReturnUrl();
        $data['view'] = 'CREDITCARD';
        $data['agreementRef'] = '';
        $data['cancelUrl'] = $this->getCancelUrl();
        $data['clientLanguage'] = $this->getLanguage();

        return $data;
    }

    public function sendData($data)
    {

        $result = $this->getPxObject()->Initialize8($data);

        if($result['code'] == 'OK' && $result['description'] == 'OK' && $result['errorCode'] == 'OK'){

            return $this->response = new PxAuthorizeResponse($this, $result['redirectUrl']);

        } else {

            throw new InvalidResponseException($result['description']);

        }

    }

}