<?php
    require_once("../objetos/participantes.php");
    require_once("libYearbook.php");
    if (enviarFoto() == 1) {
        $participante = new participantes($_FILES["fotoPerfil"]["name"],
                                          utf8_encode(htmlspecialchars($_POST["ddlCidade"])),
                                          utf8_encode(htmlspecialchars($_POST["txtSobre"])),
                                          utf8_encode(htmlspecialchars($_POST["txtEmail"])),
                                          utf8_encode(htmlspecialchars($_POST["txtUsuario"])),
                                          utf8_encode(htmlspecialchars($_POST["txtNome"])),
                                          utf8_encode(md5(htmlspecialchars($_POST["txtSenha"]))));
        if ($participante->addParticipante($participante) == 1){
            $_SESSION["sucesso"] = "Operação realizada com sucesso.";
            echo $_SESSION["sucesso"];
            header("Location:../cadastro.php");
        } else {
            $_SESSION["negado"] = "Não foi possível realizar a operação.";
            echo $_SESSION["negado"];
            header("Location:../cadastro.php");
        }
    } else {
        $_SESSION["negado"] = "Não foi possível enviar a foto.";
        echo $_SESSION["negado"];
        header("Location:../cadastro.php");
    }
    die();
?>