<?php
include_once '../Class/conexao.class.php';
include_once '../Class/endereco/endereco.class.php' ;

$con = new conexao();
$end = new endereco();

$con->connect();

$cep=$_GET['cep'];
if (!empty($cep)){

$end->setTabela("cep");

$resCep=$end->funcaoPesquisaCep("cep.cep='".$cep."'");

echo "$resCep";
}else{
    
    $end->setTabela("cep");

$resCep=$end->funcaoPesquisaCep("","");

echo $resCep;
    
}


$con->disconnect();

?>

