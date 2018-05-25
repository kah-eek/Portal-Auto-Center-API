<?php

// @author Caique M. Oliveira
// @data 24/05/2018
// @description User class
class User
{

  // Attributes
  private $idUsuario;
  private $usuario;
  private $senha;
  private $log;
  private $idNivelUsuario;
  private $ativo;

  // Default constructor
  function __construct($usuario,$senha,$ativo,$idNivelUsuario,$log,$idUsuario)
  {
    $this->usuario = $usurio;
    $this->senha = $senha;
    $this->ativo = $ativo;
    $this->idNivelUsuario = $idNivelUsuario;
    $this->log = $log;
    $this->idUsuario = $idUsuario;
  }

  
}


?>
