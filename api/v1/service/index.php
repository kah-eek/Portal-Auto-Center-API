<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/Service.php');
	require_once('../../../model/ServiceDAO.php');

	$error = '';
	$states = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$services = Service::getServices();

		// foreach($services as $serviceObj)
		// {
		// 	$services[] = $serviceObj;
		// }

		if(sizeOf($services) != 0)
		{
			$status = true;
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
		'servicos'=>$services,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>