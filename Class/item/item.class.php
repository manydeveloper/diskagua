<?php

include_once 'item.controller.class.php';
class item extends itemController {
   
    private $idVendas;
    private $idProduto;
    private $produto;
    private $quantidade;
    private $valor;
    
    function __construct() {
        
    }
    
    
    // sets ------------------------------------//------------------------------
    
    function setIdVendas($vendas){
        $this->idVendas= $vendas;
    }
    
     function setIdProduto($idProduto){
        $this->idProduto= $idProduto;
    }
    
    function setProduto($produto){
        $this->produto= $produto;
    }
    
    function setQuantidade($quantudade){
        $this->quantidade= $quantudade;
    }
    
    function setValor($valor){
        $this->valor= $valor;
    }
    
    // Gets ------------------------------------------//-----------------------------------
    
    function getIdVendas(){
        return $this->idVendas;
    }
    
    function getIdProduto(){
        return $this->idProduto;
    }
    
    function getProduto(){
        return $this->produto;
    }
    
    function getQuantidade(){
        return $this->quantidade;
    }
    
    function getValor(){
        return $this->valor;
    }
}

?>
