<?php
	class conecta
	{
		//Propriedades da classe
		private static $db_sgbd 	= "mysql";
		private static $db_maquina 	= "br-cdbr-azure-south-a.cloudapp.net";
		private static $db_porta 	= "3306";
		private static $db_usuario 	= "b7e1e5ada2438f";
		private static $db_senha 	= "8062e7e9";
		private static $db_banco 	= "yearbooknilsondb";
		private $conexao;
		
		//Método construtor
		function __construct(){}
		
		//Método destrutor, limpa todas as variáveis da memória
		function __destruct()
		{
			$this->desconectar();
			foreach($this as $chave => $valor)
			{
				unset($this->$chave);
			}
		}
		
		//Métodos get das propriedades
		private function getSgbd(){ return self::$db_sgbd; }
		
		private function getPorta(){ return self::$db_porta; }
		
		private function getMaquina(){ return self::$db_maquina; }
		
		private function getUsuario(){ return self::$db_usuario; }
		
		private function getSenha(){ return self::$db_senha; }
		
		private function getBanco(){ return self::$db_banco; }
		
		//Método para finalizar a conexão
		public function desconectar()
		{
			$this->conexao = null;
		}
		
		//Método para iniciar  e retornar a conexão
		public function conectar()
		{
			echo "método conectar();";
			try
			{
				$this->conexao = new PDO($this->getSgbd().':host='.$this->getMaquina().';port='.$this->getPorta().';dbname='.$this->getBanco(), $this->getUsuario(), $this->getSenha());
				die(print_r($obj->errorInfo(), true));
			}
			catch(PDOException $e)
			{
				die(var_dump($e->getMessage()));
			}
			return $this->conexao;
		}
	}
?>