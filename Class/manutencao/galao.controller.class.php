<?php

include_once "../Class/crud.class.php";

class galaoControl extends crud{
	  
	//Atributos
	
	private $sql_select = "";


	// MÃ©todo construtor
	
	public function __construct(){
		parent::__construct();
	}

	
        
       public function pesquisaCombobox($tipoGalao){
            $this->sql_select = "select * from ".$this->getTabela();
            $selTipoGalao = mysql_query($this->sql_select);
            $regs = mysql_num_rows($selTipoGalao);
            $combo="<option value='Selecione'>Galao</option>";
            if($regs>0){
                if(!empty($tipoGalao)){
                    while ($campo=mysql_fetch_array($selTipoGalao)){
                        if($tipoGalao == $campo["descricao"]){
                            $combo.="<option selected value='".$campo['descricao']."'>".$campo['descricao']."</option>";
                        }else{
                            $combo.="<option value='".$campo['descricao']."'>".$campo['descricao']."</option>";
                        }
                
                }
                }else{
                    while ($campo=mysql_fetch_array($selTipoGalao)){
                           $combo.="<option value='".$campo['descricao']."'>".$campo['descricao']."</option>";
                    }
                }
            } 
                 return $combo;
        }
}
?>
