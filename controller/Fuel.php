<?php 

// @author Caique M. Oliveira
// @data 27/05/2018
// @description Fuel Class
class Fuel
{

	// Attributes


	// Constructor default
	// function __constructor(){}

	/**
	* Get all fuels existents from database 
	* @return Array Array containing the fuels objects that came from database
	* @return null Fail in to attemp get data from database or returned non record
	*/
	static function getFuels()
	{
		$fuelDAO = new FuelDAO();
		return $fuelDAO->getFuels();
	}



}


?>