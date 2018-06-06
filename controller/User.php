<?php

// @author Caique M. Oliveira
// @data 24/05/2018
// @description User class
class User
{

  // Attributes
  public $idUsuario;
  public $usuario;
  public $senha;
  public $log;
  public $idNivelUsuario;
  public $ativo;

  // Default constructor
  function __construct($usuario,$senha,$ativo,$idNivelUsuario,$log,$idUsuario)
  {
    $this->usuario = $usuario;
    $this->senha = $senha;
    $this->ativo = $ativo;
    $this->idNivelUsuario = $idNivelUsuario;
    $this->log = $log;
    $this->idUsuario = $idUsuario;
  }

  
}


?>
