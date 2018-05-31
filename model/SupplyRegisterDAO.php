<?php 

// @author Caique M. Oliveira
// @data 27/05/2018
// @description Supply register class with access to database
class SupplyRegisterDAO
{

	/**
	* Insert a new supply register into database
	* @param SupplyRegisterObj Object that will be inserted into database
	* @return true Data inserted with succeed
	* @return false Fail in to attemp to insert the data into database
	*/
	function setSupplyRegister($SupplyRegisterObj)
	{
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('INSERT INTO tbl_controle_abastecimento 
								(
									id_tipo_combustivel, 
								    id_veiculo_cliente,
								    quilometro_rodado,
								    valor_abastecimento,
								    latitude,
								    longitude,
								    log_controle_abastecimento
								) 
								VALUES
								(
									?,
								    ?,
								    ?,
								    ?,
								    ?,
								    ?,
								    now()
								)'
							 );
	    $stmt->bindParam(1,$SupplyRegisterObj->idTipoCombustivel);
	    $stmt->bindParam(2,$SupplyRegisterObj->idVeiculoCliente);
	    $stmt->bindParam(3,$SupplyRegisterObj->quilometroRodado);
	    $stmt->bindParam(4,$SupplyRegisterObj->valorAbastecimento);
	    $stmt->bindParam(5,$SupplyRegisterObj->latitude);
	    $stmt->bindParam(6,$SupplyRegisterObj->longitude);

	    $response = $stmt->execute();

    	// Close connection to database
	    $con = null;

	    return $response;
	}
}

?>