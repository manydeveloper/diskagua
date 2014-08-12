<?php
include("../index/header.php");
include_once '../Class/conexao.class.php';
include_once '../Class/venda/venda.class.php';
?>
 <section id="content">
            
      <section  id="menu" style="margin-left: 10px;">
        <?php include("../index/menu.php");    ?>
      </section>
     <section id="EntregaPendente" class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:10px; min-height: 650px;">  
         
         
                
         <table  id="tabbelaEntregasPendentes" class="table table-striped">
             <thead>
                 <tr><td>Nome</td><td>Data</td><td>Valor Total</td><td>Desconto</td><td>Forma Pagamento</td><td>Gravar</td></tr>
             </thead>
             <tbody >
         <?php
            $con = new conexao();
            $vendas = new venda();
            $con->connect();
           
             echo $vendas->listarEntregasPendentes();
        
          $con->disconnect();
                    ?>
            </tbody>     
         </table>
            
             
         </section>
  </section>
 
 <?php include("../index/footer.php"); ?>