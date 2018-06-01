<?php

namespace Pagarme\Pagarme;

use Pagarme\Pagarme;

class CardHash extends EncryptCard
{
    public $requestAttributs    = array();
    public $responseAttributs   = array();

    private $adapter;

    /**
     * CardHash constructor.
     * @param Pagarme $adapter
     */
    public function __construct(Pagarme $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return array
     */
    public function getCardHash()
    {
        return $this->adapter->sendRequest(self::METHOD_GET);
    }

    /**
     * @param $params
     */
    public function createCard($params)
    {
        return $this->adapter->sendRequest($params);
    }
}
