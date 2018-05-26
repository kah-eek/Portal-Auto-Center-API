<?php 

// @author Caique M. Oliveira
// @data 26/05/2018
// @description Product class with access to database
class ProductDAO
{

	/**
	* Get all products' minified information from database 
	* @return Array Array containing the products objects that came from database
	* @return null Fail in to attemp get data from database or returned non record
	*/
	function getProductsMinInfo()
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_produto_min_info GROUP BY id_produto');
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep the products came from database
	    $products = array();

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($product = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		$products[] = $product;
	    	}

	    	return $products;
	    }

	    return null;
	} 

	/**
	* Get product's basic informations from database 
	* @return Array Array containing the product object that came from database
	* @return null Fail in to attemp get data from database or returned non record
	*/
	function getProductBasicInfoById($productId)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_produto WHERE id_produto = ? GROUP BY id_produto');
	    $stmt->bindParam(1,$productId);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($product = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		return $product;
	    	}

	    }

	    return null;
	} 

}

?>