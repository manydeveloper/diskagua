<?php

include_once '../Class/conexao.class.php';
include_once '../Class/venda/venda.class.php';

$con= new conexao();
$venda= new venda();

$venda->setIdVenda($_GET["idVenda"]);
$venda->setFormaPagamento($_GET["FP"]);

$con->connect();
$venda->setTabela("vendas");
$res=$venda->atualizar("formaPagamento='".$venda->getIdvenda()."'", "idvendas='".$venda->getFormaPagamento()."'");
$con->disconnect();
return $res;
?>
