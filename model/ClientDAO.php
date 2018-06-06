<?php 

// @author Caique M. Oliveira
// @data 24/05/2018
// @description Client class with access to database
class ClientDAO
{

	/**
	* Insert new client into database  
	* @return PDO Object containing the client's id
	* @return -1 Client not was inserted into database with success
	*/
	function signUp($addressObj,$userObj,$clientObj)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare(
	    	'CALL sp_insert_cliente
			(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,
			    @response
			);
			SELECT @response'
	    );
	    $stmt->bindParam(1,$addressObj->street);
	    $stmt->bindParam(2,$addressObj->number);
	    $stmt->bindParam(3,$addressObj->city);
	    $stmt->bindParam(4,$addressObj->stateId);
	    $stmt->bindParam(5,$addressObj->zipCode);
	    $stmt->bindParam(6,$addressObj->neighborhood);
	    $stmt->bindParam(7,$addressObj->complement);
	    $stmt->bindParam(8,$userObj->usuario);
	    $stmt->bindParam(9,$userObj->senha);
	    $stmt->bindParam(10,$userObj->idNivelUsuario);
	    $stmt->bindParam(11,$clientObj->nome);
	    $stmt->bindParam(12,$clientObj->dtNasc);
	    $stmt->bindParam(13,$clientObj->cpf);
	    $stmt->bindParam(14,$clientObj->email);
	    $stmt->bindParam(15,$clientObj->telefone);
	    $stmt->bindParam(16,$clientObj->fotoPerfil);
	    $stmt->bindParam(17,$clientObj->celular);
	    $stmt->bindParam(18,$clientObj->sexo);
		
		// Keep the insert answer
		$insert = false;

	    // Verify if insert has succeed	    	
	    if($stmt->execute())
	    {
	    	$insert = true;
	    }

    	// Close connection to database
	    $con = null;

	    if ($insert) 
	    {
	    	while ($sp = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		return $sp->response; 
	    	}
	    }

	    return -1;
	}

	/**
	* Get client's data conform authentication informed  
	* @return PDO Object containing the client's data
	* @return null Client not found by authentication data or fail in attempt to get client's data in database
	*/
	function getClientByAuthentication($authenticationObj)
	{
		// Get MySql instance to connect to database
	    $mysql = new MySql();

	    // Get connection to database
	    $con = $mysql->getConnection();

	    $stmt = $con->prepare('SELECT * FROM view_cliente WHERE usuario = ? AND senha = ?');
	    $stmt->bindParam(1,$authenticationObj->username);
	    $stmt->bindParam(2,$authenticationObj->password);
	    $stmt->execute();

    	// Close connection to database
	    $con = null;

	    // Verify if select got some results
	    if ($stmt->rowCount() > 0) 
	    {
	    	while ($clientData = $stmt->fetch(PDO::FETCH_OBJ)) 
	    	{
	    		return $clientData;
	    	}
	    }

	    return null;
	} 
}

?>