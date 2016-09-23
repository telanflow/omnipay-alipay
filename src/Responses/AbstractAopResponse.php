<?php

namespace Omnipay\Alipay\Responses;

use Omnipay\Common\Message\AbstractResponse;
use function Omnipay\Alipay\Common\array_get;

abstract class AbstractAopResponse extends AbstractResponse
{
    protected $key;


    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->getCode() == '10000';
    }


    public function getCode()
    {
        return $this->getAlipayResponse('code');
    }


    public function getAlipayResponse($key)
    {
        if ($key) {
            return array_get($this->data, "{$this->key}.{$key}");
        } else {
            return array_get($this->data, $this->key);
        }
    }


    public function getMessage()
    {
        return $this->getAlipayResponse('msg');
    }


    public function getSubCode()
    {
        return $this->getAlipayResponse('sub_code');
    }


    public function getSubMessage()
    {
        return $this->getAlipayResponse('sub_msg');
    }
}
