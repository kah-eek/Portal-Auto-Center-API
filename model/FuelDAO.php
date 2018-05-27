<?php 

// @author Caique M. Oliveira
// @data 27/05/2018
// @description Fuel class with access to database
class FuelDAO
{

	/**
	* Get all fuels existents from database 
	* @return Array Array containing the fuels objects that came from database
	* @return null Fail in to attemp get data from database or returned non record
	*/
	function getFuels()
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM tbl_tipo_combustivel');
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep the fuels came from database
	    $fuels = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($fuel = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$fuels[] = $fuel;
	    	}

	    	return $fuels;
	    }

	    return null;
	} 

}

?>