<?php
include_once "../Class/crud.class.php";

class vendaController extends crud {
    public function __construct(){
		parent::__construct();
	}
        
        public function listarVendas($where = NULL, $pesquisa = NULL){
		
		if ($where){
			$this->sql_select = "SELECT * FROM ".$this->getTabela()." WHERE ".$where." = '".$pesquisa."'";
		}else{
			$this->sql_select = "SELECT * FROM ".$this->getTabela();
	  	}
		
	  	$sel = mysql_query($this->sql_select);
		$regs = mysql_num_rows($sel);
		
	  	if ($regs > 0){
		
			return $sel;

		}else{
			return "Nenhum registro encontrado!";
		}

	} 

        
        public function listarEntregasPendentes(){
		
                $this->sql_select = "select vendas.idvendas, cliente.nome, vendas.data, valorTotal, desconto, formaPagamento from vendas, cliente where cliente.idCliente=vendas.idCliente and vendas.formaPagamento='' or vendas.formaPagamento='Pendente';";
		
	  	$sel = mysql_query($this->sql_select);
		$regs = mysql_num_rows($sel);
		
	  	if ($regs > 0){
		
			// InÃ­cio
			  $class="branco";
                           $estrutura="";
    		while($campo = mysql_fetch_array($sel)){ // laÃ§o de repetiÃ§ao que vai trazer todos os resultados da consulta
                    
                    if($class=="azul"){
                    
                        $class="branco";
                    }else {
                        $class="azul";
                    }
                    
                    $estrutura .= "<tr class='$class'><td>".$campo['nome']."</td><td>".$campo['data']."</td><td>".$campo["valorTotal"]."</td><td>".$campo["desconto"]."</td><td><select id='formaPagamento".$campo["idvendas"]."' name='formaPagamento'>  <option selected value='Pendente'>Pendente</option> <option value='À Vista'>À Vista</option> <option value='Cartão Credito'>Cartão Credito</option> <option value='Cartão Débito'>Cartão Débito</option> <option value='Cheque'>Cheque</option> <option value='Crediario'>Crediario</option> </select><td><a href='#' onclick=\"AtualizaFormaPagamento(".$campo['idvendas'].")\"><img src='../imagens/editar.PNG'></a></td></tr>";
			}
			
			
			
			
			return $estrutura;

		}else{
			return "Nenhum registro encontrado!";
		}

	} 
        
}

?>
