<?php
include_once "../Class/crud.class.php";

class fornecedorControl extends crud{
	  
	//Atributos
	
	private $sql_select = "";


	// MÃ©todo construtor
	
	public function __construct(){
		parent::__construct();
	}
  		

	// MÃ©todo de listagem
        
  

	public function listarFornecedor($where = NULL,$pesquisa=NULL){
		
		if ($where){
			$this->sql_select = "SELECT * FROM ".$this->getTabela()." WHERE ".$where."='".$pesquisa."'";
		}else{
			$this->sql_select = "SELECT * FROM ".$this->tabela;
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
                    
                    
                    $estrutura .= "<tr class=$class><td id='thcodigoFornecedor'>".$campo['idfornecedor']."</td><td id='thnomeFornecedor'>".$campo['nome']."</td><td id='thenderecoFornecedor'>".$campo['endereco']."</td><td id='thestadoFornecedor'>".$campo['estado']."</td><td id='thcidadeFornecedor'>".$campo['cidade']."</td><td id='thcnpj'>".$campo['cnpj']."</td><td id='themailFornecedor'>".$campo['email']."</td><td id='thtelefoneFornecedor'>".$campo['telefone']."</td><td id='thcepFornecedor'>".$campo['cep']."</td><td id='thexcluirFornecedor'><a  href=\"../functions/excluirFornecedor.php?id=".$campo['idfornecedor']."\"><img src='../imagens/excluir.PNG'></a></td><td id='theditarFornecedor'><a href=\"../paginas/cadastra_Fornecedor.php?id=".$campo['idfornecedor']."\"><img src='../imagens/editar.PNG'></a></td></tr>";
			
                    
                    
                }
			
			$estrutura .= "</tr></table>";
			
			// Fim
			
			return $estrutura;

		}else{
			return "Nenhum registro encontrado!";
		}

	}  
        
        public function pesquisaCombobox($Fornecedor){
            $this->sql_select = "select * from ".$this->getTabela();
            $sel = mysql_query($this->sql_select);
            $regs = mysql_num_rows($sel);
            $combo="<option value='Selecione'>Fornecedor</option>";
            if($regs>0){
                if(!empty($Fornecedor)){
                     while ($campo=mysql_fetch_array($sel)){
                         if($Fornecedor == $campo["nome"]){
                             $combo.="<option selected value='".$campo['nome']."'>".$campo['nome']."</option>";
                         }  else {
                             $combo.="<option value='".$campo['nome']."'>".$campo['nome']."</option>";
                         }  
                         
                    }
                }else{
                    while ($campo=mysql_fetch_array($sel)){
                           $combo.="<option value='".$campo['nome']."'>".$campo['nome']."</option>";
                    }
                
            }  
                return $combo;
        }

}  		


 
}

?>  