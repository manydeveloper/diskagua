<?php
include_once '../Class/conexao.class.php';
include_once '../Class/endereco/endereco.class.php' ;

$con = new conexao();
$end = new endereco();

$con->connect();

$estado=$_GET['estado'];
$cidade=$_GET['cidade'];
$rua=$_GET['rua'];


if (!empty($estado) && !empty($cidade) && !empty($rua)){

$end->setTabela("cep");

$resCep=$end->funcaoPesquisaCep("cidades.estado='".$estado."' and cep.idCidade='".$cidade."' and cep.nomeRua like '%".$rua."%'");

echo "$resCep";
}else{
    
    $end->setTabela("cep");

$resCep=$end->funcaoPesquisaCep("cidades.estado='".$estado."' and cep.idCidade='".$cidade."'");

echo $resCep;
    
}


$con->disconnect();

?>
