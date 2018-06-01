<?php

namespace Pagarme\Pagarme;
use SebastianBergmann\Exporter\Exception;
use Zend\Http\Client;
use Zend\Http\Request as ZendRequest;
use Pagarme\Pagarme\AbstractPagarme;
use Zend\Http\Client\Adapter\Exception\RuntimeException as AdapterException;
use Zend\Stdlib\Parameters;

class Request extends AbstractPagarme
{
    protected $endpoint;
    private $parameters = [];
    private $client;
    private $request;
    private $params;
    private $response;
    protected $adpter;

    const APPLICATION_JSON = 'application/json';

    /**
     * @param $endpoint
     * @param null $params
     * @return $this|string
     */
    public function setEndpoint($endpoint, $params = null)
    {
        $this->endpoint = $endpoint;

        if ($params) {
            $customParams = null;

            foreach ($params as $param) {
                $customParams .= '/' . $param;
            }
        }

        $this->endpoint = $endpoint . $customParams;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param $method
     * @return $this
     */
    protected function request($adpter, $method,$params = null)
    {
        $this->adpter = $adpter;
        $responseRequest = $this->sendRequest($method,$params);
        $objectResponseRequest = $this->setDataInObject($responseRequest);

        if (isset($objectResponseRequest->Errors)) {
            return $this->generateExpetion($responseRequest);
        }

        return $this;
    }

    /**
     * @param $method
     * @param array $params
     * @return mixed
     */
    public function sendRequest($method,$params = [])
    {
        $this->method = $method;
        $this->params = $params;

        return $this->prepareRequest();
    }

    /**
     * @param $params
     * @return string
     */
    private function prepareRequest()
    {
        $responseRequest = $this->getRequest();
        return $responseRequest;
    }

    /**
     * @return \Zend\Http\Response
     */
    private function getRequest()
    {
        $this->prepareParams();
        return $this->response;
    }

    /**
     * @return Request
     */
    private function prepareParams()
    {
        if ($this->method == 'POST') {
          return $this->requestPost();
        }
        return $this->requestGet();
    }

    /**
     * @return $this
     */
    private function requestGet()
    {
        try {
            $this->client = new Client();
            $this->client->setUri($this->getEndpoint());
            $this->client->setParameterGet($this->getParams());
            $this->response = $this->client->send();
        }catch (\Exception $e) {
            //@Todo implement log sentry
        }
    }

    /**
     * @return $this
     */
    private function requestPost()
    {
        $this->request = new ZendRequest();
        $this->request->setUri($this->getEndPoint());
        $this->request->setMethod('POST');
        $this->request->setPost(new Parameters($this->getParams()));

        try {
            $this->client = new Client();
            $this->response = $this->client->dispatch($this->request);
            return $this->response->getBody();
        } catch (\Exception $e) {
            //@Todo implement log sentry
        }
    }

    /**
     * @return mixed
     */
    private function getParams()
    {
        if ($this->params) {
            return array_merge($this->params, array(
                'api_key' => $this->adpter->getApiKey()
            ));
        }

        return array(
          'api_key' => $this->adpter->getApiKey()
        );
    }
}