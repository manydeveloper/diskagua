<?php
require_once 'Cliente.controller.class.php';

class Cliente extends ClienteController{
    private $codigoCliente;
    private $nomeCliente;
    private $cep;
    private $numero;
    private $complemento;
    private $telefone;
    private $email;
    private $qtFitros;
    private $tipoGalao;
    private $dataGalao;
    private $descFixo;
    private $limiteCredito;
    private $observacao;


    function __construct() {
        
    }
    
    function setCodigoCliente($codigoCliente){
        $this->codigoCliente=$codigoCliente;
    }
    
    function setNomeCliente($nomeCliente){
        $this->nomeCliente=$nomeCliente;
    }
    
    function setCep($cep){
        $this->cep=$cep;
    }
    
    function setNumero($numero){
        $this->numero=$numero;
    }
    function setComplemento($complemento){
        $this->complemento=$complemento;
    }
    function setDescFixo($descFixo){
        $this->descFixo=$descFixo;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setQtfiltros($qtfiltro){
        $this->qtFitros=$qtfiltro;
    }
    function setTipoGalao($tipogalao){
        $this->tipoGalao=$tipogalao;
    }
    function setDataGalao($datagalao){
        $this->dataGalao=$datagalao;
    }
    function setLimiteCredito($limiteCredito){
        $this->limiteCredito=$limiteCredito;
    }
    function setObservacao($observacao){
        $this->observacao=$observacao;
    }
    
    
    
    
    
    function getCodigoCliente(){
        return $this->codigoCliente;
    }
    
    function getNomeCliente(){
        return $this->nomeCliente;
    }
    
    function getCep(){
        return $this->cep;
    }
    function getNumero(){
        return $this->numero;   
    }
    function getComplemento(){
        return $this->complemento;   
    }
    function getDescFixo(){
        return $this->descFixo;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getEmail(){
        return $this->email;
    }
    function getQtfiltros(){
        return $this->qtFitros;
    }
    function getTipoGalao(){
        return $this->tipoGalao;
    }
    function getDataGalao(){
        return $this->dataGalao;
    }
    function getLimiteCredito(){
        return $this->limiteCredito;
    }
    function getObservacao(){
        return $this->observacao;
    }
}


?>
