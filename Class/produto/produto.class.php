<?php
include_once "produto.controller.class.php";

class produto extends produtoControl{
    private $codigoProduto;
    private $nomeProduto;
    private $codigo;
    private $fornecedor;
    private $quantidade;
    private $Vcompra;
    private $Vvenda;
   
     function __construct() {
        
    }
    
     function setCodigoProduto($codigoProduto){
        $this->codigoProduto=$codigoProduto;
    }
    
    function setNomeProduto($nomeProduto){
        $this->nomeProduto=$nomeProduto;
    }
     function setCodigo($codigo){
        $this->codigo=$codigo;
    }
     function setFornecedor($fornecedor){
        $this->fornecedor=$fornecedor;
    }
     function setquantidade($quantidade){
        $this->quantidade=$quantidade;
    }
     function setVcompra($Vcompra){
        $this->Vcompra=$Vcompra;
    }
     function setVvenda($Vvenda){
        $this->Vvenda=$Vvenda;
    }
    
    //------------------------------------ gets ------------------------------------
    
    function getCodigoProduto(){
        return $this->codigoProduto;
    }
    
    function getNomeProduto(){
        return $this->nomeProduto;
    }
     function getCodigo(){
         return $this->codigo;
    }
     function getFornecedor(){
         return $this->fornecedor;
    }
     function getquantidade(){
         return $this->quantidade;
    }
     function getVcompra(){
         return $this->Vcompra;
    }
     function getVvenda(){
         return $this->Vvenda;
    }

}

?>
