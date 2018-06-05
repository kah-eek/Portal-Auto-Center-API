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

	    $stmt = $con->prepare('SELECT * FROM view_produto_min_info WHERE id_categoria_produto != 2 GROUP BY id_produto;');
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

	/**
	* Get all sold products from database by client id
	* @return Array Array containing all sold products
	* @return null Fail to try to get all sold products from database
	*/
	function getProductsByClientId($clientId)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_produtos_vendidos WHERE (id_tipo_situacao_pedido = 7 OR id_tipo_situacao_pedido = 9) AND id_cliente = ?');
	    $stmt->bindParam(1,$clientId);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Keep all sold products
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

}

?>