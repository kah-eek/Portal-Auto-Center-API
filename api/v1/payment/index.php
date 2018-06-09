<?php 
	
    require_once('../../../pagarme-php/Pagarme.php');
	require_once('../../../controller/OrderPayment.php');
	require_once('../../../controller/Billing.php');
	require_once('../../../controller/Customer.php');
	require_once('../../../controller/Payment.php');
	require_once('../../../model/PaymentDAO.php');

	$error = '';
	$message = '';
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// Payment
		$payment = new Payment(
			$_POST['amount'],
			// Numero valido
			// "4096029760098117",
			// Numero invalido
			// "4096029760091111",
			// Test
			"4111111111111111",
			// $_POST['cardNumber'],
			"123",
			// $_POST['cardCvv'],
			"09",
			// $_POST['cardExpirationMonth'],
			"22",	
			// $_POST['cardExpirationYear'],
			$_POST['cardHolderName'],
			$_POST['paymentMethod']
		);

		// Customer
		$customer = new Customer(
			$_POST['name'],
			$_POST['cpf'],
			$_POST['phoneNumber'],
			$_POST['email']
		);

		// Billing
		$billing = new Billing(
			$_POST['name'],
    		array(
    			"country" => $_POST['country'],
				"street" => $_POST['street'],
				"street_number" => $_POST['street_number'],
				"state" => $_POST['state'],
				"city" => $_POST['city'],
				"neighborhood" => $_POST['neighborhood'],
				"zipcode" => $_POST['zipcode']
    		)
		);

		// OrderPayment
		$orderPayment = new OrderPayment(
			$_POST['id'],
			$_POST['title'],
			$_POST['unitPrice'],
			$_POST['quantity'],
			$_POST['tangible']
		);

		try 
		{
			// Make payment
			$payment->makePayment($payment, $customer, $billing, $orderPayment);

			$status = true;
			$message = 'Compra efetuada com sucesso';
		} 
		catch (Exception $e) 
		{
			// throw $e;
			$error = 'Falha ao tentar efetuar a compra deste produto';
		}

	}
	else 
	{
    	// Preenche o erro com o respectivo motivo
    	$error = 'Method not allowed';
	}

	$response = array(
		'error'=>$error,
		'status'=>$status,
		'mensagem'=>$message,
	);

	// Show response to client
	// echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>