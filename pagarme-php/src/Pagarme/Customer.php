<?php

namespace Pagarme\Pagarme;

use Pagarme\Pagarme;

class Customer extends Pagarme
{
    public $requestAttributs    = array();
    public $responseAttributs   = array();

    protected $adapter;

    /**
     * CardHash constructor.
     * @param Pagarme $adapter
     */
    public function __construct(Pagarme $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return $this
     */
    public function create()
    {
        $this->setEndpoint('customers');
        return $this->request(self::METHOD_POST);
    }

    /**
     * @param $id
     * @return $this
     * @throws \Exception
     */
    public function getById($id)
    {
        $this->setEndpoint('customers',array($id));
        return $this->request($this->adapter,self::METHOD_GET);
    }

    /**
     * @param $params
     */
    public function createCard($params)
    {
        return $this->adapter->sendRequest($params);
    }
}
