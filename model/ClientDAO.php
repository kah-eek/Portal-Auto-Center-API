<?php 

// @author Caique M. Oliveira
// @data 24/05/2018
// @description Client class with access to database
class ClientDAO
{

	/**
	* Get client's data conform authentication informed  
	* @return PDO Object containing the client's data
	* @return null Client not found by authentication data or fail in attempt to get client's data in database
	*/
	function getClientByAuthentication($authenticationObj)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_cliente WHERE usuario = ? AND senha = ?');
	    $stmt->bindParam(1,$authenticationObj->username);
	    $stmt->bindParam(2,$authenticationObj->password);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($clientData = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		return $clientData;
	    	}
	    }

	    return null;
	} 
}

?>