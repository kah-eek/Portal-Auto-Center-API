<?php

// @author Caique M. Oliveira
// @data 24/05/2018
// @description Authentication class with access to database
class AuthenticationDAO
{

  /**
  * Check if exists the informed credencial
  * @return true Credential existent in database
  * @return false Credential not found or fail in attempt to get the record in database
  */
  function existsCredencial($authenticationObj)
  {
    // Get MySql instance to connect to database
    $mysql = new MySql();

    // Get connection to database
    $con = $mysql->getConnection();

    $stmt = $con->prepare('SELECT COUNT(*) AS counter FROM tbl_usuario WHERE usuario= ? AND senha= ?');
    $stmt->bindParam(1,$authenticationObj->username);
    $stmt->bindParam(2,$authenticationObj->password);
    $stmt->execute();

    // Close connection to database
    $con = null;

    // Verify if select got some results
    if ($stmt->rowCount() > 0)
    {
      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        return $rs['counter'] > 0 ? true : false;
      }
    }

    // Default return
    return false;

  }

}




?>
