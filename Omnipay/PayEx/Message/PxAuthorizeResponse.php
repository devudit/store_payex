<?php

namespace Omnipay\PayEx\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\RedirectResponseInterface;


class PxAuthorizeResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $redirect_url = null;

    public function __construct(RequestInterface $request, $redirect_url)
    {
        $this->request = $request;
        $this->redirect_url = $redirect_url;
    }

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return null;
    }
}