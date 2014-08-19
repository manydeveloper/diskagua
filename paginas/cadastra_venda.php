<!DOCTYPE html>
<?php
include_once("../index/header.php");
include_once("../Class/conexao.class.php");


if (!empty($_GET["id"])) {
    $verifica = true;
    $con = new conexao();
    $con->connect();
    $sql_cliente = "select * from cliente where idCliente=" . $_GET["id"];
    $sel_cliente = mysql_query($sql_cliente);
    $cliente = mysql_fetch_array($sel_cliente);

    $sql_end = "select * from endereco where idCliente=" . $_GET["id"];
    $sel_end = mysql_query($sql_end);


    $sql_tel = "select * from telefone where idCliente=" . $_GET["id"];
    $sel_tel = mysql_query($sql_tel);
    $tel = mysql_fetch_array($sel_tel);

    $sql_galao = "select * from cliente_galao where idCliente='" . $_GET["id"] . "';";
    $sel_galao = mysql_query($sql_galao);

    $con->disconnect();
} else {
    $verifica = FALSE;
}
?>

<section  id="menu" style="margin-left: 5px; float: left; height: 100%;">
    <?php include("../index/menuSuperior.php"); ?>
</section>


<section  class="well well-lg, wrapper" >
    <fieldset>
        <legend>
            Cadastra Venda
        </legend>   
    </fieldset>    

    <form name="formVendas" action="../functions/cadastra_venda_sql.php" method="post" onsubmit="return verificaFormVenda()">
            <fieldset>
                <legend>
                    Dados do Produto
                </legend>   
            </fieldset> 
        <div id="conteudoProduto" class="well">
            
            <label > Nome Produto</label><input class="pula" type="text" name="campoPesquisa" id="campoPesquisa" placeholder="Nome Produto"><a class="pula" href="#modal_cad_venda" name="modal" onclick="pesquisaProdutoVenda();" ><img src="../imagens/lupex.png" style=" margin-left: 15px;">  </a>        

            <div class="boxes" >
                <div id="modal_cad_venda" class="window" >
                    <a href="#" class="close">Fechar [X]</a><br>
                    

                        <table class="table table-striped" id >
                            <thead>
                                <tr><th> Codigo </th>
                                    <th> Nome </th>
                                    <th> Fornecedor </th>
                                    <th> Quantidade </th>
                                    <th> Valor <br> Compras </th>
                                    <th> Valor <br> Venda </th>
                                    <th> ADD </th>
                                </tr>
                            </thead>
                            <tbody id="resultado">

                            </tbody>

                        </table>

                   
                </div>
            </div>

            <div id="tabelaVendaProduto">
                <table>
                    <thead id="cabTabelaVenda"  >
                        <tr>
                            <th> Codigo </th>
                            <th> Nome </th>
                            <th>Quantidade</th>
                            <th>Valor de Venda</th>
                            <th>Sub Total</th>
                            <th >X</th>
                        </tr>
                    </thead>
                    <tbody id="AddItem" >

                    </tbody>
                </table>
            </div>

            <div id="fundoValores">

                <label>Valor Total</label>  

                <input type="number" name="valorTotal" id="inputValorTotal" value="0" readonly>

                <label>Desconto</label>

                <input class="pula" style="width: 15%;" type="number" name="valorDesconto" id="inputValorDesconto" value="<?php if (!empty($cliente["descFixo"])) {
        echo $cliente["descFixo"];
    } else {
        echo 0;
    }; ?>" onchange="calcValorTotal()">

                <label>Forma de Pagamento</label>

                <select class="pula" id="comboPagamento" name='formaPagamento' onchange="verificaSaldoXCredito();">
                    <option selected value='Pendente'>Pendente</option>
                    <option value='À Vista'>À Vista</option> 
                    <option value='Cartão Credito'>Cartão Credito</option> 
                    <option value='Cartão Débito'>Cartão Débito</option>
                    <option value='Cheque'>Cheque</option> 
                    <option value='Crediario'>Crediario</option>
                </select>
            </div>

            <div id='botoesVenda'>

                <a href="../paginas/Home.php" name="botaoCancelaVenda" id="botaoCancelaVenda" ><img src="../imagens/excluirGrande.PNG"   ></a>

                <input class="pula" type="image" name="botaoVenda" id="botaoVenda" src="../imagens/certogrande.PNG" onclick="">
            </div>

        </div>
        <div class="well"id="conteudoCliente">
            <fieldset>
                <legend>
                    Dados do Cliente
                </legend>   
            </fieldset>    

            <div id="camposForm" style="width: 90%;">
                <input type="hidden" name="idCliente" value="<?php if ($verifica == true) {
        echo $cliente["idCliente"];
    } else {
        echo"0";
    } ?>">
                <label>Nome</label><input type="text" name="nomeCliente" id="inputnome" readonly style="width: 60%;" value=" <?php if ($verifica == true) {
                        echo $cliente["nome"];
                    } else {
                        echo 'Nome Cliente';
                    } ?>" >             
                <br>
                <label>Endereço</label>
                <select class="pula" name='comboEndereco' id='comboEndereco' onchange="setComplementoEnd(this.value);"> 
                    <option value="endereço">Endereco</option>
                    <?php
                    if ($verifica == true) {
                        $con->connect();
                        while ($end = mysql_fetch_array($sel_end)) {
                            $sql_cep = "select nomeRua, nome_bairro,cidades.cidade from cep,bairros, cidades where cep=" . $end['cep'] . " and bairros.idBairro = cep.bairro and cep.idCidade = cidades.idCidade;";
                            $sel_cep = mysql_query($sql_cep);
                            $cep = mysql_fetch_array($sel_cep);
                            ?>
                            <option value="<?php echo $cep["nomeRua"] . '#' . $end["complemento"] . '#' . $cep["nome_bairro"] . '#' . $cep["cidade"]; ?>" ><?php echo '' . $cep["nomeRua"] . '  N:' . $end['numero']; ?></option>
    <?php
    }
    $con->disconnect();
}
?>
                </select> 
                <label>Bairro</label>
                <input type="text" name="bairro" id="inputBairro" readonly style="width: 35%;">
                <br>
                <label>Complemento Endereco</label>
                <input type="text" name="complemento" id="inputComplemento" readonly style="width: 60%;">
                <br>
                <label>Telefone</label>
                <input type="text" name="telefone" id="inputtelefone" readonly value="<?php if ($verifica == true) {
    echo $tel["telefone"];
} else {
    echo 'Telefone';
} ?>">
                <br>
                <label>Saldo</label>
                <input type="number" name="saldo" id="inputSaldo" readonly value="<?php if ($verifica == true) {
    echo $cliente["saldo"];
} else {
    echo 'saldo';
} ?>">
                <br>
                <label>Desconto Fixo</label>
                <input type="number" name="descFixo" id="inputDescFixo" readonly value="<?php if ($verifica == true) {
                            echo $cliente["descFixo"];
                        } else {
                            echo 'Desconto Fixo';
                        } ?>">
                <br>
                <label>Limite Credito</label>
                <input type="number" name="limiteCredito" id="inputLCredito" readonly value="<?php if ($verifica == true) {
                            echo $cliente["limiteCredito"];
                        } else {
                            echo 'Limite Credito';
                        } ?>">
                <br>

                <table>
                    <thead>
                        <tr>
                            <th>tipo Galao</th>
                            <th>Data Galao</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>

<?php
if ($verifica == true && mysql_num_rows($sel_galao) > 0) {
    while ($galao = mysql_fetch_array($sel_galao)) {
        ?>   
                                <tr>
                                    <td><?php echo $galao["tipoGalao"]; ?></td>
                                    <td><?php echo $galao["dataGalao"]; ?></td>
                                    <td><?php echo $galao["qtdGalao"]; ?></td>
                                </tr>   
        <?php
    }
} else {
    ?>
                            <tr>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>   

    <?php
}
?>

                    </tbody>
                </table>
            </div>
        </div>



    </form>

</section>


<?php include("../index/footer.php"); ?>
