<?php

namespace Pagarme\Pagarme;

abstract class AbstractPagarme extends Exception
{
    const METHOD_POST   = 'POST';
    const METHOD_GET    = 'GET';

    /**
     * @param $method
     * @param $params
     * @return $this
     */
    public function __call($method, $params)
    {
        $attributes     = [];
        $request        = substr($method, 0, 3);
        $varRequested   = substr($method, 3);

        $varInArray = false;

        if ($request != 'get' && $request !='set' || !$varInArray) {
            $attribute = substr($method, 3);
        }

        switch ($request) {
            case('get'):
                return $this->{$attribute};
            case('set'):
                $this->{$attribute} = $params[0];
                return $this;
        }
    }

    /**
     * @param $objectData
     * @return $this
     */
    public function setDataInObject($objectData)
    {
        $body = json_decode($objectData->getBody(),true);
        unset($body['object']);
        $this->prepareObject($body);

        return $this;
    }

    /**
     * @param $objectData
     * @return $this|AbstractPagarme
     */
    private function prepareObject($objectData)
    {
        foreach ($objectData as $key => $value) {

            if (is_array($value)) {
                $setter = $this->prepareArrayObject($value);
            }else {
                $setter = $value;
            }

            $attribute = $this->camelCase('set_'.$key);
            $this->__call($attribute,[$setter]);
        }

        return $this;
    }

    /**
     * @param $objectArray
     * @return array
     */
    private function prepareArrayObject($objectArray)
    {
        $array = array();

        foreach ($objectArray as $object) {
            $array[] = $this->prepareObject($object);
        }

        return $array;
    }

    /**
     * @param $method
     * @return $this
     */
    protected function request($method,$params = null)
    {
        $responseRequest = $this->adapter->sendRequest($method,$params);
        $objectResponseRequest = $this->setDataInObject($responseRequest);

        if (isset($objectResponseRequest->Errors)) {
            throw new \Exception($this->prepareErrorMessage($objectResponseRequest));
        }

        return $this;
    }

    /**
     * @param $str
     * @param array $noStrip
     * @return mixed
     */
    private function camelCase($str, array $noStrip = [])
    {
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
    }
}