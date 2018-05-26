<?php 

 // @author Caique M. Oliveira
// @data 25/05/2018
// @description State Class
class Product
{

	// Attributes
	


	// Constructor default
	

	/**
	* Get all products' minified information from database 
	* @return Array Array containing the products objects that came from database
	* @return null Fail in to attemp get data from database or returned non record
	*/
	static function getProductsMinInfo()
	{
		$productDAO = new ProductDAO();
		return $productDAO->getProductsMinInfo();
	}



}


?>
