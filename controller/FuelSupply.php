<?php 

 // @author Caique M. Oliveira
// @data 31/05/2018
// @description Fuel Supply Class
class FuelSupply
{

	// Attributes

	// Constructor default
	// function __constructor()
	// {
	// }

	/**
	* Get all fuel supplies records existents into database by client id
	* @return array Array containing all fuel supplies records existents into database
	* @return array Array null in fail to try to get existents fuel supplies records into database
	*/
	static function getFuelSuppliesByClientId($clientId)
	{
		$fuelSupplyDAO = new FuelSupplyDAO();
		return $fuelSupplyDAO->getFuelSuppliesByClientId($clientId);
	}



}


?>