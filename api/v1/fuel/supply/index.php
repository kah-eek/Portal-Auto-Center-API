<?php 
	
	require_once('../../../../controller/MySql.php');
	require_once('../../../../controller/FuelSupply.php');
	require_once('../../../../model/FuelSupplyDAO.php');

	$error = '';
	$fuelSupplies = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		
		// Get all fuel supplies from database by client id
		$fuelSupplies = FuelSupply::getFuelSuppliesByClientId($_GET['clientId']);

		// foreach($fuelsList as $fuelObj)
		// {
		// 	$fuelsList[] = $fuelObj;
		// }

		if(sizeOf($fuelSupplies) != 0)
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
		'fuelSupplies'=>$fuelSupplies,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>