<?php

include  '../Class/conexao.class.php';
include  '../Class/produto/produto.class.php';

$produto = new produto();

$produto->setNomeProduto($_POST["nomeProduto"]);
$produto->setFornecedor($_POST["Fornecedor"]);
$produto->setquantidade($_POST["quantidade"]);
$produto->setVcompra($_POST["valorDeCompra"]);
$produto->setVvenda($_POST["valorDeVenda"]);
echo $produto->getVvenda();
$con = new conexao();
$con->connect();
$produto->setTabela("produto");
echo $produto->inserir("nome,fornecedor,quantidade,valorCompra,valorVenda", "'".$produto->getNomeProduto()."','".$produto->getFornecedor()."','".$produto->getquantidade()."','".$produto->getVcompra()."','".$produto->getVvenda()."'");
$con->disconnect();
?>
