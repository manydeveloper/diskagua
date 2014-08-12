<?php
include_once ('../Class/conexao.class.php');

$con = new conexao();
$con->connect();
$sql_estado = "SELECT sigla FROM estados";
$res_estado=mysql_query($sql_estado);
    
    while ($campo_estado=mysql_fetch_array($res_estado)){
        if($campo_estado['sigla']=="SP"){
            $combo_estado.="<option value='".$campo_estado['sigla']."' selected >".$campo_estado['sigla']."</option>";
        }else{
            $combo_estado.="<option value='".$campo_estado['sigla']."'>".$campo_estado['sigla']."</option>";
        }
        
    }

$con->disconnect();
echo $combo_estado;
?>
