<?php
    require_once("modelos/cabecalho.php");
    require_once("objetos/participantes.php");
    require_once("objetos/turma.php");
    verificaUsuario();
    if (isset($_POST["txtPesquisa"])) {
        $chave = $_POST["txtPesquisa"];
    } else {
        $chave = "";
    }
?>
    <section class="container">
        <header></header>
        <div>
            <img src="<?= $_SESSION["foto"] ?>" class="thumbnail" width="140" height="140">
            <a href="cadastro.php?operacao=2">Editar</a>
            <!--<a href="cadastro.php">Encerrar</a>-->
        </div>
        <br>
        <form action="" method="post">
            <input type="text" name="txtPesquisa" class="form-control" placeholder="informe o nome do participante">
            <br>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        <hr>
        <?php
            $participantes = new turma();
            $objeto = new participantes("", "", "", "", "", "", "");
            $lista = $objeto->listaAlunos($chave);
            foreach($lista as $item) {
                $participante = new participantes($item["arquivoFoto"], "", "", "", $item["login"], $item["nomeCompleto"], "");
                $participantes->addParticipante($participante);
            }
            $participantes->mostrar();
        ?>
    </section>
<?php
    require_once("modelos/rodape.php");
?>