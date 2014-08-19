<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section   >
        <?php include("../index/menuSuperior.php"); ?>
    </section>
    
    <section  class="well well-lg, wrapper" >
    <fieldset>
            <legend>
                Manutenção de Fornecedores
            </legend>   
        </fieldset>           
        <div id="pesq">
        <div>
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
       
        <br>
        <label> Pesquisar </label><br>
        <input  type="text" name="campoPesquisa" id="campoPesquisa"><a href="#modalManuForn" name="modal" onclick="pesquisaFornecedor();"> Pesquisar </a>         
        <br>
        <br>
        </div>
        <div class="boxes" >
        <div id="modalManuForn" class="window" >
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
            <div id="mask" ></div>
                </div>
        
        
        
        <div id="resultado"> 
            
               
        
        
        </div>
        
        
        
        
        
        
        
        </section> 
    
    
    
    
    
    
    <?php include("../index/footer.php"); ?>