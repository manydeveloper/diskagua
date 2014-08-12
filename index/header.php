<?php
  include '../functions/verifica_sessao.php';
           
            
?>

<!doctype html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<title>PIT-STOP</title>
</head>

<body>
    <header class="navbar navbar-default" style="margin-top: 0px; ">
    <div  id="pesquisa" style="margin-top: 5px;">
        <input class="pula" type="text" name="pesquisatelefone"  id="telefonecliente" />
        <a class="pula" href="#dialog2" name="modal" onclick="pesquisaTelefoneCliente();"> Pesquisar  </a> </div>
        <div class="boxes">  
  <div id="dialog2" class="window">
    <a href="#" class="close">Fechar [X]</a><br>
                <div id="cabecalhoResultado">
               
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th > Codigo </th>
                                <th > Nome </th>
                                <th > E-mail </th>
                                <th > Desconto <br>Fixo </th>
                                <th > Saldo </th>
                                <th > Limite <br> Credito <b </th>
                                <th > excluir </th>
                                <th > Vender </th>
                            </tr>
                        </thead>
                        <tbody id="resultadoTel">
                           
                        </tbody>
                    </table>
                    
                </div>
  </div>
  <div id="mask"></div>
  </div>
</header>
    
    