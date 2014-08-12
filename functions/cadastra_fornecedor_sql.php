<?php

include  '../Class/conexao.class.php';
include  '../Class/fornecedor/fornecedor.class.php';

$fornecedor= new fornecedor();

$fornecedor->setNomeFornecedor($_POST['nomeFornecedor']);
$fornecedor->setEndereco($_POST['enderecoFornecedor']);
$fornecedor->setEstado($_POST['estado']);
$fornecedor->setCidade($_POST['cidade']);
$fornecedor->setCnpj($_POST['cnpjFornecedor']);
$fornecedor->setEmail($_POST['emailFornecedor']);
$fornecedor->setTelefone($_POST['telefoneFornecedor']);
$fornecedor->setCep($_POST['cepFornecedor']);


$con = new conexao();
$con->connect();

$fornecedor->setTabela("fornecedor");

echo  $fornecedor->inserir("nome,endereco,estado,cidade,cnpj,email,telefone,cep","'".$fornecedor->getNomeFornecedor()."','".$fornecedor->getEndereco()."','".$fornecedor->getEstado()."','".$fornecedor->getCidade()."','".$fornecedor->getCnpj()."','".$fornecedor->getEmail()."','".$fornecedor->getTelefone()."','".$fornecedor->getCep()."'");

$con->disconnect();


?>
