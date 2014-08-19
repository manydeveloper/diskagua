
<?php
include("../index/header.php");
?>
<section id="content">
    <!-- CONTEÚDO -->
    <section  id="menuSuperior" >
        <?php include("../index/menuSuperior.php"); ?>
    </section>

    <?php
    if (empty($_GET["id"])) {
        $displayCadastro = "";
        $displayAtualiza = "none";
        ?>
        <section class="well well-lg, wrapper" id="CadastroCliente" style="display: <?php echo $displayCadastro; ?>">
            <fieldset>
                <legend>
                    Cadastro de Cliente
                </legend>   
            </fieldset>

            <form name="formCliente" action="../functions/cadastra_cliente_sql.php" method="post" onsubmit=" return verificaFormCliente();">
                <label><strong>Tipo de Cliente?</strong></label><br>
                <label>
                    <input type="radio" name="pessoa" id="fisica" value="fisica" onclick="verificaPessoa();">
                    Pessoa Física</label>
                <label>
                    <input type="radio" name="pessoa" id="juridica" value="juridica" onclick="verificaPessoa();">
                    Pessoa Jurídica</label>
                <hr >

                <section id="conteudo_pessoaFisica" style="display: none">
                    <section style="float: left; width: 50%;">
                        <label><strong>CPF</strong></label><br>
                        <input class="pula" type="text" name="cpf" id="cpf" placeholder="CPF"  >
                        <br>
                        <br>
                        <label><strong>RG</strong></label><br>
                        <input class="pula" type="text" name="rg" id="rg" placeholder="RG">
                        <br>
                        <br>
                        <label><strong>Data de Nascimento</strong></label>
                        <br>
                        <input class="pula" type="date"  name="datanascimento" id="datanascimento" placeholder="DD/MM/AAAA">
                        <br>
                        <br>
                        <select class="pula" size="1" name="sexo">
                            <option selected value="Selecione">SEXO</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </section>
                    <section style="float: left; width: 50%">
                        <label><strong>Limite de Credito</strong></label><br>
                        <input class="pula" type="number" name="limiteCreditoFisico" id="limiteCreditoFisico" placeholder="Ex: 100"><br>
                        <label><strong>Observação</strong></label><br>
                        <textarea class="pula" name="observacaoFisico" id="observacaoFisico" placeholder="Observações revelantes referentes ao cliente Aqui!" style="width: 100%; height: 100px"></textarea>
                    </section>

                </section>

                <section id="conteudo_pessoaJuridica" style="display: none">
                    <section style="float: left; width: 50%;">
                        <label><strong>CNPJ</strong></label><br>
                        <input class="pula" type="text" name="cnpj" id="cnpj" placeholder="CNPJ">
                        <br>
                        <br>
                        <label><strong>Inscrição Estadual</strong></label><br>
                        <input class="pula" type="text" name="inscricaoEstadual" id="inscricaoEstadual" placeholder="InscricaoEstadual">
                    </section>
                    <section style="float: left; width: 50%">
                        <label><strong>Limite de Credito</strong></label><br>
                        <input class="pula" type="number" name="limiteCreditoJuridico" id="limiteCreditoJuridico" placeholder="Ex: 100"><br>
                        <label><strong>Observação</strong></label><br>
                        <textarea class="pula" name="observacaoJuridico" id="observacaoJuridico" placeholder="Observações revelantes referentes ao cliente Aqui!" style="width: 100%; height: 100px"></textarea>
                    </section>
                </section>
                <br style="clear: both">
                <br>
                <label><strong>Nome cliente</strong></label><br>
                <input class="pula" type="text" name="nomeCliente" id="nomeCliente" placeholder="Nome Cliente">
                <hr> 
                <section id="endereco" name="endereco">
                    <div class="boxes">
                        <div id="modal_cad_cliente" class="window">
                            <label>Estado</label>
                            <select id="estado" name="estado" onchange="pesquisaCidade();"><?php include'../functions/pesquisaEstado_sql.php'; ?></select>
                            <label>Cidade</label>
                            <select id="cidades" name="cidades" >
                                <?php $_GET["sigla"] = "SP";
                                include'../functions/pesquisaCidade_sql.php'; ?>
                            </select>
                            <label>Rua</label>
                            <input type="text" id="modalRua" name="Rua" placeholder="Digite o nome da rua!">
                            <input type="button" name="pesquisaModal" id="pesquisaModa" value="Filtrar" onclick="pesquisaEndFiltros()">
                            <a href="#" class="close">Fechar [X]</a><br>

                            <table class="table" cellspacing=0>
                                <thead>
                                    <tr>
                                        <th > CEP </th>
                                        <th > Rua  </th>
                                        <th > Bairro </th>
                                        <th > Cidade</th>
                                        <th > Estado </th>
                                    </tr>
                                </thead>
                                <tbody id="resultadoEnd">

                                </tbody>

                            </table>

                        </div>
                    </div>
                    <section  class="endParte1">                         
                        <label><strong>CEP</strong></label><br>
                        <input class="pula" type="text" id="cep" placeholder="Ex: 13870000" >
                        <a class="pula" href="#modal_cad_cliente" name="modal"  onclick="pesquisaEnderecoCep()"  >Pesquisar</a>

                        <br>
                        <br>
                        <label><strong>Rua</strong></label><br>
                        <input type="text"  id="rua" placeholder="Rua " disabled="">
                        <input class="input_numero pula" type="number" name="numero" id="numero" placeholder="N°:" >
                        <br>
                        <br>
                        <label><strong>Bairro</strong></label><br>
                        <input type="text" id="bairro" Placeholder="Ex: Centro" disabled="">
                        <br>
                        <br>
                    </section>
                    <section  class="endParte2">
                        <label><strong>Cidade</strong></label>
                        <label class="Label_estado"><strong>Estado</strong></label>
                        <br>
                        <input class="input_cidade" type="text" id="cidade" placeholder="Ex: São Paulo" disabled="">
                        <input class="input_estado" type="text" id="estadoInp" placeholder="Ex: SP" disabled="">
                        <br>
                        <br>
                        <label><strong>Complemento</strong></label><br>
                        <input class="complemento pula" type="text" id="complemento" placeholder="Ex: Apartamento 10">
                        <br>
                        <br>
                        <input type="button"  value="+ Endereço" onclick="addEndTab()();">
                    </section>
                </section>
                <table class="table ,table-striped" >
                    <thead>
                        <tr>
                            <td><strong>Cep</strong></td>
                            <td><strong>Rua</strong></td>
                            <td><strong>Numero</strong></td>
                            <td><strong>Bairro</strong></td>
                            <td><strong>Cidade</strong></td>
                            <td><strong>Estado</strong></td>
                            <td><strong>Complemento</strong></td>
                            <td><strong>Excluir</strong></td>
                        </tr>
                    </thead>
                    <tbody id="tabela_end">

                    </tbody>
                </table>

                <hr style=" clear: both">
                <section id="telefones">
                    <label><strong>Telefone</strong></label><br>
                    <section id="telefone1" >
                        <input class="pula" type="text" name="telefone[]" id="telefone1" placeholder="Telefone">
                        <input type="button"  value="+" onclick="addCamposTel();">
                        <br>
                        <br>
                    </section>
                </section>
                <label><strong>e-mail</strong></label><br>
                <input class="pula" type="text" name="email" id="email" placeholder="e-mail">
                <br>
                <br>

                <section id="conteudo_galao" ><br>
                    <section id="galao1" class="sectionGalao" name="sectionGalao[]">
                        <label><strong>Tipo Galão</strong></label><br>
                        <select class="pula" name="tipoGalao[]" id="tipoGalao1">
                            <?php include_once '../functions/pesquisaGalao_sql.php'; ?>
                        </select>
                        <br>
                        <br>
                        <label><strong>Quantidade</strong></label><br>
                        <input class="pula" type="text" name="quantgalao[]" id="quantgalao1" placeholder=" Quantidade Filtros">
                        <br>
                        <br>
                        <label><strong>Data do Galão</strong></label><br>
                        <input class="pula" type="date"  name="dataDoGalao[]" id="dataDoGalao1" placeholder="DD/MM/AAAA">
                        <br>
                        <br>
                        <input class="pula" type="button" value="+Galão" onclick="addCamposGalao()">
                    </section>
                </section>
                <BR style="clear: both;">
                <BR>
                <label><strong>Desconto Fixo</strong></label><br>
                <input class="pula" type="number" name="descFixo" id="descFixo" placeholder="Ex: 10%" >
                <br>
                <br>
                <input class="pula" type="submit" value="Cadastrar" >
            </form>
        </section>

        <?php
    } else {
        $displayCadastro = "none";
        $displayAtualiza = "";


        include_once '../Class/conexao.class.php';
        include_once '../Class/endereco/endereco.class.php';
        $con = new conexao();
        $con->connect();
        $id = $_GET["id"];

        $sql_fisico = "SELECT cliente.idCliente,nome,email,descFixo,limiteCredito,observacao,cpf,rg,dataNascimento,sexo FROM cliente right join cliente_fisico on cliente_fisico.idCliente = cliente.idCliente WHERE cliente.idCliente= " . $id . ";";
        $sql_juridico = "SELECT cliente.idCliente,nome,email,descFixo,limiteCredito,observacao,cnpj,inscricaoEstadual FROM cliente right join cliente_juridico on cliente_juridico.idCliente = cliente.idCliente where cliente.idCliente=" . $id . ";";
        $sel_fisico = mysql_query($sql_fisico);
        $sel_juridico = mysql_query($sql_juridico);

        if (mysql_num_rows($sel_fisico) > 0) {
            $clienteFisico = mysql_fetch_array($sel_fisico);

            $checkedFisica = "checked";
            $displayFisica = "";

            $checkedJuridica = "";
            $displayJuridica = "none";
        } else if (mysql_num_rows($sel_juridico) > 0) {
            $clienteJuridico = mysql_fetch_array($sel_juridico);

            $checkedFisica = "";
            $displayFisica = "none";

            $checkedJuridica = "checked ";
            $displayJuridica = "";
        } else {
            echo "Cliente não Encontrado! ";
        }
        if (!empty($clienteFisico) or ! empty($clienteJuridico)) {
            $sqlEnd = "select * from endereco where idCliente=" . $id . ";";
            $selEnd = mysql_query($sqlEnd);

            $sqlTel = "select * from telefone where idCliente=" . $id . ";";
            $selTel = mysql_query($sqlTel);

            $sqlGalao = "select * from cliente_galao where idCliente=" . $id . ";";
            $selGalao = mysql_query($sqlGalao);
        }
        $con->disconnect();
        ?>



        <section class="well well-lg" id="AtualizaCliente" style="margin-left: 90px; margin-top: 10px; float: left; width: 70%; margin-bottom:0px; min-height: 650px;  display: <?php echo $displayAtualiza; ?>">
            <fieldset>
                <legend>
                    Cadastro de Cliente
                </legend>   
            </fieldset>

            <form style="margin-left: 20px;" name="formCliente" action="../functions/atualiza_cliente_sql.php" method="post" onsubmit=" return verificaFormCliente();">
                <input type="hidden" name="idCliente" value="<?php
                if (!empty($clienteFisico)) {
                    echo $clienteFisico["idCliente"];
                } else {
                    echo $clienteJuridico["idCliente"];
                }
                ?>">
                <label><strong>Tipo de Cliente?</strong></label><br>
                <label>
                    <input type="radio" name="pessoa" id="fisica" <?php echo $checkedFisica; ?> value="fisica" onclick="verificaPessoaAtualiza();">
                    Pessoa Física</label>
                <label>
                    <input type="radio" name="pessoa" id="juridica" <?php echo $checkedJuridica; ?> value="juridica" onclick="verificaPessoaAtualiza();">
                    Pessoa Jurídica</label>
                <hr >

                <section id="conteudo_pessoaFisicaAtualiza" style="display:  <?php echo $displayFisica; ?>">
                    <section style="float: left; width: 50%;">
                        <label><strong>CPF</strong></label><br>
                        <input type="text" name="cpf" id="cpf" value="<?php if ($displayFisica == "") {
                       echo $clienteFisico["cpf"];
                   } ?>">
                        <br>
                        <br>
                        <label><strong>RG</strong></label><br>
                        <input type="text" name="rg" id="rg" value="<?php if ($displayFisica == "") {
                       echo $clienteFisico["rg"];
                   } ?>">
                        <br>
                        <br>
                        <label><strong>Data de Nascimento</strong></label>
                        <br>
                        <input type="date"  name="datanascimento" id="datanascimento" value="<?php if ($displayFisica == "") {
                       echo $clienteFisico["dataNascimento"];
                   } ?>">
                        <br>
                        <br>
                        <select size="1" name="sexo">
                            <option <?php if ($displayFisica == "" && $clienteFisico["sexo"] == "selecione") {
                       echo "selected";
                   } ?> value="Selecione">SEXO</option>
                            <option <?php if ($displayFisica == "" && $clienteFisico["sexo"] == "Masculino") {
                       echo "selected";
                   } ?> value="Masculino">Masculino</option>
                            <option <?php if ($displayFisica == "" && $clienteFisico["sexo"] == "Feminino") {
                       echo "selected";
                   } ?> value="Feminino"</option>
                        </select>
                    </section>
                    <section style="float: left; width: 50%">
                        <label><strong>Limite de Credito</strong></label><br>
                        <input type="number" name="limiteCreditoFisico" id="limiteCreditoFisico" value="<?php if (!empty($clienteJuridico["limiteCredito"])) {
                       echo $clienteJuridico["limiteCredito"];
                   } else {
                       echo $clienteFisico["limiteCredito"];
                   } ?>"><br>
                        <label><strong>Observação</strong></label><br>
                        <textarea name="observacaoFisico" id="observacaoFisico"style="width: 100%; height: 100px"><?php if (!empty($clienteJuridico["observacao"])) {
                       echo $clienteJuridico["observacao"];
                   } else {
                       echo $clienteFisico["observacao"];
                   } ?></textarea>
                    </section>

                </section>

                <section id="conteudo_pessoaJuridicaAtualiza" style="display: <?php echo $displayJuridica; ?>">
                    <section style="float: left; width: 50%;">
                        <label><strong>CNPJ</strong></label><br>
                        <input type="text" name="cnpj" id="cnpj" value="<?php if ($displayJuridica == "") {
                       echo $clienteJuridico["cnpj"];
                   } ?>">
                        <br>
                        <br>
                        <label><strong>Inscrição Estadual</strong></label><br>
                        <input type="text" name="inscricaoEstadual" id="inscricaoEstadual" value="<?php if ($displayJuridica == "") {
                       echo $clienteJuridico["inscricaoEstadual"];
                   } ?>">
                    </section>
                    <section style="float: left; width: 50%">
                        <label><strong>Limite de Credito</strong></label><br>
                        <input type="number" name="limiteCreditoJuridico" id="limiteCreditoJuridico" value="<?php if (!empty($clienteJuridico["limiteCredito"])) {
                       echo $clienteJuridico["limiteCredito"];
                   } else if (!empty($clienteFisico["limiteCredito"])) {
                       echo $clienteFisico["limiteCredito"];
                   } ?>"><br>
                        <label><strong>Observação</strong></label><br>
                        <textarea name="observacaoJuridico" id="observacaoJuridico" style="width: 100%; height: 100px"><?php if (!empty($clienteJuridico["observacao"])) {
                       echo $clienteJuridico["observacao"];
                   } else if (!empty($clienteFisico["observacao"])) {
                       echo $clienteFisico["observacao"];
                   } ?></textarea>
                    </section>
                </section>
                <br style="clear: both">
                <br>
                <label><strong>Nome cliente</strong></label><br>
                <input type="text" name="nomeCliente" id="nomeCliente" value="<?php if (!empty($clienteJuridico["nome"])) {
                       echo $clienteJuridico["nome"];
                   } else {
                       echo $clienteFisico["nome"];
                   } ?>">
                <hr> 
                <section id="enderecos">
    <?php
    if (mysql_num_rows($selEnd) <= 0) {
        ?>
                        <section id="endereco" name="endereco">
                            <div class="boxes">
                                <div id="modal_cad_cliente" class="window">
                                    <label>Estado</label>
                                    <select id="estado" onchange="pesquisaCidade();"><?php include'../functions/pesquisaEstado_sql.php'; ?></select>
                                    <label>Cidade</label>
                                    <select id="cidades" ><?php $_GET["sigla"] = "SP"; include'../functions/pesquisaCidade_sql.php'; ?></select>
                                    <label>Rua</label>
                                    <input type="text" id="modalRua" placeholder="Digite o nome da rua!">
                                    <input type="button" name="pesquisaModal" id="pesquisaModa" value="Filtrar" onclick="pesquisaEndFiltros()">
                                    <a href="#" class="close">Fechar [X]</a><br>

                                    <table class="table" cellspacing=0>
                                        <thead>
                                            <tr>
                                                <th > CEP </th>
                                                <th > Rua  </th>
                                                <th > Bairro </th>
                                                <th > Cidade</th>
                                                <th > Estado </th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultadoEnd">

                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <section  class="endParte1">                         
                                <label><strong>CEP</strong></label><br>
                                <input type="text" id="cep" placeholder="Ex: 13870000" >
                                <a href="#modal_cad_cliente" name="modal"  onclick="pesquisaEnderecoCep()"  >Pesquisar</a>

                                <br>
                                <br>
                                <label><strong>Rua</strong></label><br>
                                <input type="text"  id="rua" placeholder="Rua " disabled="">
                                <input class="input_numero" type="number" name="numero" id="numero" placeholder="N°:" >
                                <br>
                                <br>
                                <label><strong>Bairro</strong></label><br>
                                <input type="text" id="bairro" Placeholder="Ex: Centro" disabled="">
                                <br>
                                <br>
                            </section>
                            <section  class="endParte2">
                                <label><strong>Cidade</strong></label>
                                <label class="Label_estado"><strong>Estado</strong></label>
                                <br>
                                <input class="input_cidade" type="text" id="cidade" placeholder="Ex: São Paulo" disabled="">
                                <input class="input_estado" type="text" id="estadoInp" placeholder="Ex: SP" disabled="">
                                <br>
                                <br>
                                <label><strong>Complemento</strong></label><br>
                                <input class="complemento" type="text" id="complemento" placeholder="Ex: Apartamento 10">
                                <br>
                                <br>
                                <input type="button"  value="+ Endereço" onclick="addEndTab()();">
                            </section>
                        </section>
                        <table class="table-striped">
                            <thead>
                                <tr>
                                    <td><strong>Cep</strong></td>
                                    <td><strong>Rua</strong></td>
                                    <td><strong>Numero</strong></td>
                                    <td><strong>Bairro</strong></td>
                                    <td><strong>Cidade</strong></td>
                                    <td><strong>Estado</strong></td>
                                    <td><strong>Complemento</strong></td>
                                    <td><strong>Excluir</strong></td>
                                </tr>
                            </thead>
                            <tbody id="tabela_end">

                            </tbody>
                        </table>
        <?php
    } else {
        ?>
                        <section id="endereco<?php echo $contador ?>" name="endereco[]">
                            <div class="boxes">
                                <div id="modal_cad_cliente" class="window">
                                    <label>Estado</label>
                                    <select id="estado" onchange="pesquisaCidade();"><?php include'../functions/pesquisaEstado_sql.php'; ?></select>
                                    <label>Cidade</label>
                                    <select id="cidades" ><?php $_GET["sigla"] = "SP"; include'../functions/pesquisaCidade_sql.php'; ?></select>
                                    <label>Rua</label>
                                    <input type="text" id="modalRua" placeholder="Digite o nome da rua!">
                                    <input type="button" name="pesquisaModal" id="pesquisaModal" value="Filtrar" onclick="pesquisaEndFiltros(<?php echo $contador ?>)">
                                    <a href="#" class="close">Fechar [X]</a><br>

                                    <table class="table" cellspacing=0>
                                        <thead>
                                            <tr>
                                                <th > CEP </th>
                                                <th > Rua  </th>
                                                <th > Bairro </th>
                                                <th > Cidade</th>
                                                <th > Estado </th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultadoEnd">

                                        </tbody>

                                    </table>

                                </div>

                            </div>
                            <section  class="endParte1">                         
                                <label><strong>CEP</strong></label><br>
                                <input type="text" id="cep" placeholder="Ex: 13870000" >
                                <a href="#modal_cad_cliente" name="modal"  onclick="pesquisaEnderecoCep()"  >Pesquisar</a>

                                <br>
                                <br>
                                <label><strong>Rua</strong></label><br>
                                <input type="text"  id="rua" placeholder="Rua " disabled="">
                                <input class="input_numero" type="number" name="numero" id="numero" placeholder="N°:" >
                                <br>
                                <br>
                                <label><strong>Bairro</strong></label><br>
                                <input type="text" id="bairro" Placeholder="Ex: Centro" disabled="">
                                <br>
                                <br>
                            </section>
                            <section  class="endParte2">
                                <label><strong>Cidade</strong></label>
                                <label class="Label_estado"><strong>Estado</strong></label>
                                <br>
                                <input class="input_cidade" type="text" id="cidade" placeholder="Ex: São Paulo" disabled="">
                                <input class="input_estado" type="text" id="estadoInp" placeholder="Ex: SP" disabled="">
                                <br>
                                <br>
                                <label><strong>Complemento</strong></label><br>
                                <input class="complemento" type="text" id="complemento" placeholder="Ex: Apartamento 10">
                                <br>
                                <br>
                                <input type="button"  value="+ Endereço" onclick="addEndTab()();">
                            </section>
                        </section>
                        <table class="table-striped">
                            <thead>
                                <tr>
                                    <td><strong>Cep</strong></td>
                                    <td><strong>Rua</strong></td>
                                    <td><strong>Numero</strong></td>
                                    <td><strong>Bairro</strong></td>
                                    <td><strong>Cidade</strong></td>
                                    <td><strong>Estado</strong></td>
                                    <td><strong>Complemento</strong></td>
                                    <td><strong>Excluir</strong></td>
                                </tr>
                            </thead>
                            <tbody id="tabela_end">
                    <?php
                    $endereco = new endereco();
                    $endereco->setTabela("cep");
                    while ($campo_End = mysql_fetch_array($selEnd)) {
                        $con->connect();
                        $resultCep = $endereco->funcaoPesquisaCepSimples("cep=" . $campo_End["cep"]);
                        $con->disconnect();
                        ?>
                                    <tr>
                                        <td><input type='hidden' name='cep[]' value="<?php echo $campo_End["cep"] ?>"><?php echo $campo_End["cep"] ?></td>
                                        <td><input type='hidden' name='rua[]' value="<?php echo $resultCep["nomeRua"] ?>"><?php echo $resultCep["nomeRua"] ?></td>
                                        <td><input type='hidden' name='numero[]' value="<?php echo $campo_End["numero"] ?>"><?php echo $campo_End["numero"] ?></td>
                                        <td><input type='hidden' name='bairro[]' value="<?php echo $resultCep["nome_bairro"] ?>"><?php echo $resultCep["nome_bairro"] ?></td>
                                        <td><input type='hidden' name='cidade[]' value="<?php echo $resultCep["cidade"] ?>"><?php echo $resultCep["cidade"] ?></td>
                                        <td><input type='hidden' name='estado[]' value="<?php echo $resultCep["estado"] ?>"><?php echo $resultCep["estado"] ?></td>
                                        <td><input type='hidden' name='complemento[]' value="<?php echo $campo_End["complemento"] ?>"><?php echo $campo_End["complemento"] ?></td>
                                        <td><a href='#' onclick="removerEndTab(this), ExcluirEndereco(<?php if (!empty($clienteFisico)) { echo $clienteFisico["idCliente"]; } else { echo $clienteJuridico["idCliente"];}?>,<?php echo $campo_End["idEndereco"] ?>) "><img src=' ../imagens/excluir.png'/></a></td>
                                    </tr>
                        <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </section>
                <hr style=" clear: both">

                <?php
                if (mysql_num_rows($selTel) <= 0) {
                    ?>
                    <section id="telefones">
                        <label><strong>Telefone</strong></label><br>
                        <section id="telefone1" >
                            <input type="text" name="telefone[]" id="input_telefone1" placeholder="Telefone">
                            <input type="button"  value="+" onclick="addCamposTel();">
                            <br>
                            <br>
                        </section>
                    </section>
                                <?php
                            } else {
                                ?>
                    <section id="telefones"> 
        <?php
        $contadorTel = 1;
        while ($campo_Tel = mysql_fetch_array($selTel)) {
            ?>

                            <section id="telefone<?php echo $contadorTel ?>" >
                                <label><strong>Telefone</strong></label><br>
                                <input type="hidden" name="id_tel[]" id="id_tel<?php echo $contadorTel ?>" value="<?php echo $campo_Tel["idTelefone"]; ?>">
                                <input type="text" name="telefone[]" id="input_telefone<?php echo $contadorTel ?>" value="<?php echo $campo_Tel["telefone"]; ?>">
            <?php if ($contadorTel > 1) { ?>
                                    <input type="button"  value="-" onclick="removerCampoTel(<?php echo $contadorTel ?>);">
                            <?php } else { ?>
                                    <input type="button"  value="+" onclick="addCamposTel();">
                            <?php } ?>
                                <br>
                                <br>
                            </section>
            <?php
            $contadorTel++;
        }
        ?>
                    </section>
                                <?php
                            }
                            ?>
                <label><strong>e-mail</strong></label><br>
                <input type="text" name="email" id="email" value="<?php if (!empty($clienteJuridico["email"])) {
                            echo $clienteJuridico["email"];
                        } else if (!empty($clienteFisico["email"])) {
                            echo $clienteFisico["email"];
                        } ?>">
                <br>
                <br>

                <section id="conteudo_galao" ><br>
    <?php
    if (mysql_num_rows($selGalao) <= 0) {
        ?>
                        <section id="galao1" class="sectionGalao" name="sectionGalao[]">
                            <label><strong>Tipo Galão</strong></label><br>
                            <select  name="tipoGalao[]" id="tipoGalao1">
                            <?php include_once '../functions/pesquisaGalao_sql.php'; ?>

                            </select>
                            <br>
                            <br>
                            <label><strong>Quantidade</strong></label><br>
                            <input type="text" name="quantgalao[]" id="quantgalao1" placeholder=" Quantidade Filtros">
                            <br>
                            <br>
                            <label><strong>Data do Galão</strong></label><br>
                            <input type="date"  name="dataDoGalao[]" id="dataDoGalao1" placeholder="DD/MM/AAAA">
                            <br>
                            <br>
                            <input type="button" value="+Galão" onclick="addCamposGalao()">
                        </section>
        <?php
    } else {
        $contadorGalao = 1;
        while ($campo_Galao = mysql_fetch_array($selGalao)) {
            ?>
                            <section id="galao<?php echo $contadorGalao ?>" class="sectionGalao" name="sectionGalao[]">
                                <input type="hidden" name="id_Galao[]" id="id_Galao<?php echo $contadorTel ?>" value="<?php echo $campo_Galao["idcliente_galao"]; ?>">
                                <label><strong>Tipo Galão</strong></label><br>
                                <select  name="tipoGalao[]" id="tipoGalao<?php echo $contadorGalao ?>">
            <?php
            $_GET["tipoGalao"] = $campo_Galao["tipoGalao"];
            include'../functions/pesquisaGalao_sql.php';
            ?>

                                </select>
                                <br>
                                <br>
                                <label><strong>Quantidade</strong></label><br>
                                <input type="text" name="quantgalao[]" id="quantgalao<?php echo $contadorGalao ?>" value="<?php echo $campo_Galao["qtdGalao"]; ?>">
                                <br>
                                <br>
                                <label><strong>Data do Galão</strong></label><br>
                                <input type="date"  name="dataDoGalao[]" id="dataDoGalao<?php echo $contadorGalao ?>" value="<?php echo $campo_Galao["dataGalao"]; ?>">
                                <br>
                                <br>
            <?php if ($contadorGalao > 1) { ?>
                                    <input type="button" value="-Galão" onclick="removeCamposGalao(<?php echo $contadorGalao ?>)">
            <?php } else { ?>
                                    <input type="button" value="+Galão" onclick="addCamposGalao()">
            <?php } ?>
                            </section>
            <?php
            $contadorGalao++;
        }
    }
    ?>
                </section>
                <BR style="clear: both;">
                <BR>
                <label><strong>Desconto Fixo</strong></label><br>
                <input type="number" name="descFixo" id="descFixo" value="<?php if (!empty($clienteJuridico["descFixo"])) {
        echo $clienteJuridico["descFixo"];
    } else {
        echo $clienteFisico["descFixo"];
    } ?>">
                <br>
                <br>
                <input type="submit" value="Atualizar" onclick="alertPessoa();">
            </form>
        </section>
    <?php
}
?> 
</section>

<?php
//include("../index/footer.php"); 
?>