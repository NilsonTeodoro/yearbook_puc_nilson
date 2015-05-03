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
        <h2>Acesso</h2>
        <?php if (isset($_SESSION["negado"])){ ?>
            <p class="text-danger"><?= $_SESSION["negado"] ?></p>
        <?php limpaMensagens(); } ?>
        <form action="negocio/logar.php" method="post" role="form">
            <table class="table">
                <tr>
                    <td><label for="lblUsuario" class="control-label">Usuário</label></td>
                    <td><input type="text" name="txtUsuario" class="form-control" value="<?= $usuario ?>"></td>
                </tr>
                <tr>
                    <td><label for="lblSenha"class="control-label">Senha</label></td>
                    <td><input type="password" name="txtSenha" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label class="checkbox"><input type="checkbox" name="lembrar" value="lmbUsuario"> Lembrar</label>
                        <button class="btn btn-lg btn-primary" type="submit">Acessar</button>
                        <a href="cadastro.php">Novo Cadastro</a>
                    </td>
                </tr>
            </table>
        </form>
    </section>
<?php
    require_once("modelos/rodape.php");
?>