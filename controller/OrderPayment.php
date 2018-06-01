<?php 

// @author Caique M. Oliveira
// @data 27/05/2018
// @description Fuel Class
class OrderPayment
{

	// Attributes
	public $id;
	public $title;
	public $unitPrice;
	public $quantity;
	public $tangible;

	// Constructor default
	function __construct
	(
		$id,
		$title,
		$unitPrice,
		$quantity,
		$tangible
	)
	{
		$this->id = $id;
		$this->title = $title;
		$this->unitPrice = $unitPrice;
		$this->quantity = $quantity;
		$this->tangible = $tangible;
	}

}


?>