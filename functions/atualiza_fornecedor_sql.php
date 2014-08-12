<?php
include_once '../Class/conexao.class.php';
include_once '../Class/fornecedor/fornecedor.class.php';

$fornecedor= new fornecedor();
$fornecedor->setCodigoFornecedor($_POST["codigoFornecedor"]);
$fornecedor->setNomeFornecedor($_POST["nomeFornecedor"]);
$fornecedor->setEndereco($_POST["enderecoFornecedor"]);
$fornecedor->setEstado($_POST["estado"]);
$fornecedor->setCidade($_POST["cidade"]);
$fornecedor->setCnpj($_POST["cnpjFornecedor"]);
$fornecedor->setEmail($_POST["emailFornecedor"]);
$fornecedor->setTelefone($_POST["telefoneFornecedor"]);
$fornecedor->setCep($_POST["cepFornecedor"]);

$con = new conexao();
$con->connect();
$fornecedor->setTabela("fornecedor");
$fornecedor->atualizar("nome='".$fornecedor->getNomeFornecedor()."',endereco='".$fornecedor->getEndereco()."',estado='".$fornecedor->getEstado()."',cidade='".$fornecedor->getCidade()."',cnpj='".$fornecedor->getCnpj()."',email='".$fornecedor->getEmail()."',telefone='".$fornecedor->getTelefone()."',cep='".$fornecedor->getCep()."'","idfornecedor='".$fornecedor->getCodigoFornecedor()."'");

$con->disconnect();

?>
