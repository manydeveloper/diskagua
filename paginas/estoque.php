<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menu">
        <?php include("../index/menu.php"); ?>
    </section>

    <section id="cliente" id="manutencao" class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; min-height: 650px;">
        <fieldset>
            <legend>
                Estoque de Produtos
            </legend>   
        </fieldset>
        
        <label> Pesquisar <input type="text" name="campoPesquisa" id="campoPesquisa"></label><input type="button" name="botaoPesquisa" value="Pesquisar" onclick="pesquisaProduto();">         
        <br>
        <div class="checkbox-inline">
            <label>Codigo
        <input type="radio" name="pesquisaProduto" id="idProduto" value="idProduto">
            </label>
        <label>Nome
            <input type="radio" name="pesquisaProduto" id="nomeProduto" value="nome">
        </label>
        </div>
        
        <hr>
        <div id="resultado"> 
        
        
        
        </div>
        
</section>
    
    
</section>
 <?php include("../index/footer.php"); ?>