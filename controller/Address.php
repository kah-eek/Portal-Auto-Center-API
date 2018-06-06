<?php

// @author Caique M. Oliveira
// @data 05/06/2018
// @description Address class
class Address
{
  // Attributes
  public $street;
  public $number;
  public $city;
  public $stateId;
  public $zipCode;
  public $neighborhood;
  public $complement;

  // Default constructor
  function __construct
  (
    $street,
    $number,
    $city,
    $stateId,
    $zipCode,
    $neighborhood,
    $complement
  )
  {
    $this->street = $street;
    $this->number = $number;
    $this->city = $city;
    $this->stateId = $stateId;
    $this->zipCode = $zipCode;
    $this->neighborhood = $neighborhood;
    $this->complement = $complement;
  }

}



?>
