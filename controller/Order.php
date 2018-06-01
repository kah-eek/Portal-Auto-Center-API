<?php 

// @author Caique M. Oliveira
// @data 31/05/2018
// @description Order Class
class Order
{

	// Attributes
	public $idPedido;
	public $idCliente;
	public $idProduto;
	public $dataAgendada;
	public $logPedido;

	// Constructor default
	function __construct
	(
		$idPedido,
		$idCliente,
		$idProduto,
		$dataAgendada,
		$logPedido
	)
	{
		$this->idPedido = $idPedido;
		$this->idCliente = $idCliente;
		$this->idProduto = $idProduto;
		$this->dataAgendada = $dataAgendada;
		$this->logPedido = $logPedido;
	}

	
	/**
	* Insert a new order register into database
	* @param orderObj Object that will be inserted into database
	* @return true Data inserted with succeed
	* @return false Fail in to attemp to insert the data into database
	*/
	function requestNewOrder($orderObj)
	{
		$orderDAO = new OrderDAO();
		return $orderDAO->requestNewOrder($orderObj);
	}



}


?>