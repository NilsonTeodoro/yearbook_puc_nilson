<?php
    require_once("../objetos/participantes.php");
	session_start();

    if (isset($_POST["lembrar"])) {
       $lembrar = $_POST["lembrar"];
       if($lembrar == "lmbUsuario")
       {
           setcookie("login", utf8_encode(htmlspecialchars($_POST["txtUsuario"])), mktime(0,0,0,12,31,2014));
       }
    }

    $participante = new participantes("",
                                      "",
                                      "",
                                      "",
                                      utf8_encode(htmlspecialchars($_POST["txtUsuario"])),
                                      "",
                                      utf8_encode(md5(htmlspecialchars($_POST["txtSenha"]))));
    $objeto = $participante->logar($participante);
    if ($objeto <> 0){
        foreach($objeto as $item) {
            $_SESSION["foto"] = $item["arquivoFoto"];
        }
        $_SESSION["login"] = $participante->getLogin();
        header("Location:../index.php");
    }else {
        $_SESSION["negado"] = "Usuário ou senha inválido.";
        header("Location:../acesso.php");
    }
    die();
?>