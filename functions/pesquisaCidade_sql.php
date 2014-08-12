<?php
include_once '../Class/conexao.class.php';
$estado = $_GET["sigla"];
$con = new conexao();
$con->connect();
$sql_cidade = "SELECT * FROM cidades WHERE estado='".$estado."' order by cidade";
$res_cidade=mysql_query($sql_cidade);
$combo_cidade="<option value=''>CIDADES DO ESTADO DE $estado</option>";

    while ($campo_cidade=mysql_fetch_array($res_cidade)){
        if($campo_cidade['cidade']=="SAO JOAO DA BOA VISTA"){
            $combo_cidade.="<option value='".$campo_cidade['idCidade']."' selected>".$campo_cidade['cidade']."</option>";
        }  else {
            $combo_cidade.="<option value='".$campo_cidade['idCidade']."'>".$campo_cidade['cidade']."</option>";
        }
        
    }

$con->disconnect();
echo $combo_cidade;
?>
