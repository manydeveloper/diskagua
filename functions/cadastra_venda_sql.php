<script type="text/javascript" src="../js/script.js"></script>
<?php
include_once '../Class/cliente/Cliente.class.php';
include_once '../Class/venda/venda.class.php';
include_once '../Class/item/item.class.php';
include_once '../Class/produto/produto.class.php';
include_once '../Class/conexao.class.php';


$con = new conexao();
$con->connect();

$venda = new venda();
$venda->setCodigoCliente($_POST["idCliente"]);
$data = getdate();
$venda->setDataVenda("".$data["year"]."/".$data["mon"]."/".$data["mday"]);
$venda->setValorTotal($_POST["valorTotal"]);
$venda->setDesconto($_POST["valorDesconto"]);
$venda->setFormaPagamento($_POST["formaPagamento"]);
$venda->setEnderecoEntrega($_POST["comboEndereco"]);
$venda->setTabela("vendas");
$ResInsert=$venda->inserir("idCliente,data,valorTotal,desconto,formaPagamento,enderecoEntrega", $venda->getCodigoCliente().",'".$venda->getDataVenda()."',".$venda->getValorTotal().",".$venda->getDesconto().",'".$venda->getFormaPagamento()."','".$venda->getEnderecoEntrega()."'");

    
    if ($ResInsert==true){
        //pegando o idVenda da tabela vendas para fazer o insert na tabela item
        $sql = "SELECT MAX(idvendas)as ultimo_id From vendas;";
        $res = mysql_query($sql);
        $idVendas = mysql_fetch_array($res);
        
        $item = new item();
        
        $codigoProduto = $_POST["codigoProduto"];
        $produto = $_POST["nomeProduto"];
        $quantidade = $_POST["qtdUni"];
        $valor = $_POST["valorVenda"];
       
        
        for($i=0;$i< count($codigoProduto);$i++){
            $item->setIdVendas($idVendas["ultimo_id"]);
            $item->setIdProduto($codigoProduto[$i]);
            $item->setProduto($produto[$i]);
            $item->setQuantidade($quantidade[$i]);
            $item->setValor($valor[$i]);
            $item->setTabela("item");
            $item->inserir("idvendas,idProduto,produto,quantidade,valor", $item->getIdVendas().",".$item->getIdProduto().",'".$item->getProduto()."',". $item->getQuantidade() .",". $item->getValor());
            
            $sqlProduto = "select quantidade from Produto where idProduto =".$codigoProduto[$i];  
            $resPro= mysql_query($sqlProduto);
            $estoque = mysql_fetch_array($resPro);
            
           
            if($estoque["quantidade"]>0){
              
                $novaEstoque= $estoque["quantidade"]-$quantidade[$i];
                $produto = new produto();
                $produto->setTabela("Produto");
                $produto->atualizar("quantidade='".$novaEstoque."'","idProduto=".$codigoProduto[$i]);
            }
        }
    }
    
    if($venda->getFormaPagamento()=="Crediario"){
        $cliente = new Cliente();
        $cliente->setTabela("cliente");
        
        $sqlSaldo= "select saldo from cliente where idcliente=".$venda->getCodigoCliente().";";
        $resSaldo=mysql_query($sqlSaldo);
        $saldoBanco=  mysql_fetch_array($resSaldo);
       
      
        $novoSaldo=(floatval($venda->getValorTotal())) + (floatval($saldoBanco["saldo"]));
        
        echo $cliente->atualizar("saldo=".$novoSaldo, "idCliente = ".$venda->getCodigoCliente());
    }
    $con->disconnect();
    ?>
<script>  imprimeCupom(<?php echo $idVendas["ultimo_id"] ?>); </script>
