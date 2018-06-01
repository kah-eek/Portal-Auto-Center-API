<?php

namespace Pagarme\Pagarme;
use \Raven_Client;
use SebastianBergmann\Exporter\Exception;

class ReportErrorLog
{
    const DSN = 'https://c113fa2a3454467591591e8caf66f2cd:87fd39cbf69e4f7696274fc583c998f2@app.getsentry.com/74729';
    protected $client;
    protected $clientAddress;

    public function __construct()
    {
        $this->client = new Raven_Client(self::DSN);
    }

    /**
    * @params string $message
    * @return $this
    **/
    public function sendMessage($message)
    {
        $this->client->getIdent($this->client->captureMessage($message));
        return $this;
    }

    /**
    * @params object $exception
    * @return $this
    **/
    public function sendException($exception)
    {
        $this->client->getIdent($this->client->captureException($exception, array(
            'extra' => array(
                'php_version' => phpversion()
            )
        )));
        return $this;
    }
}
