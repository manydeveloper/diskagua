<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menuSuperior" >
        <?php include("../index/menuSuperior.php"); ?>
    </section>
    
    <section class="well well-lg, wrapper">
        <fieldset>
            <legend>
                Manutenção de Produtos
            </legend>   
        </fieldset>    
        
        
        <div id="pesq">
        <div>
        <label>Codigo
        <input type="radio" name="pesquisaProduto" id="idCliente" value="idProduto">
        </label>
        <label>Nome
        <input type="radio" name="pesquisaProduto" id="nome" value="nome">
        </label>
        <label>Fornecedor
        <input type="radio" name="pesquisaProduto" id="fornecedor2" value="fornecedor">
        </label>
            <br>
        </div>
            <br>    
            <label> Pesquisar </label><br>
            <input class="input-sm"type="text" name="campoPesquisa" id="campoPesquisa"><a href="#modalManuProd" name="modal" onclick="pesquisaProduto();"> Pesquisar </a>         
        
        </div>
        <div class="boxes" >
        <div id="modalManuProd" class="window" >
             
                <table  class="table" >
                    <thead class="">
                        <tr>
                            <th> Codigo </th>
                            <th> Nome </th>
                            <th> Fornecedor </th>
                            <th> Quantidade </th>
                            <th> Valor <br> Compras </th>
                            <th> Valor <br> Venda </th>
                            <th> Excluir </th>
                            <th> Editar </th>
                    </thead>
                    <tbody id="resultado">
                        
                    </tbody>
                    </table>
            
         </div>
            <div id="mask" ></div>
        </div>
        
        </section> 
    
    
    
    
    
    
    <?php include("../index/footer.php"); ?>
