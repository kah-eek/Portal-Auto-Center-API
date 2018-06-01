<?php

namespace Pagarme\Tests\Pagarme;

use Pagarme\Pagarme;

class CardHashTest extends \PHPUnit_Framework_TestCase
{
    protected $pagarme;
    protected $mockTransaction;

    /**
     * @return Pagarme\EncryptCard
     */
    public function testCreateCard()
    {
        $pagarme = new Pagarme('ak_test_hFnW2y4Eg6ddTZQ0Mpa95TU5uWQXDr');
        $this->prepareTransaction();

        $cardModel  = $pagarme->createCard();
        $cardHash   = $cardModel->generateCardHash($this->mockTransaction);
        
    }

    /**
     * @return $this
     */
    private function prepareTransaction()
    {
        $this->mockTransaction = array(
            "amount" => '1000',
            "card_number" => "4901720080344448",
            "card_holder_name" => "Jose da Silva",
            "card_expiration_month" => '12',
            "card_expiration_year" => '22',
            "card_cvv" => "123",
        );

        return $this;
    }
}
