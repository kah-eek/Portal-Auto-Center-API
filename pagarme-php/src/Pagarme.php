<?php

namespace Pagarme;

use Pagarme\Pagarme\EncryptCard;
use Pagarme\Pagarme\Request;
use Pagarme\Pagarme\CardHash;
use Pagarme\Pagarme\Customer;

class Pagarme extends Request
{
    public
        $apiKey,
        $method;

    const API_ADDRESS = 'https://api.pagar.me/';
    const API_VERSION = 1;

    /**
     * Pagarme constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->setApiKey($apiKey);
    }

    /**
     * @param $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getEndPoint()
    {
        return self::API_ADDRESS.self::API_VERSION.'/'.$this->endpoint;
    }

    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return CardHash
     */
    public function cardHash()
    {
        return new CardHash($this);
    }

    /**
     * @return EncryptCard
     */
    public function createCard()
    {
        return new EncryptCard($this->cardHash());
    }

    /**
     * @return Customer
     */
    public function customer()
    {
        return new Customer($this);
    }
}
