<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Fuel Supply class with access to database
class ServiceDAO
{
	/**
	* Get all services records existents into database
	* @return array Array containing all services records existents into database
	* @return array Array null in fail to try to get existents services records into database
	*/
	function getServices()
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT id_produto, id_parceiro, id_categoria_produto, nome, preco, descricao, observacao FROM tbl_produto WHERE id_categoria_produto = 2');
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep services that came from database
	    $services = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($service = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$services[] = $service;
	    	}

	    	return $services;
	    }

	    return null;
	}
}


?>