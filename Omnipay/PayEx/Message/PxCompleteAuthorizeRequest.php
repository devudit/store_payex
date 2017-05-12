<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 27/07/16
 * Time: 1:58 PM
 */

namespace Omnipay\PayEx\Message;

use Omnipay\Common\Exception\InvalidResponseException;

class PxCompleteAuthorizeRequest extends PxAbstractRequest
{
    public function getData()
    {

        $order_ref = $this->httpRequest->query->get('orderRef');
        $hash = $this->httpRequest->query->get('H');
        $act = $this->httpRequest->query->get('ACT');

        if(empty($order_ref)){
            throw new InvalidResponseException('Invalid Order Reference');
        }

        if(empty($hash)){
            throw new InvalidResponseException('Invalid Hash');
        }

        $data = array(
            'accountNumber' => $this->getAccountNumber(),
            'orderRef' => $order_ref
        );

        $res = $this->getPxObject()->Complete($data);

        if($res['errorCode'] !== 'OK'){
            throw new InvalidResponseException($res['errorCode'].'-'.$res['description']);
        }

        if($res['transactionStatus'] == '5'){
            throw new InvalidResponseException($res['transactionErrorCode'].'-'.$res['errorDetails']);
        }

        return $res;
    }

    public function sendData($data)
    {
        return $this->response = new PxCompleteAuthorizeResponse($this, $data);
    }

}