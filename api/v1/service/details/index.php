<?php 
	
	require_once('../../../../controller/MySql.php');
	require_once('../../../../controller/Service.php');
	require_once('../../../../model/ServiceDAO.php');

	$error = '';
	$service = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$service = new Service();
		$service = $service->getServiceDetailsByPartner($_GET['partnerId']);

		if($service != null)
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
		'service'=>$service,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>