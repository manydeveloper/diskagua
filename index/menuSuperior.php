
<!-- TWITTER BOOTSTRAP CSS --> <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" /> 
<!-- TWITTER BOOTSTRAP CSS --> <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- TWITTER BOOTSTRAP JS --> <script src="../js/bootstrap.min.js"></script> 
<script src="../js/script.js"></script> 
<link rel="stylesheet" type="text/css"  href="../css/style.css" />

<div id="menuSuperior">  
    <a href="../paginas/Home.php"><h3>Disk-Agua</h3></a>
    <ul class="nav nav-tabs" >
        <!-- Menu Cliente -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown"href="#"><img src='../imagens/bonecopequeno.png'>
                Cliente
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../paginas/cadastra_Cliente.php"><font color="#000000"> Cadastrar Cliente </font></a></li>
                <li><a href="#"><font color="#000000"> Historico </font></a></li>
                <li><a href="../paginas/manutencaoCliente.php"><font color="#000000"> Editar / Excluir Cliente </font></a></li>
            </ul>
        </li>
        <!-- Menu Fornecedor -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <img src='../imagens/caminhao.png'>
                Fornecedor
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li ><a href="../paginas/cadastra_Fornecedor.php"><font color="#000000"> Cadastrar Fornecedor </font></a></li>
                <li ><a href="../paginas/manutencaoFornecedor.php"><font color="#000000"> Editar / Excluir Fornecedor </font></a></li>
            </ul>
        </li>
        <!-- Menu Produto -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <img src='../imagens/carrinho.png' >
                Produto
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../paginas/cadastra_produtos.php"><i class="icon-calendar"></i><font color="#000000"> Cadastro de Produto</font></a></li>
                <li><a href="../paginas/estoque.php"><i class="icon-calendar"></i><font color="#000000"> Estoque</font></a></li>
                <li><a href="../paginas/manutencaoProduto.php"><i class="icon-calendar"></i><font color="#000000"> Editar / Excluir Produto</font></a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <img src='../imagens/rel.png'>
                Relatório
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#"><font color="#000000"> Vendas</font></a></li>
                <li><a href="#"><font color="#000000"> Produtos</font></a></li>
                <li><a href="#"><font color="#000000"> Clientes</font></a></li>
            </ul>
        </li>

        <li><a href="#"><img src='../imagens/localização.png'><font color="#000000"><strong>Mapa</strong></font></a></li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <img src='../imagens/roda.png'>
                Manutenção
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../paginas/cadastra_Galao.php"><i class="icon-calendar"></i><font color="#000000"> Cadastrar Galão</font></a></li>
            </ul>
        </li>

        <li><a href="#" onclick="window.location.href = '../functions/logout.php';"><font color="#000000"><img src='../imagens/exit.png'><strong>Sair</strong></font></a></li>

    </ul>
</div>



