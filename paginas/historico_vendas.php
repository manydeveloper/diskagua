<?php
include_once '../index/header.php';

?>

<section id="content">
    
    <section id="menu">
        <?php include_once '../index/menuSuperior.php'; ?>
    </section>
    
    <section id="historico" class="well well-lg" style="margin-left: 100px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; min-height: 650px;">
    <fieldset>
            <legend>
                Histórico de Compras do Cliente
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
            <select id="histoEstado" name="estado" onchange="pesquisaCidade()"><?php include_once '../functions/pesquisaEstado_sql.php'; ?></select><br><br>
            <label>Cidade</label><br>
            <select id="histoCidade" name="cidades">
                <?php $_GET["sigla"]="SP";
                include_once '../functions/pesquisaCidade_sql.php';?>
            </select>
            </div><br>
            <label> Pesquisar  </label><br>
            <input class="pula" type="text" name="campoPesquisa" id="campoPesquisaHis"><a class="pula" href="#modal_historico" name="modal" onclick="pesquisaCliente();"> Pesquisar </a>         
            <br>
            <br>
            </div>

        <div class="boxes" >
            <div id="modalHistorico" class="window" >
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
            <div id="mask" style="width: 1366px; height: 318px; display: none; opacity: 0.8;"></div>
        </div>
        <hr>
    </section>
    
</section>

<?php 
include_once '../index/footer.php';
?>