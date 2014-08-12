<?php
include_once '../Class/conexao.class.php';
$idCidade = $_GET["idCidade"];
$con = new conexao();
$con->connect();
$sql_bairro = "select * from bairros where cidade='".$idCidade."' order by nome_bairro;" ;
$res_bairro=mysql_query($sql_bairro);
$combo_bairro="<option value=''>BAIRROS</option>";

    while ($campo_bairro=mysql_fetch_array($res_bairro)){
        $combo_bairro.="<option value='".$campo_bairro['idBairro']."'>".$campo_bairro['nome_bairro']."</option>";
    }

$con->disconnect();
echo $combo_bairro;
?>
