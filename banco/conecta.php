<?php
	class conecta
	{
		//Propriedades da classe
		private static $db_sgbd 	= "mysql";
		private static $db_maquina 	= "localhost";
		private static $db_porta 	= "3306";
		private static $db_usuario 	= "daw";
		private static $db_senha 	= "daw2014";
		private static $db_banco 	= "daw_yearbook";
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
			try
			{
				$this->conexao = new PDO($this->getSgbd().':host='.$this->getMaquina().';port='.$this->getPorta().';dbname='.$this->getBanco(), $this->getUsuario(), $this->getSenha());
			}
			catch(PDOException $e)
			{
                var_dump($e->getMessage());
			}
			return $this->conexao;
		}
	}
?>