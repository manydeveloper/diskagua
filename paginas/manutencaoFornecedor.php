<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menu" style="margin-left: 10px;" >
        <?php include("../index/menu.php"); ?>
    </section>
    
    <section id="manutencao" class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; height: 490px;">
    <fieldset>
            <legend>
                Manutenção de Fornecedores
            </legend>   
        </fieldset>           
        <div id="pesq">
            <label> Pesquisar <input class="input-sm" type="text" name="campoPesquisa" id="campoPesquisa"></label><a href="#dialog3" name="modal" onclick="pesquisaFornecedor();"> Pesquisar </a>         
        <br>
        <br>
        <div class="checkbox-inline">
        <label>Codigo
        <input type="radio" name="pesquisaFornecedor" id="idCliente" value="idfornecedor">
        </label>
        <label>Nome
        <input type="radio" name="pesquisaFornecedor" id="nome" value="nome">
        </label>
        <label>Cnpj
        <input type="radio" name="pesquisaFornecedor" id="cpf" value="cnpj">
        </label>
        </div>
        </div>
        <div id="boxes" >
        <div id="dialog3" class="window" >
            <a href="#" class="close">Fechar [X]</a><br>
            <div id="cabecalhoResultado">

                    <table class="table" cellspacing=0 >
                        <thead >
                            <tr>
                                <th id="thcodigoFornecedor"> Codigo </th>
                                <th id="thnomeFornecedor"> Nome </th>
                                <th id="thenderecoFornecedor"> Endereço </th>
                                <th id="thestadoFornecedor"> Estado </th>
                                <th id="thcidadeFornecedor"> Cidade </th>
                                <th id="thcnpj"> CNPJ </th>
                                <th id="themailFornecedor"> E-Mail </th>
                                <th id="thtelefoneFornecedor"> Telefone </th>
                                <th id="thcepFornecedor"> CEP </th>
                                <th id="thexcluirFornecedor"> excluir </th>
                                <th id="theditarFornecedor"> editar </th>
                            </tr>
                        </thead>
                    </table>
                    
         <div id="resultado"> 
        
        
        
        </div>
            </div>
         </div>
            <div id="mask" style="width: 1366px; height: 318px; display: none; opacity: 0.8;"></div>
                </div>
        
        
        
        <div id="resultado"> 
            
               
        
        
        </div>
        
        
        
        
        
        
        
        </section> 
    
    
    
    
    
    
    <?php include("../index/footer.php"); ?>