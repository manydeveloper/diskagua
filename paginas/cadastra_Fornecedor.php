<?php
include("../index/header.php");
?>

<section id="content">
    <section style="float: left; margin-left: 10px;">
        <?php include ("../index/menu.php"); ?>
    </section>
    
    <?php
if(empty($_GET["id"])){
    $displayCadastro = "";
    $displayAtualiza = "none";

?>

    
    

    <section id="fornecedor" class="well well-lg" style="margin-left: 20px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; min-height: 650px;">
        <fieldset>
            <legend>
                Cadastro de Fornecedores
            </legend>   
        </fieldset>
        <form style="margin-left: 50px;" class="form-horizontal" name="formFornecedor" action="../functions/cadastra_fornecedor_sql.php" method="post">   
            <label><strong> Nome Fornecedor </strong> </label>
            <br>
            <input class="input-sm" type="text" name="nomeFornecedor" placeholder="NOME">
            <br>
            <br>
            <label><strong> Endereço </strong></label>
            <br>
            <input class="input-sm" type="text" name="enderecoFornecedor" placeholder="ENDEREÇO">
            <br>
            <br>
           <select class="input-sm" name="estado" id="estado" onchange="pesquisaCidadeFormFornecedor();">
                <option value="Selecione">Estado</option>
                <?php require_once '../functions/pesquisaEstado_sql.php';?>
            </select>
           
            <select class="input-sm" name="cidade" id="cidade">
                <option selected value="Selecione">Cidade</option>
               
            </select>
            <br>
            <br>
            <label><strong> CNPJ  </strong></label>
            <br>
            <input class="input-sm" type="text" name="cnpjFornecedor" placeholder="CNPJ">
            <br>
            <br>
            <label><strong> E-mail </strong></label>
            <br>
            <input class="input-sm" type="text" name="emailFornecedor" placeholder="EMAIL">
            <br>
            <br>
            <label><strong> Telefone </strong></label>
            <br>
            <input class="input-sm" type="text" name="telefoneFornecedor" placeholder="TELEFONE">
            <br>
            <br>
            <label><strong> CEP </strong></label>
            <br>
            <input class="input-sm" type="text" name="cepFornecedor" placeholder="CEP">
            <br>
            <br>
            <button class="btn-default" type="submit" name="cadastraFornecedor"> Cadastrar </button>
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
    
    
    $sql_fornecedor = "SELECT fornecedor.idfornecedor,nome,endereco,estado,cidade,cnpj,email,telefone,cep FROM fornecedor WHERE idfornecedor=".$id.";";
    $sel_fornecedor = mysql_query($sql_fornecedor);
    
    $regsFornecedor=  mysql_num_rows($sel_fornecedor);
    
    if($regsFornecedor>0){
        $fornecedor = mysql_fetch_array($sel_fornecedor);
    }else{
    
        echo 'Fornecedor Não econtrado';
    }
    
    
    $con->disconnect();
    ?>

<section id="AtualizaFornecedor" style="display: <?php echo $displayAtualiza; ?>">

    <h1>Atualiza Fornecedor</h1>

    <form name="formFornecedor" action="../functions/atualiza_fornecedor_sql.php" method="post">  
        <input type="hidden" name="codigoFornecedor" value="<?php echo $fornecedor["idfornecedor"]; ?>">
            <label><strong> Nome Fornecedor </strong> </label>
            <br>
            <input type="text" name="nomeFornecedor" value="<?php echo $fornecedor["nome"];?>">
            <br>
            <br>
            <label><strong> Endereço </strong></label>
            <br>
            <input type="text" name="enderecoFornecedor" value="<?php echo $fornecedor["endereco"];?>">
            <br>
            <br>
            <?php
             $_GET["idEstado"]=$fornecedor["estado"];
             $_GET["idCidade"]=$fornecedor["cidade"];
            ?>
           <select  name="estado" id="estado" onchange="pesquisaCidadeFormFornecedor();">
                <option value="Selecione">Estado</option>
                <?php include '../functions/pesquisaEstado_sql.php';?>
            </select>
           
            <select  name="cidade" id="cidade">
                <option selected value="Selecione">Cidade</option>
                <?php include '../functions/pesquisaCidade_sql.php'; ?>
            </select>
            <br>
            <br>
            <label><strong> CNPJ  </strong></label>
            <br>
            <input type="text" name="cnpjFornecedor" value="<?php echo $fornecedor["cnpj"];?>">
            <br>
            <br>
            <label><strong> E-mail </strong></label>
            <br>
            <input type="text" name="emailFornecedor" value="<?php echo $fornecedor["email"];?>">
            <br>
            <br>
            <label><strong> Telefone </strong></label>
            <br>
            <input type="text" name="telefoneFornecedor" value="<?php echo $fornecedor["telefone"];?>">
            <br>
            <br>
            <label><strong> CEP </strong></label>
            <br>
            <input type="text" name="cepFornecedor" value="<?php echo $fornecedor["cep"];?>">
            <br>
            <br>
            <input type="submit" name="atualizaFornecedor" value="Atualizar">
         
</form>





</section>
    <?php }?>
</section>




<?php include("../index/footer.php"); ?>