<?php

namespace Pagarme\Tests\Pagarme;

use Pagarme\Pagarme;
use Pagarme\Pagarme\AbstractMockObjects;

class CustomerTest extends AbstractMockObjects
{
    protected $pagarme;
    protected $mockTransaction;
    protected $mockCustomerAddress;
    protected $mockCustomerPhone;
    protected $mockCustomer;

    /**
     * Unit Tests - Create Customer
     *
     * @group customer
     */
    public function testCreateCustomer()
    {
        $pagarme = new Pagarme('ak_test_hFnW2y4Eg6ddTZQ0Mpa95TU5uWQXDr');
        $customer = $pagarme->customer();
        $this->mockCustomer = $this->mockCustomer();
        $this->mockCustomerAddress = $this->mockCustomerAddress();
        $this->mockCustomerPhone = $this->mockCustomerPhone();

        $customer->setParams($this->mockCustomer);
        $customer->create();

        $this->assertNotNull($customer->getId());

        $this->assertEquals($customer->getDocumentNumber(), $this->mockCustomer['document_number']);
        $this->assertEquals($customer->getName(), $this->mockCustomer['name']);
        $this->assertEquals($customer->getEmail(), $this->mockCustomer['email']);
        $this->assertEquals($customer->getGender(), $this->mockCustomer['gender']);

        foreach ($customer->getAddresses() as $address) {
            $this->assertEquals($this->mockCustomerAddress['street'], $address['street']);
            $this->assertEquals($this->mockCustomerAddress['complementary'], $address['complementary']);
            $this->assertEquals($this->mockCustomerAddress['street_number'], $address['street_number']);
            $this->assertEquals($this->mockCustomerAddress['neighborhood'], $address['neighborhood']);
            $this->assertEquals($this->mockCustomerAddress['city'], $address['city']);
            $this->assertEquals($this->mockCustomerAddress['zipcode'], $address['zipcode']);
            $this->assertEquals($this->mockCustomerAddress['country'], $address['country']);
        }

        foreach ($customer->getPhones() as $phone) {
            $this->assertEquals($this->mockCustomerPhone['ddi'],$phone['ddi']);
            $this->assertEquals($this->mockCustomerPhone['ddd'],$phone['ddd']);
            $this->assertEquals($this->mockCustomerPhone['number'],$phone['number']);
        }
    }

    /**
     * Unit Tests - Get Customer By Id
     *
     * @group getCustomer
     */
    public function testGetCustomerById()
    {
        $pagarme = new Pagarme('ak_test_hFnW2y4Eg6ddTZQ0Mpa95TU5uWQXDr');
        $customer = $pagarme->customer()->getById(64123);
    }
}
