<?php
include_once '../Class/conexao.class.php';
include_once '../Class/manutencao/galao.class.php';

$galao = new galao();
$con = new conexao();
$con->connect();
$galao->setTabela("galao");
$res = $galao->pesquisaCombobox($_GET["tipoGalao"]);
$con->disconnect();
echo $res;
    
?>
