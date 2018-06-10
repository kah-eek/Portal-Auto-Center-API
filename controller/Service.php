<?php 

 // @author Caique M. Oliveira
// @data 25/05/2018
// @description State Class
class Service
{

	// Attributes


	// Constructor default
	// function __constructor()
	// {
	// }

	/**
	* Get all services records existents into database
	* @return array Array containing all services records existents into database
	* @return array Array null in fail to try to get existents services records into database
	*/
	static function getServices()
	{
		$serviceDAO = new ServiceDAO();
		return $serviceDAO->getServices();
	}

	/**
	* Get service's details existents into database by partner id
	* @return PDO (FETCH_OBJ) Containing all service's details existents into database
	* @return null Fail to try to get service's details existent into database
	*/
	function getServiceDetailsByPartner($partnerId, $serviceId)
	{
		$serviceDAO = new ServiceDAO();
		return $serviceDAO->getServiceDetailsByPartner($partnerId, $serviceId);
	}

	/**
	* Get all service providers existents into database by service's name
	* @return array Array containing all service providers existents into database
	* @return array Array null in fail to try to get existents service providers into database
	*/
	static function getServiceProvidersByServiceName($serviceName)
	{
		$serviceDAO = new ServiceDAO();
		return $serviceDAO->getServiceProvidersByServiceName($serviceName);
	}

	/**
	* Get all service existents into database by client id
	* @return Array Array containing all service
	* @return null Fail to try to get service existents into database
	*/
	function getServicesByClientId($clientId)
	{
		$serviceDAO = new ServiceDAO();
		return $serviceDAO->getServicesByClientId($clientId);
	}



}


?>