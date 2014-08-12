<?php

include '../Class/conexao.class.php';
$pessoa = $_POST["pessoa"];

if ($pessoa == "fisica") {
    require_once '../Class/cliente/fisica.class.php';
    $pessoaFisica = new fisica();
    $pessoaFisica->setCpf($_POST["cpf"]);
    $pessoaFisica->setRg($_POST["rg"]);
    if (!empty($_POST["datanascimento"])) {
        $pessoaFisica->setDataNascimento($_POST["datanascimento"]);
    } else {
        $pessoaFisica->setDataNascimento("00/00/0000");
    }
    $pessoaFisica->setSexo($_POST["sexo"]);
    
    if(!empty($_POST["limiteCreditoFisico"])){
        $pessoaFisica->setLimiteCredito($_POST["limiteCreditoFisico"]);
    }else{
        $pessoaFisica->setLimiteCredito(0);
    }
    
    $pessoaFisica->setObservacao($_POST["observacaoFisico"]);
    $pessoaFisica->setNomeCliente($_POST["nomeCliente"]);
    if(!empty($_POST["descFixo"])){
        $pessoaFisica->setDescFixo($_POST["descFixo"]);
    }  else {
        $pessoaFisica->setDescFixo(0);
    }
    
    $pessoaFisica->setEmail($_POST["email"]);

    $con = new conexao();
    $con->connect();

    $pessoaFisica->setTabela("Cliente");
    $resInsert = $pessoaFisica->inserir("nome,email,descFixo,limiteCredito,Observacao", "'" . $pessoaFisica->getNomeCliente() . "','" . $pessoaFisica->getEmail() . "','" . $pessoaFisica->getDescFixo() . "','" . $pessoaFisica->getLimiteCredito() . "','" . $pessoaFisica->getObservacao() ."'");

    $sql = "SELECT MAX(idCliente)as ultimo_id From Cliente";
    $res = mysql_query($sql);
    $id = mysql_fetch_array($res);

    if ($resInsert == TRUE) {
        $pessoaFisica->setTabela("cliente_fisico");
        $pessoaFisica->inserir("idCliente,cpf,rg,dataNascimento,sexo", $id["ultimo_id"] . ",'" . $pessoaFisica->getCpf() . "','" . $pessoaFisica->getRg() . "','" . $pessoaFisica->getDataNascimento() . "','" . $pessoaFisica->getSexo() . "'");

        $pessoaFisica->setTabela("telefone");
        $telefone = ($_POST["telefone"]);

        foreach ($telefone as $tel) {
            if (!empty($tel)) {
                $pessoaFisica->setTelefone($tel);
                $pessoaFisica->inserir("idCliente,telefone", $id["ultimo_id"] . ",'" . $pessoaFisica->getTelefone() . "'");
            }
        }

        $pessoaFisica->setTabela("endereco");
        $cep = ($_POST["cep"]);
        $numero = $_POST["numero"];
        $complemento= $_POST["complemento"];
        for ($i = 0; $i < count($cep); $i++) {
            if (!empty($cep[$i])) {
                $pessoaFisica->setCep($cep[$i]);
            }
            if (!empty($numero[$i])) {
                $pessoaFisica->setNumero($numero[$i]);
            } else {
                $pessoaFisica->setNumero(0);
            }
            $pessoaFisica->setComplemento($complemento[$i]);
            $pessoaFisica->inserir("idCliente,cep,numero,complemento", "'" . $id["ultimo_id"] . "','" . $pessoaFisica->getCep() . "','" . $pessoaFisica->getNumero() ."','".$pessoaFisica->getComplemento(). "'");
        }
        
        $pessoaFisica->setTabela("cliente_galao");
        $qtGalao=$_POST["quantgalao"];
        $tipoGalao=$_POST["tipoGalao"];
        $dataGalao=$_POST["dataDoGalao"];
        
        for ($i = 0; $i < count($qtGalao); $i++) {
            $pessoaFisica->setQtfiltros($qtGalao[$i]); 
            $pessoaFisica->setTipoGalao($tipoGalao[$i]);
            $pessoaFisica->setDataGalao($dataGalao[$i]);
            
           $pessoaFisica->inserir("idCliente,tipoGalao,qtdGalao,dataGalao", "'".$id["ultimo_id"]."','".$pessoaFisica->getTipoGalao()."','".$pessoaFisica->getQtfiltros()."','".$pessoaFisica->getDataGalao()."'");
        }
    } else {
        echo"Erro ao inserir pessoa Fisica!";
    }

    $con->disconnect();
} elseif ($pessoa == "juridica") {

    require_once '../Class/cliente/juridica.class.php';
    $pessoaJuridica = new juridica();
    
    $pessoaJuridica->setCnpj($_POST["cnpj"]);
    $pessoaJuridica->setInscricaoEstadual($_POST["inscricaoEstadual"]);
    if(!empty($_POST["limiteCreditoJuridico"])){
        $pessoaJuridica->setLimiteCredito($_POST["limiteCreditoJuridico"]);
    }else{
        $pessoaJuridica->setLimiteCredito(0);
    }
    $pessoaJuridica->setObservacao($_POST["observacaoJuridico"]);
    $pessoaJuridica->setNomeCliente($_POST["nomeCliente"]);
    $pessoaJuridica->setEmail($_POST["email"]);
    if(!empty($_POST["descFixo"])){
        $pessoaJuridica->setDescFixo($_POST["descFixo"]);
    }  else {
        $pessoaJuridica->setDescFixo(0);
    }
    
    $con = new conexao();
    $con->connect();

    $pessoaJuridica->setTabela("Cliente");
    $resInsert = $pessoaJuridica->inserir("nome,email,descFixo,limiteCredito,Observacao", "'" . $pessoaJuridica->getNomeCliente() . "','" . $pessoaJuridica->getEmail() . "','" . $pessoaJuridica->getDescFixo() . "','" . $pessoaJuridica->getLimiteCredito() . "','" . $pessoaJuridica->getObservacao() ."'");
    
    $sql = "SELECT MAX(idCliente)as ultimo_id From Cliente";
    $res = mysql_query($sql);
    $id = mysql_fetch_array($res);
    
    if ($resInsert == TRUE) {
        $pessoaJuridica->setTabela("cliente_juridico");
        $pessoaJuridica->inserir("idCliente,cnpj,inscricaoEstadual", $id["ultimo_id"] . ",'" . $pessoaJuridica->getCnpj() . "','" . $pessoaJuridica->getInscricaoEstadual() . "'");

        $pessoaJuridica->setTabela("telefone");
        $telefone = ($_POST["telefone"]);

        foreach ($telefone as $tel) {
            if (!empty($tel)) {
                $pessoaJuridica->setTelefone($tel);
                $pessoaJuridica->inserir("idCliente,telefone", $id["ultimo_id"] . ",'" . $pessoaJuridica->getTelefone() . "'");
            }
        }


        $pessoaJuridica->setTabela("endereco");
        $cep = ($_POST["cep"]);
        $numero = $_POST["numero"];
        $complemento= $_POST["complemento"];
        for ($i = 0; $i < count($cep); $i++) {
            if (!empty($cep[$i])) {
                $pessoaJuridica->setCep($cep[$i]);
            }
            if (!empty($numero[$i])) {
                $pessoaJuridica->setNumero($numero[$i]);
            } else {
                $pessoaJuridica->setNumero(0);
            }
            $pessoaJuridica->setComplemento($complemento[$i]);
            $pessoaJuridica->inserir("idCliente,cep,numero,complemento", "'" . $id["ultimo_id"] . "','" . $pessoaJuridica->getCep() . "','" . $pessoaJuridica->getNumero() ."','".$pessoaJuridica->getComplemento(). "'");
        }
        
        $pessoaJuridica->setTabela("cliente_galao");
        $qtGalao=$_POST["quantgalao"];
        $tipoGalao=$_POST["tipoGalao"];
        $dataGalao=$_POST["dataDoGalao"];
        
        for ($i = 0; $i < count($qtGalao); $i++) {
            $pessoaJuridica->setQtfiltros($qtGalao[$i]); 
            $pessoaJuridica->setTipoGalao($tipoGalao[$i]);
            $pessoaJuridica->setDataGalao($dataGalao[$i]);
            
           $pessoaJuridica->inserir("idCliente,tipoGalao,qtdGalao,dataGalao", "'".$id["ultimo_id"]."','".$pessoaJuridica->getTipoGalao()."','".$pessoaJuridica->getQtfiltros()."','".$pessoaJuridica->getDataGalao()."'");
        }
    } else {
        echo "Erro ao inserir pessoa Juridica!";
    }
    $con->disconnect();
}
?>
