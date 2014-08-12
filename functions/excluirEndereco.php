<?php
include_once '../Class/conexao.class.php';
include_once '../Class/crud.class.php';
$crud = new crud();
$con = new conexao();
if(!empty($_GET["idCliente"]) && !empty($_GET["idEndereco"] )){
    $con->connect();
    $crud->setTabela("endereco");
    $where="idCliente";
    /* @var $_GET type */
    $campo= $_GET["idCliente"]." and idEndereco=".$_GET["idEndereco"];
    return $crud->excluir($where,$campo);
}



