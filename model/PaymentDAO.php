<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Payment class with access to database
class PaymentDAO
{
    // require __DIR__.'/pagarme-php/Pagarme.php';

  /**
  * Make a payment  
  * @param paymentObj Object Payment that will transferred to payment
  */
  function makePayment($paymentObj, $customerObj, $billingObj, $orderPaymentObj)
  {
    PagarMe::setApiKey('ak_test_pH1ii84ODQvIediiZ8nrNq2arSIP5Q');

    $transaction = new PagarMe_Transaction(array(
      "amount" => $paymentObj->amount/*10000*/,
      "card_number" => $paymentObj->cardNumber/*"4111111111111111"*/,
      "card_cvv" => $paymentObj->cardCvv/*"123"*/,
      "card_expiration_month" => $paymentObj->cardExpirationMonth/*"09"*/,
      "card_expiration_year" => $paymentObj->cardExpirationYear/*"22"*/,
      "card_holder_name" => $paymentObj->cardHolderName/*"John Doe"*/,
      "payment_method" => $paymentObj->paymentMethod/*"credit_card"*/,
      "customer" => array(
          "external_id" => "1",
          "name" => $customerObj->name/*"John Doe"*/,
          "type" => "individual",
          "country" => "br",
          "documents" => array(
            array(
              "type" => "cpf",
              "number" => $customerObj->cpf/*"00000000000"*/
            )
          ),
          "phone_numbers" => array( "+55".$customerObj->phoneNumber/*"+551199999999"*/ ),
          "email" => $customerObj->email/*"aardvark.silva@pagar.me"*/
      ),
      "billing" => array(
        "name" => $billingObj->name/*"John Doe"*/,
        "address" => array(
            "country" => "br",
            "street" => $billingObj->address['street']/*"Avenida Brigadeiro Faria Lima"*/,
            "street_number" => $billingObj->address['street_number']/*"1811"*/,
            "state" => $billingObj->address['state']/*"sp"*/,
            "city" => $billingObj->address['city']/*"Sao Paulo"*/,
            "neighborhood" => $billingObj->address['neigthborhood']/*"Jardim Paulistano"*/,
            "zipcode" => $billingObj->address['zipcode']/*"01451001"*/
        )
      ),
      "items" => array(
        $orderPaymentObj
        /*array(
          "id" => "ID DO ITEM",
          "title" => "NOME DO ITEM",
          "unit_price" => 10000,
          "quantity" => 1,
          "tangible" => true
        )*/
      )
    ));

    $transaction->charge();
  }
}

?>