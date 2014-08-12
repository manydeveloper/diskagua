<!doctype html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


<title>PIT-STOP</title>
</head>

<?php
include '../Class/conexao.class.php';
include '../Class/venda/venda.class.php';
include '../Class/item/item.class.php';
include '../Class/cliente/Cliente.class.php';
$con = new conexao();
$con->connect();

//----------------------recebendo id de venda!//-----------------------

 $idVendas = $_GET["idVenda"];
 
 //-------------------consulta a ultima venda!//--------------------------
 
 $venda = new venda();
 $venda->setTabela("vendas");
 $resVenda=$venda->listarVendas("idvendas", $idVendas);
 $dadosVenda= mysql_fetch_array($resVenda);
 
 $venda->setCodigoCliente($dadosVenda["idCliente"]);
 $venda->setDataVenda($dadosVenda["data"]);
 $venda->setValorTotal($dadosVenda["valorTotal"]);
 $venda->setDesconto($dadosVenda["desconto"]);
 $venda->setEnderecoEntrega($dadosVenda["enderecoEntrega"]);
 $venda->setFormaPagamento($dadosVenda["formaPagamento"]);
 
  list($rua, $complemento, $bairro, $cidade)= explode("#", $venda->getEnderecoEntrega());  
 
 //--------------------consulta os itens da Venda! //--------------
 
 $item = new item();
 $item->setTabela("item");
 $resItem=$item->listarItens("idvendas", $idVendas);
 
 //--------------------consulta dados do cliente! //---------------------
 
 $cliente = new Cliente();
 $cliente->setTabela("cliente");
 $resCliente=$cliente->listarClienteSimples("idCliente", $venda->getCodigoCliente());
 $dadosCliente= mysql_fetch_array($resCliente);
 
 $cliente->setCodigoCliente($dadosCliente["idCliente"]);
 $cliente->setNomeCliente($dadosCliente["nome"]);
?>

<body>
    <section id="content_Cupom">
    <table>
        <thead>
        <tr>
            <caption><strong>PIT STOP - AGUA MINERAL E GAS</strong></caption>
            
        </tr>
        <tr>
            <caption><strong>RUA: 14 DE JULHO, 570 CENTRO  SJBV/SP</strong></caption>
        </tr>
        <tr>
            <caption><strong>CEP: 13870742 CNPJ: 000.000.000./0001-00</strong></caption>
        </tr>
        <tr>
            <th>-----------------------------------------------------------</th>
        </tr>
        
    </thead>
    </table>
    <table class="table_cupom_cont">
        <td><strong>RECIBO:</strong><?PHP echo $idVendas; ?></td>
        <td><strong>DATA_VEN:</strong><?php echo date("d/m/y",  strtotime($venda->getDataVenda())); ?></td>
    </table>
    <table class="table_cupom_cont">
        <td><strong>CLIENTE:</strong><?php echo $cliente->getNomeCliente(); ?></td>
        <td><strong>COD:</strong><?php echo $cliente->getCodigoCliente(); ?></td>
    </table>
    <table class="table_cupom_cont">
        <td><strong>END: </strong><?php echo $rua ?><br> <strong>COMPL:</strong><?php echo $complemento ?></td>
        <td><strong> BAIRRO:</strong> <?php echo $bairro ?></td>
    </table>
    <table class="table_cupom_cont">     
        <tbody>
        <caption><strong>PRODUTOS</strong></caption>
            <tr>
                <td><strong>ITEM</strong></td>
                <td><strong>&nbsp&nbsp&nbsp --------DESCRICAO--------</strong></td>
                <td><strong>QTD.</strong></td>
                <td><strong>VL_UN</strong></td>
                <td><strong>TOTAL</strong></td>  
            </tr>
        <?php $i=0; while ($dadosItem[$i]= mysql_fetch_array($resItem)){?>
        <tr>
            <td><?php echo $dadosItem[$i]['idProduto']; ?></td>
            <td><?php echo $dadosItem[$i]["produto"]; ?></td>
            <td><?php echo $dadosItem[$i]["quantidade"]; ?></td>
        <td><?php echo number_format($dadosItem[$i]["valor"],2,",","."); ?></td>
            <td><?php echo number_format($dadosItem[$i]["valor"]*$dadosItem[$i]["quantidade"],2,",",".");?></td>
        </tr>
        <?php $i++; } ?>
        
    </tbody>
</table>
    <table>
        <tr>
            <td class="fonte_xsmall_cupom"><br><strong>TOTAL COMP:</strong><?php echo number_format($venda->getValorTotal(),2,",",".")?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong>DESCONTO:</strong><?php echo $venda->getDesconto(); ?> % </td>
        </tr>
        <tr>
            <td class="fonte_xsmall_cupom"><strong>RECEBIMENTO:</strong><?php echo $venda->getFormaPagamento(); ?> </td>
        </tr>
        <tr>
            <td><strong>-----------------------------------------------------------</strong></td>
        </tr>
        <tr>
            <td><br>ASS:________________________</td>
        </tr>
    </table>
    <br>
    <br>
    <!-- cupom que fica com ocliente  -->
    <table>
        <tr>
            <caption><strong>AGRADECEMOS A PREFERÊNCIA</strong></caption>
            
        </tr>
        <tr>
            <caption><strong>PIT STOP - AGUA MINERAL E GAS</strong></caption>
        </tr>
        <tr>
            <caption><strong>FONES: 36233763 - 36234082</strong></caption>
        </tr>
    </table>
    
    <table class="table_cupom_cont">
        <td><strong>RECIBO:</strong><?PHP echo $idVendas; ?></td>
        <td><strong>DATA_VEN:</strong><?php echo date("d/m/y",  strtotime($venda->getDataVenda())); ?></td>
    </table>
    <table class="table_cupom_cont">
        <td><strong>CLIENTE:</strong><?php echo $cliente->getNomeCliente(); ?></td>
        <td><strong>COD:</strong><?php echo $cliente->getCodigoCliente(); ?></td>
    </table>
    <table class="table_cupom_cont">     
        <tbody>
        <caption><strong>PRODUTOS</strong></caption>
            <tr>
                <td><strong>ITEM</strong></td>
                <td><strong>&nbsp&nbsp&nbsp --------DESCRICAO--------</strong></td>
                <td><strong>QTD.</strong></td>
                <td><strong>VL_UN</strong></td>
                <td><strong>TOTAL</strong></td>  
            </tr>
        <?php $j=0; while($j< count($dadosItem)-1){;?>
        <tr>
            <td><?php echo $dadosItem[$j]['idProduto']; ?></td>
            <td><?php echo $dadosItem[$j]["produto"]; ?></td>
            <td><?php echo $dadosItem[$j]["quantidade"]; ?></td>
            <td><?php echo number_format($dadosItem[$j]["valor"],2,",","."); ?></td>
            <td><?php echo number_format($dadosItem[$j]["valor"]*$dadosItem[$j]["quantidade"],2,",",".");?></td>
        </tr>
        <?php $j++;} ?>
        
    </tbody>
    </table>
    <table>
        <tr>
            <td class="fonte_xsmall_cupom"><br><strong>TOTAL COMP:</strong><?php echo number_format($venda->getValorTotal(),2,",",".")?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong>DESCONTO:</strong><?php echo $venda->getDesconto(); ?> % </td>
        </tr>
        <tr>
            <td class="fonte_xsmall_cupom"><strong>RECEBIMENTO:</strong><?php echo $venda->getFormaPagamento(); ?> </td>
        </tr>
    </table>
</section>
</body>

</html>