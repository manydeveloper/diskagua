<?php
include_once "../Class/crud.class.php";

class itemController extends crud {
   public function __construct(){
		parent::__construct();
	}
        
        
         public function listarItens($where = NULL, $pesquisa = NULL){
		
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
        
        
}

?>
