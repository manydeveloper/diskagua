<?php

include_once "fornecedor.controller.class.php";

class fornecedor extends fornecedorControl {
    private $codigoFornecedor;
    private $nomeFornecedor;
    private $endereco;
    private $estado;
    private $cidade;
    private $telefone;
    private $email;
    private $cnpj;
    private $cep;
    
    function __construct() {
        
    }
    
    function setCodigoFornecedor($codigoFornecedor){
        $this->codigoFornecedor=$codigoFornecedor;
    }


    function setNomeFornecedor($nomeFornecedor){
        $this->nomeFornecedor=$nomeFornecedor;
    }
    
    function setEndereco($endereco){
        $this->endereco=$endereco;
    }
    
    function setEstado($estado){
        $this->estado=$estado;
    }
    function setCidade($cidade){
        $this->cidade=$cidade;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setCnpj($cnpj){
        $this->cnpj=$cnpj;
    }
    function setCep($cep){
        $this->cep=$cep;
    }
    
    //----------------------------------------- gets ----------------------------------
    
    function getCodigoFornecedor(){
        return $this->codigoFornecedor;
    }
    
    function getNomeFornecedor(){
        return $this->nomeFornecedor;
    }
    
    function getEndereco(){
        return $this->endereco;
    }
    function getEstado(){
        return $this->estado
;    }
    function getCidade(){
        return $this->cidade;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getEmail(){
        return $this->email;
    }
    
    function getCnpj(){
        return $this->cnpj;
    }
    function getCep(){
        return $this->cep;
    }
}

?>
