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

	/**
	* Get all sold products from database by client id
	* @return Array Array containing all sold products
	* @return null Fail to try to get all sold products from database
	*/
	function getProductsByClientId($clientId)
	{
		$productDAO = new ProductDAO();
		return $productDAO->getProductsByClientId($clientId);
	}

	/**
	* Get product's basic informations from database 
	* @return Array Array containing the product object that came from database
	* @return null Fail in to attemp get data from database or returned non record
	*/
	function getProductBasicInfoById($productId)
	{
		$productDAO = new ProductDAO();
		return $productDAO->getProductBasicInfoById($productId);
	}



}


?>
