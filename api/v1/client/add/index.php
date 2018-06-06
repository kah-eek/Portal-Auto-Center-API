<?php 
	
	require_once('../../../../controller/MySql.php');
	require_once('../../../../controller/Client.php');
	require_once('../../../../controller/User.php');
	require_once('../../../../controller/Address.php');
	require_once('../../../../controller/Image.php');
	require_once('../../../../model/ClientDAO.php');

	$error = '';
	$message = '';
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{	
		// Create a address object
		$address = new Address(
			$_POST['street'],
		    $_POST['number'],
		    $_POST['city'],
		    $_POST['stateId'],
		    $_POST['zipCode'],
		    $_POST['neighborhood'],
		    $_POST['complement']
		);

		// Create a user object
		$user = new User(
			$_POST['usuario'],
			$_POST['senha'],
			null,
			$_POST['idNivelUsuario'],
			null,
			null
		);

		// Create a image object
		$image = new Image(
			$_FILES['fotoPerfil'], 
			$_POST['uploadPath']
		);

		$pic = $image->upload($image) ? $image->endPath : '';

		// Create a client object
		$client = new Client(
			null,
			$_POST['nome'],
			$_POST['dtNasc'],
			$_POST['cpf'],
			$_POST['email'],
			$_POST['celular'],
			null,
			$_POST['sexo'],
			$_POST['telefone'],
			null,
			$pic
		);
		
		// verify id client was inserted into database with success
		if($client->signUp($address,$user,$client) != -1 ) // success
		{
			$status = true;
			$message = 'Cliente cadastrado com sucesso';
		}
		else // fail 
		{
			$error = 'Falha ao tentar cadastrar o cliente';
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