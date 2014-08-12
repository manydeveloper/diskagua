<?php


class crud {
   private $sql_ins;
   private $sql_sel;
   private $sql_del;
   private $sql_upd;
   private $tabela;
   
   public function __construct() {
       
   }
   
   public function setTabela($tabela){
       $this->tabela = $tabela;
   }
    public function getTabela(){
       return $this->tabela;
   }

      public function inserir($campos,$valores){
       $this->sql_ins="INSERT INTO ".$this->tabela."($campos) VALUES ($valores)";
       if(!$this->ins=  mysql_query($this->sql_ins)){
           echo ("Erro:".mysql_error()."!");
           return FALSE;
       }  else {
          echo  "Cadastro executado com Sucesso na tabela ".$this->tabela;
          return TRUE;
       }
       
   }
   
   function atualizar($campos_valores, $where = null) {
        if (!$where == null) {
            $this->sql_upd = "UPDATE ". $this->getTabela() ." SET ".$campos_valores." where ".$where ;
            
        } else {
            $this->sql_upd = "UPDATE ". $this->getTabela() ." SET ".$campos_valores;
           
        }
        if (!$this->upd = mysql_query($this->sql_upd)) {
            echo ("Erro:" . mysql_error() . "!");
            return FALSE;
            } else {
                echo "Atualização executado com Sucesso na tabela ". $this->tabela;
                return TRUE;
            }
    }
   function excluir($where=NULL, $campo=NULL){
       if(!$where ==null && !$campo==NULL){
           $this->sql_sel = "SELECT * FROM ".$this->getTabela()." WHERE $where=".$campo;
           $this->sql_del = "DELETE FROM ".$this->getTabela()." WHERE $where=".$campo;
       }  else {
           $this->sql_sel = "SELECT * FROM ".$this->getTabela();
           $this->sql_del = "DELETE FROM ".$this->getTabela();
       }
       $sel = mysql_query($this->sql_sel);
       if(!empty($sel)){
           $regs = mysql_num_rows($sel);
       }else{
           $regs=0;
       }
       
       if($regs >0){
           if(!$this->del =  mysql_query($this->sql_del)){
               echo  "Erro:".  mysql_error();
               return FALSE;
           }else{
               echo "Sucesso ao executar a aperação de Exclusão na tabela ".$this->tabela;
               return TRUE;
           }
       }  else {
           echo "Registro não encontrado";
           return FALSE;
       }
   }
}

?>
