<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 27/07/16
 * Time: 3:13 PM
 */

namespace Omnipay\PayEx\Message;

use Omnipay\Common\Message\AbstractResponse;


class PxCompleteAuthorizeResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        if($this->data['orderStatus'] === "0" && $this->data['errorCode'] == 'OK'){
            return true;
        } else {
            return false;
        }
    }

    public function getTransactionReference()
    {
        return isset($this->data['transactionNumber']) ? $this->data['transactionNumber'] : null;
    }

    public function getMessage()
    {
        return isset($this->data['description']) ? $this->data['description'] : null;
    }

}