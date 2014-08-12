<?php
include '../Class/conexao.class.php';
include '../Class/cliente/Cliente.class.php';
include '../Class/endereco/endereco.class.php';

$opcao= $_GET["opcao"];
$pesquisa= $_GET["campo"];
$cidade = $_GET["cidade"];

$con = new conexao;
$con->connect();

$lista= new Cliente();
$end= new endereco();

$lista->setTabela("cliente");
$tabela="";

if($opcao==="nome" || $opcao==="cpf" || $opcao==="cnpj"){

$result= $lista->listarClienteSimples($opcao,$pesquisa);
    if(isset($result)){
        while($campo = mysql_fetch_array($result)){ // laÃ§o de repetiÃ§ao que vai trazer todos os resultados da consulta
            $tabela.= "<tr><td id='thcodigo' >".$campo['idCliente']."</td><td id='thnome'><strong>".$campo['nome']."</strong><a href=\"../paginas/cadastra_Cliente.php?id=".$campo['idCliente']."\"><img src='../imagens/view.png'></a></td><td id='themail'>".$campo['email']."</td><td id='thdescFixo'>".$campo['descFixo']."</td><td id='thsaldo'>".$campo['saldo']."</td><td id='thlimiteCredito'>".$campo['limiteCredito']."</td><td id='thexcluir'><a href=\"../functions/excluirCliente.php?id=".$campo['idCliente']."\"><img src='../imagens/excluir.PNG'></a></td><td id='thvenda'><a href=\"../paginas/cadastra_venda.php?id=".$campo['idCliente']."\"><img src='../imagens/carrinho.PNG'></a></td></tr>";
        }
    }  else {
        $tabela="Nenhum resultado encontrado !";
    }
               
echo $tabela;
}  else {
        $end->setTabela("cep");
        if($pesquisa!=null){
            $cep = $end->pesquisaCepNomeRua("idCidade=".$cidade." and nomeRua='".$pesquisa."'");
        }else{
            echo 'Favor digitar o nome da rua desejada!';
            exit();
        }
        while($numCep = mysql_fetch_array($cep)){
            $lista->setTabela("cliente, endereco");
            $cliente=$lista->listarClientesCep($numCep["cep"]);
            
            while ($dadosCliente = mysql_fetch_array($cliente)){
                $tabela.= "<tr><td id='thcodigo' >".$dadosCliente['idCliente']."</td><td id='thnome'><strong>".$dadosCliente['nome']."</strong><a href=\"../paginas/cadastra_Cliente.php?id=".$dadosCliente['idCliente']."\"><img src='../imagens/view.png'></a></td><td id='themail'>".$dadosCliente['email']."</td><td id='thdescFixo'>".$dadosCliente['descFixo']."</td><td id='thsaldo'>".$dadosCliente['saldo']."</td><td id='thlimiteCredito'>".$dadosCliente['limiteCredito']."</td><td id='thexcluir'><a href=\"../functions/excluirCliente.php?id=".$dadosCliente['idCliente']."\"><img src='../imagens/excluir.PNG'></a></td><td id='thvenda'><a href=\"../paginas/cadastra_venda.php?id=".$dadosCliente['idCliente']."\"><img src='../imagens/carrinho.PNG'></a></td></tr>";
            }
        }
        
    echo $tabela;
}

?>
