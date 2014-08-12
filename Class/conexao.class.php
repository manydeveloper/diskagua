<?php

// Classe de conexão

class conexao{

	// Atributos
	
    private $db_host = "127.0.0.1";     // Servidor
    private $db_user = "root"; 		// Usuário do banco
    private $db_pass = ""; 	// Senha do usuario do banco
    private $db_name = "diskagua"; 	// Nome do banco
    private $con = false;

    // Método de conexão com o banco de dados
	
	public function connect(){

        if(!$this->con){
            
			$myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            
			if($myconn){
                $seldb = @mysql_select_db($this->db_name,$myconn);
                if($seldb){
                    $this->con = true;
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
	// Fecha o método

	// Método para fechar a conexão com o banco
	
    public function disconnect(){

		if($this->con){
			if(@mysql_close()){
				$this->con = false;
				return true;
			}else{
				return false;
			}
		}

    }
	// Fecha o método
      
}
// Fecha a classe



?>