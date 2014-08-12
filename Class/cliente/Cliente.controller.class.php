<?php
include_once "../Class/crud.class.php";

class ClienteController extends crud{
	  
	//Atributos
	
	private $sql_select_fisico = "";
        private $sql_select_juridico = "";
        private $sql_select_cliente ="";

        // MÃ©todo construtor
	
	public function __construct(){
		parent::__construct();
	}
  		

	// MÃ©todo de listagem

	public function listarCliente($where = NULL,$pesquisa=NULL){
            set_time_limit(300);
		if ($where){
			$this->sql_select_fisico = "SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." right join cliente_fisico on cliente_fisico.idCliente = cliente.idCliente WHERE ".$where." = ".$pesquisa.";";
                        $this->sql_select_juridico = "SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." right join cliente_juridico on cliente_juridico.idCliente = cliente.idCliente WHERE ".$where." = ".$pesquisa.";";
		}else{
			$this->sql_select_fisico = "SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." right join cliente_fisico on cliente_fisico.idCliente = cliente.idCliente;";
                        $this->sql_select_juridico = "SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." right join cliente_juridico on cliente_juridico.idCliente = cliente.idCliente;";
	  	}
                
              
                $estrutura='';
	  	$sel_fisico = mysql_query($this->sql_select_fisico);
                $sel_juridico = mysql_query($this->sql_select_juridico);
                
                $regs_fisico = mysql_num_rows($sel_fisico);
                $regs_juridico = mysql_num_rows($sel_juridico);
                
               if(!empty($sel_fisico) && $regs_fisico > 0){
		
                   
                while($campo = mysql_fetch_array($sel_fisico)){ // laÃ§o de repetiÃ§ao que vai trazer todos os resultados da consulta
         
                    
                    
                     $estrutura.= "<tr><td id='thcodigo' >".$campo['idCliente']."</td><td id='thnome'><strong>".$campo['nome']."</strong><a href=\"../paginas/cadastra_Cliente.php?id=".$campo['idCliente']."\"><img src='../imagens/view.png'></a></td><td id='themail'>".$campo['email']."</td><td id='thdescFixo'>".$campo['descFixo']."</td><td id='thsaldo'>".$campo['saldo']."</td><td id='thlimiteCredito'>".$campo['limiteCredito']."</td><td id='thexcluir'><a href=\"../functions/excluirCliente.php?id=".$campo['idCliente']."\"><img src='../imagens/excluir.PNG'></a></td><td id='thvenda'><a href=\"../paginas/cadastra_venda.php?id=".$campo['idCliente']."\"><img src='../imagens/carrinho.PNG'></a></td></tr>";
                }
                
                return $estrutura;
                
               }else if(!empty ($sel_juridico)&& $regs_juridico>0){
                
                
                while($campo = mysql_fetch_array($sel_juridico)){ // laÃ§o de repetiÃ§ao que vai trazer todos os resultados da consulta
         
                    
                    $estrutura.= "<tr><td id='thcodigo' >".$campo['idCliente']."</td><td id='thnome'><strong>".$campo['nome']."</strong><a href=\"../paginas/cadastra_Cliente.php?id=".$campo['idCliente']."\"><img src='../imagens/view.png'></a></td><td id='themail'>".$campo['email']."</td><td id=thdescFixo>".$campo['descFixo']."</td><td id='thsaldo'>".$campo['saldo']."</td><td id='thlimiteCredito'>".$campo['limiteCredito']."</td><td id='thexcluir'><a href=\"../functions/excluirCliente.php?id=".$campo['idCliente']."\"><img src='../imagens/excluir.PNG'></a></td><td id='thvenda'><a href=\"../paginas/cadastra_venda.php?id=".$campo['idCliente']."\"><img src='../imagens/carrinho.PNG'></a></td></tr>";
		
                }
                
                return $estrutura;
                
               }else{
                    return "Nenhum registro encontrado!";
               }
            
                

	}  	
                
         public function listarClienteSimples($where = NULL, $pesquisa = NULL){
		
		if ($where){
                    if($where==="cpf"){
                        $this->sql_select_fisico = "SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." right join cliente_fisico on cliente_fisico.idCliente = cliente.idCliente WHERE ".$where." like'%".$pesquisa."%';";
                        $selCliente_cpf = mysql_query($this->sql_select_fisico);
                        return $selCliente_cpf;
                    }
                    if($where==="cnpj"){
                        $this->sql_select_juridico="SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." right join cliente_juridico on cliente_juridico.idCliente = cliente.idCliente WHERE ".$where." like'%".$pesquisa."%';";
                        $selCliente_cnpj = mysql_query($this->sql_select_juridico); 
                        return $selCliente_cnpj;
                    }
                    if($where ==="nome"){
                        $this->sql_select_cliente="SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela()." WHERE ".$where." like'%".$pesquisa."%';";
                        $selCliente_nome= mysql_query($this->sql_select_cliente); 
                        return $selCliente_nome;
                    }  
                }else{
			$this->sql_select_cliente = "SELECT cliente.idCliente,nome,email,descFixo,saldo,limiteCredito FROM ".$this->getTabela();
                        $selCliente= mysql_query($this->sql_select_cliente);
                        return $selCliente;
	  	}
             
                
	}        
        
        public function listarClientesCep ( $pesquisa = null){
            if($pesquisa!=null){
                $this->sql_select_cliente = "select cliente.idCliente, nome, email, descFixo, saldo, limiteCredito, observacao from ".$this->getTabela()." where endereco.idCliente = cliente.idCliente and endereco.cep = ".$pesquisa.";";
                $selClienteCep = mysql_query($this->sql_select_cliente)or die(mysql_error());
                return $selClienteCep;
                
            }  else {
                echo 'Paramentro esperado não recebido!';
            }
            
        }        
}


function Telefone($idcliente){
    $sql = "select * from telefone where telefone.idCliente = ".$idcliente;
    $sel=mysql_query($sql);
    if(mysql_num_rows($sel)>0){
    $combo= "<select  name= 'Telcombo' id='Telcombo'>";
    while ($campo = mysql_fetch_array($sel)){
        $combo.="<option value=".$campo["telefone"].">".$campo["telefone"]."</option>";
    }
    $combo.="</select>";
    return $combo;
    }  else {
        return "telefone";
    }
}
function Endereco($idcliente){
    $sqlEnd = "select * from endereco where endereco.idCliente = ".$idcliente;
    $selEnd=mysql_query($sqlEnd);
    
    if(mysql_num_rows($selEnd)>0){
    $combo= "<select  name= 'Endcombo' id='Endcombo'>";
    while ($campo = mysql_fetch_array($selEnd)){
        $sqlCep="select * from cep where cep.cep= '".$campo['cep']."';";
        $selCep=mysql_query($sqlCep);
        $cep = mysql_fetch_array($selCep);
        $combo.="<option value=".$cep['nomeRua'].">".$cep['nomeRua']."</option>";
    }
    $combo.="</select>";
    return $combo;
    }  else {
            return "Endereço";    
        }
}



?>

