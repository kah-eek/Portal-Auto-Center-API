<?php 

class Vehicle
{

	/**
	* @param clientId CLient's id
	* @return Array List containing the licence plates that came from database
	* @return null Fail in to attempt get the licence plates from database or the query returned no record
	*/
	static function getLicencePlateByClientId($clientId)
	{
		$vehicleDAO = new VehicleDAO();
		return $vehicleDAO->getLicencePlateByClientId($clientId);
	}

}

?>