<?php 
	
	require_once('../../../controller/Authentication.php');
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/Client.php');
	require_once('../../../model/AuthenticationDAO.php');
	require_once('../../../model/ClientDAO.php');

	$error = '';
	$client = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$authentication = new Authentication($_POST['usuario'],$_POST['senha']);

		if($authentication->existsCredencial($authentication))
		{
			$client = Client::getClientByAuthentication($authentication);
			$status = true;
		}
		else 
		{
			$error = 'Usuário ou senha incorreta!';
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
		'client'=>$client,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>