<?php 

// @author Caique M. Oliveira
// @data 24/05/2018
// @description Client class
class Client
{
	// Attributes
	public $idCliente; 
	public $nome; 
	public $dtNasc; 
	public $cpf; 
	public $email; 
	public $celular; 
	public $idEndereco; 
	public $sexo; 
	public $telefone; 
	public $idUsuario; 
	public $fotoPerfil;

	// Default constructor
	function __construct($idCLiente,$nome,$dtNasc,$cpf,$email,$celular,$idEndereco,$sexo,$telefone,$idUsuario,$fotoPerfil)
	{
		$this->idCliente = $idCliente;
		$this->nome = $nome;
		$this->dtNasc = $dtNasc;
		$this->cpf = $cpf;
		$this->email = $email;
		$this->celular = $celular;
		$this->idEndereco = $idEndereco;
		$this->sexo = $sexo;
		$this->telefone = $telefone;
		$this->idUsuario = $idUsuario;
		$this->fotoPerfil = $fotoPerfil;
	}

	/**
	* Get client's data conform authentication informed  
	* @return PDO Object containing the client's data
	* @return null Client not found by authentication data or fail in attempt to get client's data in database
	*/
	static function getClientByAuthentication($authenticationObj)
	{
		$clientDAO = new ClientDAO();
		return $clientDAO->getClientByAuthentication($authenticationObj);
	}
}

?>