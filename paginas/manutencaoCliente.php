<?php
include("../index/header.php");

?>
<meta charset="utf-8">
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menuSuperior" >
        <?php include("../index/menuSuperior.php"); ?>
    </section>

    <section class="well well-lg, wrapper" style=" float: left; width: 70%;  ">
    <fieldset>
            <legend>
                Manutenção de Clientes
            </legend>   
        </fieldset>
        
        <div id="pesq">
            <div>
            <label>Endereço</label><input type="radio" name="pesquisaCliente" id="idCliente" value="endereco" onclick="mostraCombosUF_Cidade()">
            <label>Nome</label><input type="radio" name="pesquisaCliente" id="nome" value="nome" onclick="mostraCombosUF_Cidade()">
            <label>CPF</label><input type="radio" name="pesquisaCliente" id="cpf" value="cpf" onclick="mostraCombosUF_Cidade()">
            <label>CNPJ</label><input type="radio" name="pesquisaCliente" id="cnpj" value="cnpj" onclick="mostraCombosUF_Cidade()">
            </div>
            <div id="comboCidades" style="display: none">
            <label>Estado</label><br>
            <select id="manutEstado" name="estado" onchange="pesquisaCidade()"><?php include_once '../functions/pesquisaEstado_sql.php'; ?></select><br><br>
            <label>Cidade</label><br>
            <select id="manutCidade" name="cidades">
                <?php $_GET["sigla"]="SP";
                include_once '../functions/pesquisaCidade_sql.php';?>
            </select>
            </div><br>
            <label> Pesquisar  </label><br>
            <input class="pula" type="text" name="campoPesquisa" id="campoPesquisa"><a class="pula" href="#dialog" name="modal" onclick="pesquisaCliente();"> Pesquisar </a>         
            <br>
            <br>
            </div>

        <div class="boxes" >
            <div id="dialog" class="window" >
                <a href="#" class="close">Fechar [X]</a><br>
                <div id="cabecalhoResultado">
               
                    <table class="table table-striped"">
                        <thead>
                            <tr>
                                <th> Codigo </th>
                                <th> Nome/Editar </th>
                                <th> E-mail </th>
                                <th> Desconto <br>Fixo </th>
                                <th>Saldo</th>
                                <th> Limite <br>Credito </th>
                                <th> excluir </th>
                                <th> Vendas </th>
                            </tr>
                        </thead>
                        <tbody id="resultado">
                             
                        </tbody>
                    </table>
                    
               
                </div>    
               
            </div>
            <div id="mask" ></div>
        </div>
    </section> 






    <?php include("../index/footer.php"); ?>