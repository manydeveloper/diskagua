<?php
include_once '../Class/conexao.class.php';
include_once '../Class/crud.class.php';
$crud = new crud();
$con = new conexao();
if(!empty($_GET["idCliente"]) && !empty($_GET["idtelefone"] )){
    
    $con->connect();
    $crud->setTabela("telefone");
    $where="idCliente";
    $campo=$_GET["idCliente"]." and idTelefone=".$_GET["idtelefone"];
    return $crud->excluir($where,$campo);
}

?>
