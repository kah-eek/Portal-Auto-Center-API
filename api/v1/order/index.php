<?php 
	
	require_once('../../../controller/MySql.php');
	require_once('../../../controller/Product.php');
	require_once('../../../model/ProductDAO.php');

	$error = '';
	$products = null;
	$status = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// Get specific product information
		if(isset($_GET['id']))
		{
			$product = new Product();
			$products[] = $product->getProductBasicInfoById($_GET['id']);
		}
		else 
		{
			// Get all products' minified information
			$productList = Product::getProductsMinInfo();

			foreach($productList as $producObj)
			{
				$products[] = $producObj;
			}
		}

		if(sizeOf($products) != 0)
		{
			$status = true;
		}

	}
	else 
	{
    	// Preenche o erro com o respectivo motivo
    	$error = 'Method not allowed';
	}

	$response = array(
		'error'=>$error,
		'status'=>$status,
		'produtos'=>$products,
	);

	// Show response to client
	echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>