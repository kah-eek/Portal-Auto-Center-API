<?php

namespace Pagarme\Pagarme;

class Exception
{
    /**
     * @param \Zend\Http\Response $responseObject
     * @throws \Exception
     */
    public function generateExpetion(\Zend\Http\Response $responseObject)
    {
        $exception = [
            'code'      => $responseObject->getStatusCode(),
            'message'   => json_decode($responseObject->getBody(),true)
        ];

        throw new \Exception(json_encode($exception));
    }
}