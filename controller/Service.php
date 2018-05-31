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



}


?>