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

	/**
	* Get all service providers existents into database by service's name
	* @return array Array containing all service providers existents into database
	* @return array Array null in fail to try to get existents service providers into database
	*/
	function getServiceProvidersByServiceName($serviceName)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_prestadores_servicos WHERE nome LIKE ?');
	    $stmt->bindParam(1,$serviceName);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep service providers that came from database
	    $providers = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($providerObj = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$providers[] = $providerObj;
	    	}

	    	return $providers;

	    }

	    return null;
	}

	/**
	* Get service's details existents into database by partner id
	* @return PDO (FETCH_OBJ) Containing all service's details existents into database
	* @return null Fail to try to get service's details existent into database
	*/
	function getServiceDetailsByPartner($partnerId)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_servico_detalhado WHERE id_parceiro = ?');
	    $stmt->bindParam(1,$partnerId);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($serviceObj = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		return $serviceObj;
	    	}

	    }

	    return null;
	}

	/**
	* Get all service existents into database by client id
	* @return Array Array containing all service
	* @return null Fail to try to get service existents into database
	*/
	function getServicesByClientId($clientId)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_servico_prestado WHERE (id_tipo_situacao_pedido = 1 OR id_tipo_situacao_pedido = 6) AND id_cliente = ?');
	    $stmt->bindParam(1,$clientId);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep accomplished services
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