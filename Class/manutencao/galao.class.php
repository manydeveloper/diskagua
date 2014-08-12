<?php
include_once "galao.controller.class.php";

class galao extends galaoControl {
    private $descricao;
    private $tamanho;
    
    function __construct() {
        
    }
    
     function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    
    function setTamanho($tamanho){
        $this->tamanho=$tamanho;
    }
    
    function getDescricao(){
        return $this->descricao;
    }
    
     function getTamanho(){
        return $this->tamanho;
    }
    
}
?>
