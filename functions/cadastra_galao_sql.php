<?php

include  '../Class/conexao.class.php';
include  '../Class/manutencao/galao.class.php';

$galao= new galao();

$galao->setDescricao($_POST["descricao"]);
$galao->setTamanho($_POST["tamanhoGalao"]);

$con = new conexao();
$con->connect();

    $galao->setTabela("galao");
    echo $galao->inserir("descricao,tamanho","'".$galao->getDescricao()."','".$galao->getTamanho()."'" );


$con->disconnect();
?>
