<?php

namespace Pagarme\Pagarme;

use Pagarme\Pagarme;

class EncryptCard extends AbstractPagarme
{
    private $publicKey;

    /**
     * EncryptCard constructor.
     * @param \Pagarme\Pagarme\CardHash $cardHash
     */
    public function __construct($cardHash)
    {
        $this->publicKey = $cardHash->getCardHash();
    }

    /**
     * @param $cardAttributs
     * @return string
     */
    public function generateCardHash($cardAttributs)
    {
        $cardStr = $this->getCardParams($cardAttributs);
        return $this->encryptParams($cardStr);
    }

    /**
     * @param $cardAttributs
     * @return mixed
     */
    private function getCardParams($cardAttributs)
    {
        return sprintf(
            'card_number=%s&card_holder_name=%s&card_expiration_date=%s&card_cvv=%s',
            $cardAttributs['card_number'],
            $cardAttributs['card_holder_name'],
            $cardAttributs['card_expiration_month'] . $cardAttributs['card_expiration_year'],
            $cardAttributs['card_cvv']
        );
    }

    /**
     * @return mixed
     */
    private function getPublicKey()
    {
        return openssl_get_publickey($this->publicKey['public_key']);
    }

    /**
     * @param $cardStr
     * @return string
     */
    private function encryptParams($cardStr)
    {
        openssl_public_encrypt($cardStr,$encrypt, $this->getPublicKey());
        return $this->publicKey['id'].'_'.base64_encode($encrypt);
    }
}