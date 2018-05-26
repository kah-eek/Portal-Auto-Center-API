<?php 

// @author Caique M. Oliveira
// @data 25/05/2018
// @description State class with access to database
class StateDAO
{
	/**
	* Get all states existents into database
	* @return array Array containing all states existents into database
	* @return array Array null in fail to try to get existents states into database
	*/
	function getStates()
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM tbl_estado');
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep states that came from database
	    $states = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($state = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$states[] = $state;
	    	}

	    	return $states;
	    }

	    return null;
	}
}


?>