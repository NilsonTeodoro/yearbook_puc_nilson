<?php
    require_once("conecta.php");

	class cidades
	{
		private $idCidade;
		private $idEstado;
		private $nomeCidade;
		
		function __construct($idCidade, $idEstado, $nomeCidade){
            $this->idCidade = $idCidade;
            $this->idEstado = $idEstado;
            $this->nomeCidade = $nomeCidade;
        }
		
		function __desctruct(){}
		
		function getIdCidade()
		{
			return $this->idCidade;
		}
		
		function getIdEstado()
		{
			return $this->idEstado;
		}
		
		function getNomeCidade()
		{
			return $this->nomeCidade;
		}
		
		function setIdCidade($_idCidade)
		{
			$this->idCidade = $_idCidade;
		}
		
		function setIdEstado($_idEstado)
		{
			$this->idEstado = $_idEstado;
		}
		
		function setNomeCidade($_nomeCidade)
		{
			$this->nomeCidade = $_nomeCidade;
		}
        
        function getTodasCidades($idEstado)
        {
            $_conecta = new conecta();
            $conn = $_conecta->conectar();
            $obj = $conn->prepare("select idCidade, nomeCidade from cidades where idEstado = ?");
            $pesquisar = $obj->execute(array($idEstado));
            return $obj->fetchAll();
        }
	}
?>