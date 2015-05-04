<?php
    require_once("modelos/cabecalho.php");
    require_once("objetos/participantes.php");

    verificaUsuario();
?>
    <section class="container">
        <?php
            $participante = new participantes("", "", "", "", "", "", "");
            $perfil = $participante->listaPerfil(htmlspecialchars($_GET["login"]));
            foreach($perfil as $dadosPessoais) {
                $participante->setArquivoFoto($dadosPessoais["arquivoFoto"]);
                $participante->setCidade($dadosPessoais["nomeCidade"]);
                $participante->setDescricao($dadosPessoais["descricao"]);
                $participante->setNomeCompleto($dadosPessoais["nomeCompleto"]);
                $participante->setEstado($dadosPessoais["nomeEstado"]);
            }
            $participante->mostraPerfil();
        ?>
    </section>
<?php
    require_once("modelos/rodape.php");
?>
