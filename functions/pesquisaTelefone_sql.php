<?php

include '../Class/conexao.class.php';
include '../Class/cliente/Cliente.class.php';
$telefone = $_GET["telefone"];

$con = new conexao;
$con->connect();

$lista = new Cliente();

if (!empty($telefone)) {
    $sql = "SELECT * FROM telefone WHERE telefone like'%" . $telefone . "%';";

    $res = mysql_query($sql);
    $tr = "";
    if (mysql_num_rows($res)>0) {
        while ($campos = mysql_fetch_array($res)) {
            if (!empty($campos)) {
                $lista->setTabela("cliente");
                $tr.=$lista->listarCliente("cliente.idCliente", $campos["idCliente"]);
            }
        }
        echo $tr;
    } else {
        echo "Cliente não encontrado!";
    }
} else {

    $lista->setTabela("cliente");
    echo $lista->listarCliente();
}


$con->disconnect();
?>
