<?php 
	
	require_once('../../../../controller/MySql.php');
	require_once('../../../../controller/Service.php');
	require_once('../../../../model/ServiceDAO.php');

	$error = '';
	$providers = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$providers = Service::getServiceProvidersByServiceName($_GET['service']);

		// foreach($providers as $providerObj)
		// {
		// 	$providers[] = $providerObj;
		// }

		if(sizeOf($providers) != 0)
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
		'provedores'=>$providers,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>
