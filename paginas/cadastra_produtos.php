<!DOCTYPE html>
<?php
	include_once ("../index/header.php");
	
?>

    
<section id="content">
<!-- CONTEÚDO -->
<section id="menu" style="margin-left: 10px;"  >
<?php
    include("../index/menu.php");
?>
</section>

<?php
if(empty($_GET["id"])){
    $displayCadastro = "";
    $displayAtualiza = "none";

?>



<section class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; height: 490px;">
    <fieldset>
            <legend>
                Cadastro de Produtos
            </legend>   
        </fieldset>
<form action="../functions/cadastra_produto_sql.php" method="post">
        <br>
        <input class="input-sm" type="text" name="nomeProduto" id="nomeProduto" placeholder="NOME PRODUTO">
	<br>	
	<br>
        <select class="input-sm" name="Fornecedor">
        <?php require_once '../functions/pesquisaFornecedor_sql.php';?>
      </select>
        <input class="input-sm" type="button" name="butAddFornecedor" id="butAddFornecedor" value="Add" onclick="redirecionaPaginas('cadastra_Fornecedor.php');">
	<br>	
	<br>
	<input class="input-sm" type="text"  name="quantidade" id="quantidade" placeholder="QUANTIDADE">
	<br>
	<br>
	<input class="input-sm" type="text"  name="valorDeCompra" id="valorDeCompra" placeholder="VALOR DE COMPRA">
	<br>
        <br>
	<input class="input-sm" type="text"  name="valorDeVenda" id="valorDeVenda" placeholder="VALOR DE VENDA">
        <br>
        <br>
	<input  class="input-sm" type="submit" value="Cadastrar">
</form>

</section>

 <?php
    } else {
    $displayCadastro = "none";
    $displayAtualiza = "";


    include_once '../Class/conexao.class.php';
    $con = new conexao();
    $con->connect();
    $id = $_GET["id"];
    
    
    $sql_produto = "SELECT produto.idProduto,nome,fornecedor,quantidade,valorCompra,valorVenda FROM produto WHERE idProduto=".$id.";";
    $sel_produto = mysql_query($sql_produto);
    
    $regsProuto=  mysql_num_rows($sel_produto);
    
    if($regsProuto>0){
        $produto = mysql_fetch_array($sel_produto);
    }else{
    
        echo 'Produto Não econtrado';
    }
    
    
    $con->disconnect();
    ?>
    
<section id="" class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; height: 490px; display: <?php echo $displayAtualiza; ?>">

    <h1>Atualiza Produtos</h1>

    <form name="atulizaProduto" action="../functions/atualiza_produto_sql.php" method="post">
        <input type="hidden" name="codigoProduto" value="<?php echo $produto["idProduto"];?>"
        <br>
        <input type="text" name="nomeProduto" id="nomeProduto" value="<?php echo $produto["nome"];?>">
	<br>	
	<br>
        <?php $_GET["fornecedor"]=$produto["fornecedor"]; ?>
        <select  name="Fornecedor">
        <?php  include '../functions/pesquisaFornecedor_sql.php';?>
      </select>
        <input type="button" name="butAddFornecedor" id="butAddFornecedor" value="Add" onclick="redirecionaPaginas('cadastra_Fornecedor.php');">
	<br>	
	<br>
        <input type="text"  name="quantidade" id="quantidade" value="<?php echo $produto["quantidade"];?>">
	<br>
	<br>
        <input type="text"  name="valorDeCompra" id="valorDeCompra" value="<?php echo $produto["valorCompra"];?>">
	<br>
        <br>
	<input type="text"  name="valorDeVenda" id="valorDeVenda" value="<?php echo $produto["valorVenda"];?>">
        <br>
        <br>
	<input type="submit" value="Atualizar">
</form>





</section>

<?php }?>


</section>
 
 <?php include("../index/footer.php"); ?>