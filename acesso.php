<?php
    require_once("modelos/cabecalho.php");
    if (isset($_COOKIE["login"])) {
        echo $_COOKIE["login"];
        $usuario = $_COOKIE["login"];
    } else {
        $usuario = "";
    }
?>
    <section class="container">
        <?php if (isset($_SESSION["negado"])){ ?>
            <p class="text-danger"><?= $_SESSION["negado"] ?></p>
        <?php limpaMensagens(); } ?>
        <div class="row">
        <form action="negocio/logar.php" method="post" class="form-signin" role="form">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="form-signin">
                    <fieldset>
                        <legend>Área retrita</legend>
                        <input type="text" name="txtUsuario" class="form-control" value="<?= $usuario ?>" placeholder="usuário">
                        <input type="password" name="txtSenha" class="form-control" placeholder="senha">
                        <label class="checkbox"><input type="checkbox" name="lembrar" value="lmbUsuario"> Lembrar</label>
                        <button class="btn btn-lg btn-primary" type="submit">Acessar</button>
                        <a href="cadastro.php">Novo Cadastro</a>
                    </fieldset>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </form>
        </div>
    </section>
<?php
    require_once("modelos/rodape.php");
?>

