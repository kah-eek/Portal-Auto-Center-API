<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/Fuel.php');
	require_once('../../../model/FuelDAO.php');

	$error = '';
	$fuels = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		
		// Get all fuels from database
		$fuelsList = Fuel::getFuels();

		foreach($fuelsList as $fuelObj)
		{
			$fuelsList[] = $fuelObj;
		}

		if(sizeOf($fuelsList) != 0)
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
		'fuels'=>$fuelsList,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>