<?php
include("../index/header.php");
?>

<section id="content">
    <section id="menu" style="margin-left: 10px;">
        <?php include ("../index/menu.php"); ?>
    </section>
    <section class="well well-lg" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:10px; min-height: 650px;">
    <h1>Cadastro de Galão</h1>
    
    <form name="formGalao" action="../functions/cadastra_galao_sql.php" method="post">
        <label><strong>Descrição</strong></label><br>
        <input class="input-sm" type="text" id="descricao" name="descricao" > 
        <br>
        <br>
        <label><strong>Tamanho</strong></label><br>
        <select class="input-sm" size="1" name="tamanhoGalao">
                <option selected value="Selecione">Tamanho do Galão</option>
                <option value="5">5 Litros</option>
                <option value="10">10 Litros</option>
                <option value="20">20 Litros</option>
            </select>
        <br>
        <br>
        <button class="btn btn-group-xs" type="submit" name="cadastraGalao">Cadastrar</button>
    </form>
    
    </section>
</section>

<?php include("../index/footer.php"); ?>