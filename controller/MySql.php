<?php

  // @author Caique M. Oliveira
  // @data 24/05/2018
  // @description MySql Class to connect to database
  class MySql
  {

    // Attributes
    private $HOST = 'localhost';
    private $DB = 'dbautofast';
    private $USERNAME = 'root';
    private $PASSWORD = 'bcd127';

    /**
    * Get connection to database
    * @return PDO Connection established to database
    * @return JSON  JSON object containing error message on attempt to connect to database
    */
    public function getConnection()
    {
      try
      {
        $con = new PDO('mysql:host'.$this->HOST.';dbname='.$this->DB,$this->USERNAME,$this->PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (PDOException $e)
      {
        echo json_encode(array(
          'error'=>$e->getMessage()
        ));
      }
    }
  }
?>
