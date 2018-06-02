<?php

  // @author Caique M. Oliveira
  // @data 24/05/2018
  // @description MySql Class to connect to database
  class MySql
  {

    // Attributes
    private $HOST = 'caiqueoliveira.mysql.dbaas.com.br';
    private $DB = 'caiqueoliveira';
    private $USERNAME = 'caiqueoliveira';
    private $PASSWORD = 'caique@2018';
    private $OPTIONS = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    /**
    * Get connection to database
    * @return PDO Connection established to database
    * @return JSON  JSON object containing error message on attempt to connect to database
    */
    public function getConnection()
    {
      try
      {
        
        $con = new PDO('mysql:host='.$this->HOST.';port=3306;dbname='.$this->DB,$this->USERNAME,$this->PASSWORD, $this->OPTIONS);

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $con;
      
      }catch (PDOException $e)
      {
        echo json_encode(array(
          'error'=>$e->getMessage()
        ));
      }
    }

  }
?>
