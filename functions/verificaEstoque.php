<?php
include_once '../Class/conexao.class.php';
$con = new conexao();
$con->connect();
$sql = "select quantidade from  Produto where idProduto=".$_GET["idProduto"];
$res = mysql_query($sql);
$estoque = mysql_fetch_array($res);
$con->disconnect();
echo $estoque["quantidade"];
?>
