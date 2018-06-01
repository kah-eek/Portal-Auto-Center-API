<?php

namespace Pagarme\Pagarme;

use Pagarme\Pagarme;

class Transaction
{
    public $requestAttributs    = array();
    public $responseAttributs   = array();

    private $adapter;

    /**
     * Transaction constructor.
     * @param Pagarme $adapter
     */
    public function __construct(Pagarme $adapter)
    {
        $this->adapter = $adapter;
    }

    public function charge($params)
    {
        $this->adapter->sendRequest($params);
    }
}