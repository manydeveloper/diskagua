<?php

include_once "../Class/crud.class.php";

class produtoControl extends crud{
	  
	//Atributos
	
	private $sql_select = "";


	// MÃ©todo construtor
	
	public function __construct(){
		parent::__construct();
	}
        
        // MÃ©todo de listagem

	public function listarProduto($where = NULL, $pesquisa = NULL){
		
		if ($where){
			$this->sql_select = "SELECT * FROM ".$this->getTabela()." WHERE ".$where." = '".$pesquisa."'";
		}else{
			$this->sql_select = "SELECT * FROM ".$this->getTabela();
	  	}
		
	  	$sel = mysql_query($this->sql_select);
		$regs = mysql_num_rows($sel);
		
	  	if ($regs > 0){
		
			// InÃ­cio
			  $class="branco";
                           $estrutura ="<table>";
    		while($campo = mysql_fetch_array($sel)){ // laÃ§o de repetiÃ§ao que vai trazer todos os resultados da consulta
                    
                    if($class=="azul"){
                    
                        $class="branco";
                    }else {
                        $class="azul";
                    }
                    
                    $estrutura .= "<tr class='$class'><td id='thcodigoProduto'>".$campo['idProduto']."</td><td id='thnomeProduto'>".$campo['nome']."</td><td id='thfornecedor'>".$campo["fornecedor"]."</td><td id='thquantidadeProduto'>".$campo["quantidade"]."</td><td id='thValorCompra'>".$campo["valorCompra"]."</td><td id='thValorVenda'>".$campo["valorVenda"]."</td><td id='thexcluirProduto'><a href=\"../functions/excluirProduto.php?id=".$campo["idProduto"]."\"><img src='../imagens/excluir.PNG'></a></td><td id='theditarProduto'><a href=\"../paginas/cadastra_produtos.php?id=".$campo['idProduto']."\"><img src='../imagens/editar.PNG'></a></td></tr>";
			}
			
			$estrutura .= "</table>";
			
			
			return $estrutura;

		}else{
			return "Nenhum registro encontrado!";
		}

	} 
        
        
        
         public function listarProdutoVenda($where = NULL, $pesquisa = NULL){
             
		if ($where){
			$this->sql_select = "SELECT * FROM ".$this->getTabela()." WHERE ".$where." like '%".$pesquisa."%'";
		}else{
			$this->sql_select = "SELECT * FROM ".$this->getTabela();
	  	}
		
	  	$sel = mysql_query($this->sql_select);
		$regs = mysql_num_rows($sel);
		
	  	if ($regs > 0){
		
			// InÃ­cio
			  
                $estrutura ="";
    		while($campo = mysql_fetch_array($sel)){ // laÃ§o de repetiÃ§ao que vai trazer todos os resultados da consulta
                    
                    
                    $estrutura .= "<tr><td>".$campo['idProduto']."</td><td>".$campo['nome']."</td><td>".$campo["fornecedor"]."</td><td>".$campo["quantidade"]."</td><td>".$campo["valorCompra"]."</td><td>".$campo["valorVenda"]."</td><td> <a href='#' onclick=\"AddItemVenda('".$campo["quantidade"]."','".$campo["idProduto"]."','".$campo["nome"]."','".$campo["valorVenda"]."')\"><img src='../imagens/adicionar.png'></a></td></tr>";
			}
			
			return $estrutura;

		}else{
			return "Nenhum registro encontrado!";
		}

	} 
        
        
}
?>
