<?php
    
    require_once("modelos/cabecalho.php");
    require_once("objetos/participantes.php");

    $estados = listarEstados();
    if (isset($_GET["operacao"])) {
        $participante = new participantes("", "", "", "", "", "", "");
        $perfil = $participante->listaPerfil(htmlspecialchars($_SESSION["login"]));
        foreach($perfil as $dadosPessoais) {
            $nome = $dadosPessoais["nomeCompleto"];
            $email = "nilson@email.com";
            $sobre = $dadosPessoais["descricao"];
            $usuario = $_SESSION["login"];
        }
        $operacao = 2;
        $action = "negocio/updParticipante.php";
    } else {
        $operacao = 1;
        $action = "negocio/addParticipante.php";
        $nome = "";
        $email = "";
        $sobre = "";
        $usuario = "";
    }
?>
    <section class="container">
        <form action="<?= $action ?>" method="post" role="form" enctype="multipart/form-data" >
            <?php
                if (isset($_SESSION["sucesso"])){ ?>
                  <p class="text-success"><?= $_SESSION["sucesso"] ?></p>
            <?php } else if (isset($_SESSION["negado"])){ ?>
                  <p class="text-dander"><?= $_SESSION["negado"] ?></p>
            <?php } limpaMensagens(); ?>
            <fieldset>
                <legend>Dados Pessoais</legend>
                <table class="table">
                    <tr>
                        <td><label for="lblNome" class="control-label">Nome Completo</label></td>
                        <td><input name="txtNome" type="text" class="form-control" value="<?= $nome ?>"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="MAX_FILE_SIZE" value="60000" />
                            <label for="lblFoto" class="control-label">Foto</label>
                        </td>
                        <td>
                            <input type="file" name="fotoPerfil" class="filestyle" data-buttonText="Procurar Arquivo" data-input="false" title="Procurar arquivo" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lblEstado" class="control-label">Estado</label>
                        </td>
                        <td>
                            <select name="ddlEstado" id="ddlEstado" onchange="loadCidades()" class="form-control">
                                <?php foreach($estados as $estado): ?>
                                    <option value="<?=$estado["idEstado"]?>">
                                        <?=$estado["sigla"]?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lblCidade" class="control-label">Cidade</label>
                        </td>
                        <td>                            
                            <select name="ddlCidade" id="ddlCidade" class="form-control">
                                <option>Selecione o estado</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lblEmail" class="control-label">E-mail</label>
                        </td>
                        <td>
                            <input name="txtEmail" type="email" class="form-control" value="<?= $email ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lblSobre" class="control-label">Sobre</label>
                        </td>
                        <td>
                            <textarea name="txtSobre" class="form-control"><?= $sobre ?></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Dados Acesso</legend>
                <table class="table">
                    <tr>
                        <td>
                            <label for="lblUsuario" class="control-label">Usuário</label>
                        </td>
                        <td>
                            <input name="txtUsuario" type="text" class="form-control" value="<?= $usuario ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lblSenha" class="control-label">Senha</label>
                        </td>
                        <td>
                            <input name="txtSenha" type="password" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="cadastrar" value="Confirmar" class="btn btn-lg btn-primary">
                            <?php if ($operacao == 1) { ?>
                                <a href="acesso.php">Acessar</a>
                            <?php } else { ?>
                                <a href="index.php">Voltar</a>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </section>
<?php
    require_once("modelos/rodape.php");
?>