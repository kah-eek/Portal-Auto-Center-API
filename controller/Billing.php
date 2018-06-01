<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Billing class
class Billing
{

    // Attributes
    public $name;
    public $address;

    // Constructor default
    function __construct
    (
        $name,
        $address
    )
    {
        $this->name = $name;
        $this->address = $address;
    }

}


?>