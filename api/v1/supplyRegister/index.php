<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/SupplyRegister.php');
	require_once('../../../model/SupplyRegisterDAO.php');

	$error = '';
	$status = false;
	$message = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

    	// echo $_POST["idTipoCombustivel"];
    	// echo $_POST["idVeiculoCliente"];
    	// echo $_POST["valorAbastecimento"];
    	// echo $_POST["latitude"];
    	// echo $_POST["longitude"];

	
		$supplyRegister = new SupplyRegister(
			null,
			$_POST["idTipoCombustivel"],
			$_POST["idVeiculoCliente"],
			$_POST["valorAbastecimento"],
			$_POST["latitude"],
			$_POST["longitude"],
			null
		);

		var_dump($supplyRegister);

		if($supplyRegister->setSupplyRegister($supplyRegister))
		{
			$status = true;
			$message = 'Abastecimento registrado com sucesso!';
		}
		else 
		{
			$error = 'Falha ao tentar registrar o abastecimento';
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
		'mensagem'=>$message
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>