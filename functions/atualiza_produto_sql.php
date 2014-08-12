<?php
include_once '../Class/conexao.class.php';
include_once '../Class/produto/produto.class.php';

$produto = new produto();
$produto->setCodigo($_POST["codigoProduto"]);
$produto->setNomeProduto($_POST["nomeProduto"]);
$produto->setFornecedor($_POST["Fornecedor"]);
$produto->setquantidade($_POST["quantidade"]);
$produto->setVcompra($_POST["valorDeCompra"]);
$produto->setVvenda($_POST["valorDeVenda"]);

$con = new conexao();
$con->connect();
$produto->setTabela("produto");
$produto->atualizar("nome='".$produto->getNomeProduto()."',fornecedor='".$produto->getFornecedor()."',quantidade='".$produto->getquantidade()."',valorCompra='".$produto->getVcompra()."',valorVenda='".$produto->getVvenda()."'","idProduto=".$produto->getCodigo());

$con->disconnect();
?>
