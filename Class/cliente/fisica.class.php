<?php
include 'Cliente.class.php';

class fisica extends Cliente{
    private $cpf;
    private $rg;
    private $dataNascimento;
    private $sexo;
    
     function __construct() {
        
    }
    
    function setCpf($cpf){
        $this->cpf=$cpf;
    }
    function setRg($rg){
        $this->rg=$rg;
    }
    function setDataNascimento($dataNascimento){
        $this->dataNascimento=$dataNascimento;
    }
    function setSexo($sexo){
        $this->sexo=$sexo;
    }
    
    function getCpf(){
        return $this->cpf;
    }
    function getRg(){
        return $this->rg;
    }
    function getDataNascimento(){
        return $this->dataNascimento;
    }
    function getSexo(){
        return $this->sexo;
    }
}

?>
