<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menu" style="margin-left: 5px; float: left; height: 100%;">
        <?php include("../index/menu.php"); ?>
    </section>
    
    <section id="manutencao" class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; height: 490px;">
        <fieldset>
            <legend>
                Manutenção de Produtos
            </legend>   
        </fieldset>    
        
        
        <div id="pesq">
            <label> Pesquisar </label> <input class="input-sm"type="text" name="campoPesquisa" id="campoPesquisa"><a href="#dialog" name="modal" onclick="pesquisaProduto();"> Pesquisar </a>         
        <br>
        <br>
        <div class="checkbox-inline">
        <label>Codigo
        <input type="radio" name="pesquisaProduto" id="idCliente" value="idProduto">
        </label>
        <label>Nome
        <input type="radio" name="pesquisaProduto" id="nome" value="nome">
        </label>
        <label>Fornecedor
        <input type="radio" name="pesquisaProduto" id="fornecedor2" value="fornecedor">
        </label>
        </div>
        </div>
        <div id="boxes" >
        <div id="dialog" class="window" >
            <div id="cabecalhoResultadoProduto">
               
                    
                <table cellspacing=0 class="table" ><thead class=""><tr><th id="thcodigoProduto"> Codigo </th><th id="thnomeProduto"> Nome </th><th id="fornecedorCabecalho"> Fornecedor </th><th id="thquantidadeProduto"> Quantidade </th><th id="thValorCompra"> Valor <br> Compras </th><th id="thValorVenda"> Valor <br> Venda </th><th id="thexcluirProduto"> Excluir </th><th id="theditarProduto"> Editar </th></thead>
                    </table>
            
         <div id="resultado"> 
        
        
        
        </div>
            </div>
         </div>
            <div id="mask" style="width: 1366px; height: 318px; display: none; opacity: 0.8;"></div>
        </div>
        
        </section> 
    
    
    
    
    
    
    <?php include("../index/footer.php"); ?>
