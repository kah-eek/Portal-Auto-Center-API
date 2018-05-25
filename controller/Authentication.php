<?php

  // require_once('../model/AuthenticationDAO.php');


// @author Caique M. Oliveira
// @data 24/05/2018
// @description Authentication class
class Authentication
{
  // Attributes
  public $username;
  public $password;

  // Default constructor
  function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  /**
  * Check if exists the informed credencial
  * @return true Credential existent in database
  * @return false Credential not found or fail in attempt to get the record in database
  */
  function existsCredencial($authenticationObj)
  {
    $authenticationDAO = new AuthenticationDAO();
    return $authenticationDAO->existsCredencial($authenticationObj);
  }

}



?>
