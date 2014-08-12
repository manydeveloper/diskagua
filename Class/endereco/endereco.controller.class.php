<?php
include_once "../Class/crud.class.php";

class enderecoController extends crud {
   public function __construct(){
		parent::__construct();
	}
        
         public function funcaoPesquisaCep($where = NULL){
             
              
		
		if ($where!=NULL ){
                     
			$this->sql_select = "SELECT cep, nomeRua, bairros.nome_bairro,cidades.cidade,cidades.estado
                                             FROM ".$this->getTabela()." use index (index_cep) inner join bairros on cep.bairro=bairros.idBairro  
                                             inner join cidades on cep.idCidade=cidades.idCidade 
                                             WHERE ".$where.";";
		}else{
                
                    return "Utilize os Filtros acima!";
	  	}
		
	  	$selCep = mysql_query($this->sql_select);
		
		
	  	if (mysql_num_rows($selCep) > 0){
                    
		
                $estrutura ="";
			
    		while($campo = mysql_fetch_array($selCep)){ // laÃƒÂ§o de repetiÃƒÂ§ao que vai trazer todos os resultados da consulta
                   
                    
                    $estrutura .= "<tr><td>".$campo['cep']."</td><td>".$campo['nomeRua']."</td><td>".$campo['nome_bairro']."</td><td>".$campo['cidade']."</td><td>".$campo['estado']."</td><td><a href='#' onclick=\"setEnd('".$campo['cep']."','".$campo['nomeRua']."','".$campo['nome_bairro']."','".$campo['cidade']."','".$campo['estado']."');\"><img src=' ../imagens/adicionar.png'/></a></td></tr>";
		   
                }
			
			return $estrutura;
		}else{
			return "Nenhum registro encontrado!";
		}

	} 
        
        public function funcaoPesquisaCepSimples($where = NULL){
             
              
		
		if ($where!=NULL ){
                     
			$this->sql_select = "SELECT cep, nomeRua, bairros.nome_bairro,cidades.cidade,cep.estado
                                             FROM ".$this->getTabela()." use index (index_cep) inner join bairros on cep.bairro=bairros.idBairro  
                                             inner join cidades on cep.idCidade=cidades.idCidade 
                                             WHERE ".$where.";";
		}else{
                
                    echo "Nenhum registro encontrado!!";
	  	}
		
	  	$selCep = mysql_query($this->sql_select);
	
	  	if ( mysql_num_rows($selCep)>0){
                      return mysql_fetch_array($selCep);
		
                }else{
			echo "Cep não encontrado!";
		}

	}
        
        public function pesquisaCepNomeRua ($where = null){
            if($where!=null){
                $this->sql_select ="select cep from ".$this->getTabela()." use index (index_cep) where ".$where.";";
                
                $selCep = mysql_query($this->sql_select) or die(mysql_error());
                
                if (mysql_num_rows($selCep)>0){
                    return $selCep;
                }  else {
                    echo 'Rua não encontrada!';
                    exit();
                }
            }  else {
                echo 'Paramentro esperado não recebido!';
            }
        }
     
}

?>
