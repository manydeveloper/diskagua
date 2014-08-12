<?php
include '../Class/conexao.class.php';
include '../Class/produto/produto.class.php';

$codigo = $_GET["id"];

$con = new conexao;
$con->connect();

$produto = new produto();

$produto->setTabela("produto");

$produto->excluir("idProduto",$codigo);
$con->disconnect();

?>