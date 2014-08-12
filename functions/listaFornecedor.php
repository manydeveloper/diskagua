<?php
include '../Class/conexao.class.php';
include '../Class/fornecedor/fornecedor.class.php';

$opcao= $_GET["opcao"];
$pesquisa= $_GET["campo"];


$con = new conexao;
$con->connect();

$lista= new fornecedor();

$lista->setTabela("fornecedor");

echo $lista->listarFornecedor($opcao,$pesquisa);



?>