<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Payment class
class Payment
{

	// Attributes
	public $amount;
	public $cardNumber;
	public $cardCvv;
	public $cardExpirationMonth;
	public $cardExpirationYear;
	public $cardHolderName;
	public $paymentMethod;


	// Constructor default
	function __construct
	(
		$amount,
		$cardNumber,
		$cardCvv,
		$cardExpirationMonth,
		$cardExpirationYear,
		$cardHolderName,
		$paymentMethod
	)
	{
		$this->amount = $amount;
		$this->cardNumber = $cardNumber;
		$this->cardCvv = $cardCvv;
		$this->cardExpirationMonth = $cardExpirationMonth;
		$this->cardExpirationYear = $cardExpirationYear;
		$this->cardHolderName = $cardHolderName;
		$this->paymentMethod = $paymentMethod;
	}

	/**
  * Make a payment  
  * @param paymentObj Object Payment that will transferred to payment
  * @param customerObj Object Customer that will inserted on payment
  * @param billingObj Object Billing that will inserted on payment
  * @param orderPaymentObj Object OrderPayment that will inserted on payment
  */
  function makePayment($paymentObj, $customerObj, $billingObj, $orderPaymentObj)
  {
  	$paymentDAO = new PaymentDAO();
  	$paymentDAO->makePayment($paymentObj, $customerObj, $billingObj, $orderPaymentObj);
  }
}


?>