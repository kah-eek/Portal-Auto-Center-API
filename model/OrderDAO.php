<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Order class with access to database
class OrderDAO
{

	/**
	* Insert a new order register into database
	* @param orderObj Object that will be inserted into database
	* @return true Data inserted with succeed
	* @return false Fail in to attemp to insert the data into database
	*/
	function requestNewOrder($orderObj)
	{
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('INSERT INTO tbl_pedido
								(
									id_cliente,
									id_produto,
									data_agendada,
									log_pedido
								)
								VALUES
								(
									?,
								    ?,
								    ?,
								    now()
								)'
							 );
	    $stmt->bindParam(1,$orderObj->idCliente);
	    $stmt->bindParam(2,$orderObj->idProduto);
	    $stmt->bindParam(3,$orderObj->dataAgendada);

	    $response = $stmt->execute();

    	// Close connection to database
	    $con = null;

	    if ($stmt->rowCount() > 0) 
	    {
	    	return true;
	    }

	    return false;

	}
}

?>