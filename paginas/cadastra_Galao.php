<?php
include("../index/header.php");
?>

<section id="content">
    <section id="menuSuperior" >
        <?php include ("../index/menuSuperior.php"); ?>
    </section>
    <section class="well well-lg, wrapper" >
        <fieldset>
            <legend>
                Cadastro de Galão
            </legend>   
        </fieldset>

        <form name="formGalao" action="../functions/cadastra_galao_sql.php" method="post">
            <label><strong>Descrição</strong></label><br>
            <input type="text" id="descricao" name="descricao" > 
            <br>
            <br>
            <label><strong>Tamanho</strong></label><br>
            <select  name="tamanhoGalao">
                <option selected value="Selecione">Tamanho do Galão</option>
                <option value="5">5 Litros</option>
                <option value="10">10 Litros</option>
                <option value="20">20 Litros</option>
            </select>
            <br>
            <br>
            <button  type="submit" name="cadastraGalao">Cadastrar</button>
        </form>

    </section>
</section>

<?php include("../index/footer.php"); ?>