<?php
    include_once("conecta.php");

	class participantes
	{
		private $arquivoFoto;
		private $cidade;
		private $descricao;
		private $email;
		private $login;
		private $nomeCompleto;
		private $senha;
        private $estado;
		
		function __construct($arquivoFoto, $cidade, $descricao, $email, $login, $nomeCompleto, $senha){
            $this->arquivoFoto = "{$arquivoFoto}";
            $this->cidade = $cidade;
            $this->descricao = $descricao;
            $this->email = $email;
            $this->login = $login;
            $this->nomeCompleto = $nomeCompleto;
            $this->senha = $senha;
        }
		
		function __destruct(){}
		
		function getArquivoFoto()
		{
			return $this->arquivoFoto;
		}
		
		function getCidade()
		{
			return $this->cidade;
		}
		
		function getDescricao()
		{
			return $this->descricao;
		}
		
		function getEmail()
		{
			return $this->email;
		}
		
		function getLogin()
		{
			return $this->login;
		}
		
		function getNomeCompleto()
		{
			return $this->nomeCompleto;
		}
		
		function getSenha()
		{
			return $this->senha;
		}
		
		function setArquivoFoto($_arquivoFoto)
		{
			$this->arquivoFoto = $_arquivoFoto;
		}
		
		function setCidade($_cidade)
		{
			$this->cidade = $_cidade;
		}
        
        function setEstado($_estado)
		{
			$this->estado = $_estado;
		}
		
		function setDescricao($_descricao)
		{
			$this->descricao = $_descricao;
		}
		
		function setEmail($_email)
		{
			$this->email = $_email;
		}
		
		function setLogin($_login)
		{
			$this->login = $_login;
		}
		
		function setNomeCompleto($_nomeCompleto)
		{
			$this->nomeCompleto = $_nomeCompleto;
		}
		
		function setSenha($_senha)
		{
			$this->senha = $_senha;
		}
        
        function listaPerfil($login){
            try {
                $_conecta = new conecta();
                $conn = $_conecta->conectar();
                $obj = $conn->prepare("select participantes.nomeCompleto, participantes.login, participantes.arquivoFoto, participantes.descricao, cidades.nomeCidade, estados.nomeEstado from participantes inner join cidades on participantes.cidade = cidades.idCidade inner join estados
on cidades.idEstado = estados.idEstado where participantes.login = ?");
                $pesquisar = $obj->execute(array($login));
                $lista = $obj->fetchAll();
                return $lista;   
            } catch(Exception $e) {
            
            } finally {
                $_conecta->desconectar();
            }
        }
        
        function listaAlunos($chave) {
            try {
                $_conecta = new conecta();
                $conn = $_conecta->conectar();
                $obj = $conn->prepare("select nomeCompleto, login, arquivoFoto from participantes where nomeCompleto like ?");
                $pesquisar = $obj->execute(array('%'.$chave.'%'));
                $lista = $obj->fetchAll();
                return $lista;   
            } catch(Exception $e) {
            
            } finally {
                $_conecta->desconectar();
            }
        }
        
        function mostraPerfil(){
            echo "<hr>";
            echo "<div class=\"row\">";
            echo "<div class=\"col-md-3\">";
            echo "<img src=\"{$this->arquivoFoto}\" class=\"thumbnail\" width=\"240\" height=\"320\"><br>";
            echo "</div>";
            echo "<div class=\"col-md-3\">";
            echo "<p>Nome: {$this->nomeCompleto}</p>";
            echo "<p>{$this->cidade} - {$this->estado}</p>";
            echo "<p>Sobre: {$this->descricao}</p>";
            echo "</div>";
            echo "</div>";
            echo "<a href=\"index.php\" class=\"btn btn-large\">Voltar</a>";
            echo "<hr>";
        }
        
        function mostraDados(){
            echo"<div class=\"row\">\n";
            echo"<div class=\"col-md-1\">\n";
            echo "\n<p><img src=\"{$this->arquivoFoto}\" class=\"img-thumbnail\" width=\"140\" height=\"140\"></p>\n";
            echo"\n</div>";
            echo"<div class=\"col-md-4\">\n";
            echo "\n<p>Nome: {$this->nomeCompleto}</p>";
            echo "\n<p>Login: {$this->login}</p>";
            echo "\n<p><a href=\"perfil.php?login={$this->login}\">Perfil completo</a></p>";
            echo"\n</div>";
            echo"\n</div>";
            echo"\n<hr>";
        }
        
        function logar($participante){
            $_conecta = new conecta();
            $conn = $_conecta->conectar();
            $obj = $conn->prepare("select login, arquivoFoto from participantes where login = ? and senha = ?");
            $pesquisar = $obj->execute(array($participante->getLogin(), $participante->getSenha()));
            $dados = $obj->fetchAll();
            $_conecta->desconectar();
            if (count($dados) != 1) {
                return 0;
		    } else {
                return $dados;
            }
        }
        
        function addParticipante($participante)
        {
            try
            {
                $_conecta = new conecta();
                $conn = $_conecta->conectar();
                $obj = $conn->prepare("insert into participantes (nomeCompleto, arquivoFoto, cidade, email, descricao, login, senha) values (?, ?, ?, ?, ?, ?, ?)");
                $obj->execute(array($participante->getNomeCompleto(),
                                    "perfis/{$participante->getLogin()}_{$participante->getArquivoFoto()}",
                                    $participante->getCidade(),
                                    $participante->getEmail(),
                                    $participante->getDescricao(),
                                    $participante->getLogin(),
                                    $participante->getSenha()));
                //Descomentar para descobrir erros
                //echo $conn->lastInsertId() or die(print_r($obj->errorInfo(), true));
                return 1;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
                return 0;
            }
            finally
            {
                $_conecta->desconectar();
                $obj = null;
                $conn = null;
                $_conecta->desconectar();
            }
        }
        
        function updParticipante($participante)
        {
            try
            {
                $_conecta = new conecta();
                $conn = $_conecta->conectar();
                $obj = $conn->prepare("update participantes set nomeCompleto = ?, arquivoFoto = ?, cidade = ?, email = ?, descricao = ?, login = ?, senha = ? where login = ?");
                $obj->execute(array($participante->getNomeCompleto(),
                                    "perfis/{$participante->getLogin()}_{$participante->getArquivoFoto()}",
                                    $participante->getCidade(),
                                    $participante->getEmail(),
                                    $participante->getDescricao(),
                                    $participante->getLogin(),
                                    $participante->getSenha(),
                                    $participante->getLogin()));
                //Descomentar para descobrir erros
                //echo $conn->lastInsertId() or die(print_r($obj->errorInfo(), true));
                return 1;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
                return 0;
            }
            finally
            {
                $_conecta->desconectar();
                $obj = null;
                $conn = null;
                $_conecta->desconectar();
            }
        }
	}
?>