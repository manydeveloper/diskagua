<?php
include '../Class/conexao.class.php';
include '../Class/fornecedor/fornecedor.class.php';

$codigo = $_GET["id"];

$con = new conexao;
$con->connect();

$fornecedor = new fornecedor();

$fornecedor->setTabela("fornecedor");

$fornecedor->excluir("idfornecedor",$codigo);
$con->disconnect();

?>
