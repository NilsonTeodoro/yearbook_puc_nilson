<?php
    session_start();

    function listarEstados() {
        return retornaEstados();
    }

    function limpaMensagens() {
        unset($_SESSION["sucesso"]);
        unset($_SESSION["negado"]);
    }

    function verificaUsuario() {
        if (!isset($_SESSION["login"])) {
            $_SESSION["negado"] = "Favor, realizar o login antes de acessar qualquer funcionalidade.";
            header("Location: acesso.php");
            die();
        }
    }

    function usuarioLogado() {
        if (isset($_SESSION["login"])) {
            return $_SESSION["login"];
        } else {
            return "";
        }
    }

    function logout() {
        unset($_SESSION["login"]);
    }

    function enviarFoto() {
        $permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");
        $temp = explode(".", basename($_FILES["fotoPerfil"]["name"]));
        $extensao = end($temp);
        if ((in_array($extensao, $permissoes)) && (in_array($_FILES["fotoPerfil"]["type"], $permissoes)) && ($_FILES["fotoPerfil"]["size"] < $_POST["MAX_FILE_SIZE"]))
        {
            if ($_FILES["fotoPerfil"]["error"] > 0)
            {
                echo "<h1>Erro no envio, código: " . $_FILES["fotoPerfil"]["error"] . "</h1>";
            }
            else
            {
                $dirUploads = "../perfis/";
                $nomeUsuario = $_POST["txtNome"]."_".$_POST["txtNome"]."/";
                if(!file_exists ( $dirUploads ))
                    mkdir($dirUploads, 0500);  //permissao de leitura e execucao
                $caminhoUpload = $dirUploads;
                $pathCompleto = $caminhoUpload.basename($_POST["txtUsuario"]."_".$_FILES["fotoPerfil"]["name"]);
                echo $pathCompleto;
                if(move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $pathCompleto))
                    return 1;
                else
                    return 0;
            }
        }
        else
        {
          return 2;
        }
    }

    function retornaEstados()
    {
        $conexao = mysqli_connect("localhost", 'daw', 'daw2014', 'daw_yearbook');
        $estados = array();
        $dados = mysqli_query($conexao, "SELECT 'Selecione' as sigla, 0 as idEstado union all SELECT siglaEstado as sigla, idEstado FROM estados");
        while($estado = mysqli_fetch_assoc($dados))
        {
            array_push($estados, $estado);
        }
        return $estados;
    }
?>