<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/Vehicle.php');
	require_once('../../../model/VehicleDAO.php');

	$error = '';
	$licencePlates = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$licencePlates = Vehicle::getLicencePlateByClientId($_GET["clientId"]);

		if ($licencePlates != null) 
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
		'licencePlates'=>$licencePlates,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>