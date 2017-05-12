<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 22/07/16
 * Time: 5:53 PM
 */

namespace Omnipay\PayEx\Message;

class PxCaptureRequest extends PxAbstractRequest
{

    public function getData()
    {

        $this->validate('transactionReference', 'amount');

        $data = array();
        $data['accountNumber'] = $this->getAccountNumber();
        $data['transactionNumber'] = $this->getTransactionReference();
        $data['amount'] = $this->getAmount() * 100;
        $data['orderId'] = $this->getOrderId();
        $data['vatAmount'] = $this->getVat();
        $data['additionalValues'] = '';

        $data = $this->getPxObject()->Capture5($data);

        return $data;

    }

    public function sendData($data)
    {
        return $this->response = new PxCaptureResponse($this, $data);

    }

}