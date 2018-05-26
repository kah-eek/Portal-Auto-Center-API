<?php 

 // @author Caique M. Oliveira
// @data 25/05/2018
// @description State Class
class State
{

	// Attributes
	public $idEstado;
	public $estado;


	// Constructor default
	function __constructor($estado,$idEstado)
	{
		$this->estado = $estado;
		$this->idEstado = $idEstado;
	}

	/**
	* Get all states existents into database
	* @return array Array containing all states existents into database
	* @return array Array null in fail to try to get existents states into database
	*/
	function getStates()
	{
		$stateDAO = new StateDAO();
		return $stateDAO->getStates();
	}



}


?>