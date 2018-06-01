<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/Order.php');
	require_once('../../../model/OrderDAO.php');

	$error = '';
	$message = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{	

		$order = new Order(
			null,
			$_POST['idCliente'],
			$_POST['idProduto'],
			$_POST['dataAgendada'],
			null
		);

		if ($order->requestNewOrder($order)) 
		{
			$status = true;
			$message = 'Pedido realizado com sucesso!';
		}
		else 
		{
			$error = 'Falha ao tentar realizar o pedido';
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
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>