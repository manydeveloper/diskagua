<?php
include_once "venda.controller.class.php";

class venda extends vendaController{
    private $codigoCliente;
    private $dataVenda;
    private $valorTotal;
    private $desconto;
    private $formaPagamento;
    private $enderecoEntrega;
    
    function __construct() {
        
    }
    
    //sets ----------------------------------//--------------------------------
    function setCodigoCliente($codigoCliente){
        $this->codigoCliente=$codigoCliente;
    }
    
     function setDataVenda($dataVenda){
        $this->dataVenda=$dataVenda;
    }
    
     function setValorTotal($valorTotal){
        $this->valorTotal=$valorTotal;
    }
    
     function setDesconto($desconto){
        $this->desconto=$desconto;
    }
    
     function setFormaPagamento($formaPagamento){
        $this->formaPagamento=$formaPagamento;
    }
    function setEnderecoEntrega($enderecoEntrega){
        $this->enderecoEntrega=$enderecoEntrega;
    }
    
    //gets -----------------------------------------//-----------------------------------
    
    function getCodigoCliente(){
        return $this->codigoCliente;
    }
    
    function getDataVenda(){
        return $this->dataVenda;
    }
    
    function getValorTotal(){
        return $this->valorTotal;
    }
    
    function getDesconto(){
        return $this->desconto;
    }
    
    function getFormaPagamento(){
        return $this->formaPagamento;
    }
    function getEnderecoEntrega(){
        return $this->enderecoEntrega;
    }
}

?>
