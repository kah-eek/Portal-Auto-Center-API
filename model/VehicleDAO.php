<?php 

class VehicleDAO
{

	/**
	* @param clientId CLient's id
	* @return Array List containing the licence plates that came from database
	* @return null Fail in to attempt get the licence plates from database or the query returned no record
	*/
	function getLicencePlateByClientId($clientId)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT placa,id_veiculo FROM view_veiculo_cliente WHERE id_cliente = ?');
	    $stmt->bindParam(1,$clientId);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep the licence plates came from database
	    $licencePlates = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($licencePlate = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$licencePlates[] = $licencePlate;
	    	}

	    	return $licencePlates;
	    }

	    return null;
	}


}

?>