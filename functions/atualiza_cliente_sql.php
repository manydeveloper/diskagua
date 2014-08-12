<?php

include_once '../Class/conexao.class.php';
$pessoa = $_POST["pessoa"];

if ($pessoa == "fisica") {
     require_once '../Class/cliente/fisica.class.php';
    $pessoaFisica = new fisica();
    $pessoaFisica->setCodigoCliente($_POST["idCliente"]);
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
    }  else {
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
    
    $resAtualiza = $pessoaFisica->atualizar("nome='".$pessoaFisica->getNomeCliente()."',email='".$pessoaFisica->getEmail()."',descFixo='".$pessoaFisica->getDescFixo()."',limiteCredito='".$pessoaFisica->getLimiteCredito()."',observacao='".$pessoaFisica->getObservacao()."'","idCliente=".$pessoaFisica->getCodigoCliente() );

    
    if ($resAtualiza == TRUE) {
        $pessoaFisica->setTabela("cliente_fisico");
        $pessoaFisica->atualizar("cpf='".$pessoaFisica->getCpf()."',rg='".$pessoaFisica->getRg()."',dataNascimento='".$pessoaFisica->getDataNascimento()."',sexo='".$pessoaFisica->getSexo()."'","idCliente=".$pessoaFisica->getCodigoCliente()  );
        
        if(!empty($_POST["telefone"])){
        $pessoaFisica->setTabela("telefone");
        $telefone= ($_POST["telefone"]);
        $idTel=($_POST["id_tel"]);
        
         for ($i=0;$i<count($telefone);$i++) {
            
            $pessoaFisica->setTelefone($telefone[$i]);
            if(isset($idTel[$i])){
                $pessoaFisica->atualizar("telefone='".$pessoaFisica->getTelefone()."'","idTelefone=".$idTel[$i]);
            }else{
                $pessoaFisica->inserir("idCliente,telefone",  $pessoaFisica->getCodigoCliente() . ",'" . $pessoaFisica->getTelefone() . "'");
            }
            
        }
        }
        
        if(!empty($_POST["cep"])){
            $pessoaFisica->setTabela("endereco");
            $cep=$_POST["cep"];
            $numero=$_POST["numero"];
            $complemento=$_POST["complemento"];
            $idEnd=$_POST["idEnd"];
            
           for ($i=0;$i<count($cep);$i++) {
            
            $pessoaFisica->setCep($cep[$i]);
            $pessoaFisica->setNumero($numero[$i]);
            $pessoaFisica->setComplemento($complemento[$i]);
            if(isset($idEnd[$i])){
                $pessoaFisica->atualizar("cep='".$pessoaFisica->getCep()."',numero='".$pessoaFisica->getNumero()."',complemento='".$pessoaFisica->getComplemento()."'","idEndereco=".$idEnd[$i]);
            }else{
                $pessoaFisica->inserir("idCliente,cep,numero,complemento",  $pessoaFisica->getCodigoCliente() . ",'" . $pessoaFisica->getCep() . "','".$pessoaFisica->getNumero()."','".$pessoaFisica->getComplemento()."'");
            }
        }
        }
        if(!empty($_POST["tipoGalao"])){
            $pessoaFisica->setTabela("cliente_galao");
            $tipoGalao=$_POST["tipoGalao"];
            $qtdGalao=$_POST["quantgalao"];
            $dataGalao=$_POST["dataDoGalao"];
            $idGalao=$_POST["id_Galao"];
            
            for ($i=0;$i<count($tipoGalao);$i++) {
                $pessoaFisica->setTipoGalao($tipoGalao[$i]);
                $pessoaFisica->setQtfiltros($qtdGalao[$i]);
                $pessoaFisica->setDataGalao($dataGalao[$i]);
                if(isset($idGalao[$i])){
                $pessoaFisica->atualizar("tipoGalao='".$pessoaFisica->getTipoGalao()."',qtdGalao='".$pessoaFisica->getQtfiltros()."',dataGalao='".$pessoaFisica->getDataGalao()."'","idcliente_galao=".$idGalao[$i]);
            }else{
                $pessoaFisica->inserir("idCliente,tipoGalao,qtdGalao,dataGalao",  $pessoaFisica->getCodigoCliente() . ",'" . $pessoaFisica->getTipoGalao() . "','".$pessoaFisica->getQtfiltros()."','".$pessoaFisica->getDataGalao()."'");
            }
            }
        }
    } else {
        echo"Erro ao Atualizar pessoa Fisica!";
    }

    $con->disconnect();
    
} elseif ($pessoa == "juridica") {

    require_once '../Class/cliente/juridica.class.php';
    $pessoaJuridica = new juridica();
    $pessoaJuridica->setCodigoCliente($_POST["idCliente"]);
    $pessoaJuridica->setCnpj($_POST["cnpj"]);
    $pessoaJuridica->setInscricaoEstadual($_POST["inscricaoEstadual"]);
    if(!empty($_POST["limiteCreditoJuridico"])){
        $pessoaJuridica->setLimiteCredito($_POST["limiteCreditoJuridico"]);
    }  else {
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
   $resAtualiza = $pessoaJuridica->atualizar("nome='".$pessoaJuridica->getNomeCliente()."',email='".$pessoaJuridica->getEmail()."',descFixo='".$pessoaJuridica->getDescFixo()."',limiteCredito='".$pessoaJuridica->getLimiteCredito()."',observacao='".$pessoaJuridica->getObservacao()."'","idCliente=".$pessoaJuridica->getCodigoCliente() );
   
    if ($resAtualiza == TRUE) {
        $pessoaJuridica->setTabela("cliente_juridico");
        $pessoaJuridica->atualizar("idCliente=".$pessoaJuridica->getCodigoCliente().",cnpj='".$pessoaJuridica->getCnpj()."',inscricaoEstadual='".$pessoaJuridica->getInscricaoEstadual(). "'","idCliente=".$pessoaJuridica->getCodigoCliente());

         if(!empty($_POST["telefone"])){
        $pessoaJuridica->setTabela("telefone");
        $telefone= ($_POST["telefone"]);
        $idTel=($_POST["id_tel"]);
        
         for ($i=0;$i<count($telefone);$i++) {
            
            $pessoaJuridica->setTelefone($telefone[$i]);
            if(isset($idTel[$i])){
                $pessoaJuridica->atualizar("telefone='".$pessoaJuridica->getTelefone()."'","idTelefone=".$idTel[$i]);
            }else{
                $pessoaJuridica->inserir("idCliente,telefone",  $pessoaJuridica->getCodigoCliente() . ",'" . $pessoaJuridica->getTelefone() . "'");
            }
            
        }
        }
        
        if(!empty($_POST["cep"])){
            $pessoaJuridica->setTabela("endereco");
            $cep=$_POST["cep"];
            $numero=$_POST["numero"];
            $complemento=$_POST["complemento"];
            
           for ($i=0;$i<count($cep);$i++) {
            
            $pessoaJuridica->setCep($cep[$i]);
            $pessoaJuridica->setNumero($numero[$i]);
            $pessoaJuridica->setComplemento($complemento[$i]);
            $pessoaJuridica->inserir("idCliente,cep,numero,complemento",  $pessoaJuridica->getCodigoCliente() . ",'" . $pessoaJuridica->getCep() . "','".$pessoaJuridica->getNumero()."','".$pessoaJuridica->getComplemento()."'");
        }
        }
        if(!empty($_POST["tipoGalao"])){
            $pessoaJuridica->setTabela("cliente_galao");
            $tipoGalao=$_POST["tipoGalao"];
            $qtdGalao=$_POST["quantgalao"];
            $dataGalao=$_POST["dataDoGalao"];
            $idGalao=$_POST["id_Galao"];
            
            for ($i=0;$i<count($tipoGalao);$i++) {
                $pessoaJuridica->setTipoGalao($tipoGalao[$i]);
                $pessoaJuridica->setQtfiltros($qtdGalao[$i]);
                $pessoaJuridica->setDataGalao($dataGalao[$i]);
                if(isset($idGalao[$i])){
                $pessoaJuridica->atualizar("tipoGalao='".$pessoaJuridica->getTipoGalao()."',qtdGalao='".$pessoaJuridica->getQtfiltros()."',dataGalao='".$pessoaJuridica->getDataGalao()."'","idcliente_galao=".$idGalao[$i]);
            }else{
                $pessoaJuridica->inserir("idCliente,tipoGalao,qtdGalao,dataGalao",  $pessoaJuridica->getCodigoCliente() . ",'" . $pessoaJuridica->getTipoGalao() . "','".$pessoaJuridica->getQtfiltros()."','".$pessoaJuridica->getDataGalao()."'");
            }
            }
        }
        
      
    } else {
        echo "Erro ao atualizar pessoa Juridica!";
    }
    $con->disconnect();
}

?>
