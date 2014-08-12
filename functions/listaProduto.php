<?php
include '../Class/conexao.class.php';
include '../Class/produto/produto.class.php';



if(!empty($_GET["venda"]) && $_GET["venda"]== true){
    
$pesquisa= $_GET["campo"];


$con = new conexao;
$con->connect();

$lista= new produto();

$lista->setTabela("produto");

echo $lista->listarProdutoVenda("nome",$pesquisa);

}else{
    
    $opcao= $_GET["opcao"];
$pesquisa= $_GET["campo"];


$con = new conexao;
$con->connect();

$lista= new produto();

$lista->setTabela("produto");

echo $lista->listarProduto($opcao,$pesquisa);
}

?>