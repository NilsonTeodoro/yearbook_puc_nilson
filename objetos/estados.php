<?php
	class estados
	{
		private $idEstado;
		private $nomeEstado;
		private $siglaEstado;
		
		function __construct(){}
		
		function __desctruct(){}
		
		function getIdEstado()
		{
			return $this->idEstado;
		}
		
		function getNomeEstado()
		{
			return $this->nomeEstado;
		}
		
		function getSiglaEstado()
		{
			return $this->siglaEstado;
		}
		
		function setIdEstado($_idEstado)
		{
			$this->idEstado = $_idEstado;
		}
		
		function setNomeEstado($_nomeEstado)
		{
			$this->nomeEstado = $_nomeEstado;
		}
		
		function setSiglaEstado($_siglaEstado)
		{
			$this->siglaEstado = $_siglaEstado;
		}
	}
?>