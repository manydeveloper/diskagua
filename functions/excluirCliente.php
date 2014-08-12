<?php
include '../Class/conexao.class.php';
include '../Class/cliente/Cliente.class.php';

$codigo = $_GET["id"];

$con = new conexao;
$con->connect();

$cliente = new Cliente();

$cliente->setTabela("cliente");
$cliente->excluir("idCliente",$codigo);
$cliente->setTabela("cliente_fisico");
$cliente->excluir("idCliente",$codigo);
$cliente->setTabela("cliente_juridico");
$cliente->excluir("idCliente",$codigo);
$cliente->setTabela("telefone");
$cliente->excluir("idCliente",$codigo);
$cliente->setTabela("endereco");
$cliente->excluir("idCliente",$codigo);

$con->disconnect();

?>
