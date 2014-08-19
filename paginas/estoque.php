<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menuSuperior">
        <?php include("../index/menuSuperior.php"); ?>
    </section>

    <section class="well well-lg, wrapper">
        <fieldset>
            <legend>
                Estoque de Produtos
            </legend>   
        </fieldset>
        <div>
            <label>Codigo
            <input type="radio" name="pesquisaProduto" id="idProduto" value="idProduto">
            </label>
            <label>Nome
            <input type="radio" name="pesquisaProduto" id="nomeProduto" value="nome">
            </label>
        </div>
        <br>
        <label> Pesquisar </label><br>
        <input type="text" name="campoPesquisa" id="campoPesquisa"><input type="button" name="botaoPesquisa" value="Pesquisar" onclick="pesquisaProduto();">         
        <br>
        
        
        <hr>
        <div id="resultado"> 
        
        
        
        </div>
        
</section>
    
    
</section>
 <?php include("../index/footer.php"); ?>