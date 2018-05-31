<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Fuel Supply class with access to database
class FuelSupplyDAO
{
	/**
	* Get all fuel supplies records existents into database by client id
	* @return array Array containing all fuel supplies records existents into database
	* @return array Array null in fail to try to get existents fuel supplies records into database
	*/
	function getFuelSuppliesByClientId($clientId)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_controle_abastecimento_formatado WHERE id_cliente = ? ORDER BY log_controle_abastecimento');
	    $stmt->bindParam(1,$clientId);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep fuel supplies that came from database
	    $fuelSupplies = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($supply = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$fuelSupplies[] = $supply;
	    	}

	    	return $fuelSupplies;
	    }

	    return null;
	}
}


?>