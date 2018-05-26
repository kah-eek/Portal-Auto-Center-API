<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/State.php');
	require_once('../../../model/StateDAO.php');

	$error = '';
	$states = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{

		$state = new State();
		$stateList = $state->getStates();

		foreach($stateList as $stateObj)
		{
			$states[] = $stateObj;
		}

		if(sizeOf($states) != 0)
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
		'estados'=>$states,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>