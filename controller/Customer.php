<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Customer class
class Customer
{

	// Attributes
	public $name;
	public $cpf;
	public $phoneNumber;
	public $email;

	// Constructor default
	function __construct
	(
		$name,
		$cpf,
		$phoneNumber,
		$email
	)
	{
		$this->name = $name;
		$this->cpf = $cpf;
		$this->phoneNumber = $phoneNumber;
		$this->email = $email;
	}

}


?>