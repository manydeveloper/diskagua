<?php
include_once  '../Class/conexao.class.php';
 include_once  '../Class/fornecedor/fornecedor.class.php';
$fornecedor = new fornecedor();
$con = new conexao();
$con->connect();
$fornecedor->setTabela("fornecedor");
if(!empty($_GET["fornecedor"])){
    $res = $fornecedor->pesquisaCombobox($_GET['fornecedor']);
}else{
    $res = $fornecedor->pesquisaCombobox();
}

$con->disconnect();
echo $res;
?>
