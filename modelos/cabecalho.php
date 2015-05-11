<?php
    require_once("negocio/libYearbook.php");
?>
<!DOCTYPE html>
<html lang="br">
    <head>
        <meta charset="utf-8">
        <title>Yearbook - PUC 2015</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
        <script src="js/loadCidade.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(":file").filestyle();
            });
        </script>
    </head>
    <body>
        <header class="navbar navbar-static-top navbar-inverse" role="banner">
            <section class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <?php if (usuarioLogado() <> "") { ?>
                        <h1><a href="index.php" class="navbar-brand">Yeabook</a></h1>
                        <?php } else { ?>
                            <h1><a href="acesso.php" class="navbar-brand">Yeabook</a></h1>
                        <?php } ?>
                    </div>
                    <div class="col-xs-4">
                    </div>
                    <div class="col-xs-4" style="margin-top: 25px; left: 89px;">
                        <?php if (usuarioLogado() <> "") { ?>
                            <span class="navbar-brand">Bem vindo <?= usuarioLogado() ?>, <a href="negocio/logout.php" style="color: white;">sair</a></span>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </header>
        