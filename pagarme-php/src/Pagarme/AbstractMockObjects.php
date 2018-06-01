<?php

namespace Pagarme\Pagarme;

abstract class AbstractMockObjects extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function mockCustomer()
    {
        return array(
            "document_number" => "17104192530",
            "name" => "nome do cliente",
            "email" => "eee@email.com",
            "born_at" => 13121988,
            "gender" => "M",
            "address" => $this->mockCustomerAddress(),
            "phone" => $this->mockCustomerPhone()
        );
    }
    /**
     * @return array
     */
    public function mockCustomerAddress()
    {
        return array(
            "street" => "rua qualquer",
            "complementary" => "apto",
            "street_number" => 13,
            "neighborhood" => "pinheiros",
            "city" => "sao paulo",
            "state" => "SP",
            "zipcode" => "05444040",
            "country" => "Brasil"
        );
    }

    /**
     * @return array
     */
    public function mockCustomerPhone()
    {
        return array(
            "ddi" => 55,
            "ddd" => 11,
            "number" => 999887769
        );
    }
}