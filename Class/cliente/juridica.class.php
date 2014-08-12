<?php
include 'Cliente.class.php';

class juridica extends Cliente{
    private $cnpj;
    private $inscricaoEstadual;
    
    function __construct() {
        
    }
    
    function setCnpj($cnpj){
        $this->cnpj=$cnpj;
    }
    function setInscricaoEstadual($incricaoEstadual){
        $this->inscricaoEstadual=$incricaoEstadual;
    }
    function getCnpj(){
        return $this->cnpj;
    }
    function getInscricaoEstadual(){
        return $this->inscricaoEstadual;
    }
}

?>
