<?php

require_once("objetos/conecta.php");
require_once("objetos/cidades.php");

if (isset($_GET["idEstado"])) {
    $_cidade = new cidades(11, $_GET["idEstado"], "Belo Horizonte");
    $cidades = $_cidade->getTodasCidades($_GET["idEstado"]);
    foreach ($cidades as $cidade)
    {
        echo "<option value=\"" . $cidade["idCidade"] . "\">". $cidade["nomeCidade"] . "</option>";
    }
} else {
    echo '<option value="">Selecione o estado</option>';
}

?>
