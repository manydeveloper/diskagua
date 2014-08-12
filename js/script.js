//funcao par verificar preenchimento do form de cadastro cliente
function verificaFormCliente(){
    var opcao = verificaRadio("pessoa");
    var nome = document.getElementById("nomeCliente");
    var cep = document.getElementsByName("cep[]");
    var numero = document.getElementsByName("numero[]");
    var tipoGalao = document.getElementsByName("tipoGalao[]");
    var quantidade = document.getElementsByName("quantgalao[]");
    var dataGalao = document.getElementsByName("dataDoGalao[]");
    
    if(opcao==false){
          alert("Selecione um tipo de Cliente, Fisico ou Juridico!"); 
          return false;
    }
    if(nome.value == ""){
        alert("Campo nome cliente obrigatório, favor preencher!");
        return false;
    }
    if(cep.length !== 0){
       for(var i=0;i<cep.length;i++){
        if(cep[i].value==""){
            alert("Campo cep obrigatório, favor preencher!");
            return false;
        }
        if(numero[i].value==""){
            alert("Campo numero obrigatório, favor preencher!");
            return false;
        }
        }
    }else{
        alert("Adicione um endereço para o Cliente!");
    }
    
    for(var j=0;j<tipoGalao.length;j++){
        if(tipoGalao[j].value=="Selecione"){
            alert("Campo tipo galão obrigatório, favor selecionar!");
            return false;
        }
        if(quantidade[j].value==""){
            alert("Campo quantidade obrigatório, favor preencher!");
            return false;
        }
        if(dataGalao[j].value==""){
            alert("Campo data galão obrigatório, favor preencher!");
            return false;
        }
    }
    
    
    
}

//funcao para verificar preenchimento pagina de venda 
function verificaFormVenda(){
    var endereco = document.getElementById("comboEndereco").value;
    var quantidade = document.getElementsByName("qtdUni[]");
    
    if(endereco == "endereço"){
        alert("Favor escolher o endereço de Entrega!");
        return false;
    }
    
    if(quantidade.length == 0){
        alert("Favor inserir produtos na lista de vendas!");
        return false;
    }
    
    for(var i=0;i<quantidade.length;i++){
        if(quantidade[i].value =="" || quantidade[i].value <= 0 ){
            alert("Favor informar a quantidade do produto na lista de venda!");
            return false;
        }
    }
    
}

// fun��o para mostrar o conteudo da tela de cadastro de cliente dados para de acordo com o tipo de pesso
function verificaPessoa(){

var opcao= verificaRadio("pessoa");
  
if (opcao == "fisica"){
    
    document.getElementById('conteudo_pessoaFisica').style.display="";
    document.getElementById('conteudo_pessoaJuridica').style.display="none";
	}
        if(opcao =="juridica"){
              document.getElementById('conteudo_pessoaJuridica').style.display="";
              document.getElementById('conteudo_pessoaFisica').style.display="none";
        }

}

function verificaPessoaAtualiza(){

var opcao= verificaRadio("pessoa");
  
if (opcao == "fisica"){
    
    document.getElementById('conteudo_pessoaFisicaAtualiza').style.display="";
    document.getElementById('conteudo_pessoaJuridicaAtualiza').style.display="none";
	}
        if(opcao =="juridica"){
              document.getElementById('conteudo_pessoaJuridicaAtualiza').style.display="";
              document.getElementById('conteudo_pessoaFisicaAtualiza').style.display="none";
        }

}	
// verifica se radioButton esta selecionado

function verificaRadio(nome) {
   
    
   var elemtArray = document.getElementsByName(nome);
    var i, elemt;
    
        for(i=0;i<elemtArray.length;i++){
            if(elemtArray[i].checked){
                elemt = document.getElementById(elemtArray[i].id);
               return elemt.value;
               
            }
            
        } 
        return false;
 
}

// funcao para add campos de galoes da pagina de cadastro de cliente.
function addCamposGalao() {
    
var elemtGalao = document.getElementsByName("sectionGalao[]");
var qtdeSectionGalao = elemtGalao.length+1;
    
var objPai = document.getElementById("conteudo_galao");
//Criando o elemento DIV;
var objFilho = document.createElement("section");
//Definindo atributos ao objFilho:
objFilho.setAttribute("id","galao"+qtdeSectionGalao);
objFilho.setAttribute("class","sectionGalao");
objFilho.setAttribute("name","sectionGalao[]");

//Inserindo o elemento no pai:
objPai.appendChild(objFilho);
//Escrevendo algo no filho recém-criado:
document.getElementById("galao"+qtdeSectionGalao).innerHTML = "<label><strong>Tipo Galão</strong></label><br>\n\
                        <select  name='tipoGalao[]' id='tipoGalao"+qtdeSectionGalao+"'>\n\
                            <option value='Selecione'>Galao</option>\n\
                            <option value='10.PET'>10.PET</option>\n\
                            <option value='10.PP'>10.PP</option>\n\
                            <option value='20.PET'>20.PET</option>\n\
                            <option value='20.PP'>20.PP</option>\n\
                        </select>\n\
                        <br>\n\
                        <br>\n\
                        <label><strong>Quantidade</strong></label><br>\n\
                        <input type='text' name='quantgalao[]' id='quantgalao"+qtdeSectionGalao+"' placeholder=' Quantidade Filtros'>\n\
                        <br>\n\
                        <br>\n\
                        <label><strong>Data do Galão</strong></label><br>\n\
                        <input type='date'  name='dataDoGalao[]' id='dataDoGalao"+qtdeSectionGalao+"' placeholder='DD/MM/AAAA'>\n\
                        <br>\n\
                        <br>\n\
                        <input type='button' value='-Galão' onclick=\"removeCamposGalao('"+qtdeSectionGalao+"')\">";

}

function removeCamposGalao(id) {
var objPai = document.getElementById("conteudo_galao");
var objFilho = document.getElementById("galao"+id);

//Removendo o DIV com id específico do nó-pai:
 objPai.removeChild(objFilho);
}

// Funcao para add campos de telefone 

function addCamposTel() {
    
var elemtTel = document.getElementsByName("telefone[]");
var qtdeCamposTel = elemtTel.length+1;
    
var objPai = document.getElementById("telefones");
//Criando o elemento DIV;
var objFilho = document.createElement("section");
//Definindo atributos ao objFilho:
objFilho.setAttribute("id","telefone"+qtdeCamposTel);

//Inserindo o elemento no pai:
objPai.appendChild(objFilho);
//Escrevendo algo no filho recém-criado:
document.getElementById("telefone"+qtdeCamposTel).innerHTML = "<input class=\"pula\" type='text' id='telefone"+qtdeCamposTel+"' name='telefone[]' placeholder='TELEFONE"+qtdeCamposTel+"'> <input type='button' onclick='removerCampoTel("+qtdeCamposTel+")' value='-'><br><br>";

}

function removerCampoTel(id) {
var objPai = document.getElementById("telefones");
var objFilho = document.getElementById("telefone"+id);

//Removendo o DIV com id específico do nó-pai:
 objPai.removeChild(objFilho);
}
//funcao para add endereço na tabela 
function addEndTab() {
    
    var cep= document.getElementById("cep").value;
    var rua= document.getElementById("rua").value;
    var numero= document.getElementById("numero").value;
    var bairro= document.getElementById("bairro").value;
    var cidade= document.getElementById("cidade").value;
    var estado= document.getElementById("estado").value;
    var complemento= document.getElementById("complemento").value;
    
    var id = document.getElementsByName("linha").length;
    id++;
var table=document.getElementById("tabela_end")  ;
var row=table.insertRow(0) ;
row.innerHTML= "<tr><td><input type='hidden' name='cep[]' value='"+cep+"'>"+cep+"</td><td><input type='hidden' name='rua[]' value='"+rua+"'>"+rua+"</td><td><input type='hidden' name='numero[]' value='"+numero+"'>"+numero+"</td><td><input type='hidden' name='bairro[]' value='"+bairro+"'>"+bairro+"</td><td><input type='hidden' name='cidade[]' value='"+cidade+"'>"+cidade+"</td><td><input type='hidden' name='estado[]' value='"+estado+"'>"+estado+"</td><td><input type='hidden' name='complemento[]' value='"+complemento+"'>"+complemento+"</td><td><a href='#' onclick=\"removerEndTab(this)\"><img src=' ../imagens/excluir.png'/></a></td></tr>";
alert("Endereço adicionado com sucesso!");
}

function removerEndTab(obj) {
    
    // Capturamos a referência da TR (linha) pai do objeto
    var objTR = obj.parentNode.parentNode;
    // Capturamos a referência da TABLE (tabela) pai da linha
    var objTable = objTR.parentNode;
    // Chamamos o método de remoção de linha nativo do JavaScript, passando como parâmetro o índice da linha  
    objTable.removeChild(objTR);
    // Exibe uma mensagem de confirmação da remoção
    alert("Remoção Efetuada com Sucesso!!");
}

function setEnd(cep,rua,bairro,cidade,estado){
    
   var elemtCep= document.getElementById("cep");
   var elemtRua= document.getElementById("rua");
   var elemtBairro= document.getElementById("bairro");
   var elemtCidade= document.getElementById("cidade");
   var elemtEstado= document.getElementById("estadoInp");
   
   elemtCep.value=cep;
   elemtRua.value=rua;
   elemtBairro.value=bairro;
   elemtCidade.value=cidade;
   elemtEstado.value=estado;
   alert("Endereço adicionado com Sucesso!");

}


function AddItemVenda(estoque, idProduto , nome , valorVenda ) {

if(estoque>0){ 
var table=document.getElementById("AddItem")  ;
var row=table.insertRow(0) ;
row.setAttribute("id", idProduto);
row.innerHTML= "<tr><td ><input type='text' name='codigoProduto[]' id='cod"+idProduto+"' value='"+idProduto+"' readonly></td><td><input type='text' name='nomeProduto[]' id='"+nome+"' value='"+nome+"' readonly></td> <td><input class\"pula\" type='number' name='qtdUni[]' id='qtdUnitario"+idProduto+"' onChange=\"subTotal("+idProduto+"),calcValorTotal();\"></td><td><input class\"pula\" type='number' name='valorVenda[]' id='valorVenda"+idProduto+"' value='"+valorVenda+"' onChange=\"subTotal("+idProduto+"),calcValorTotal();\"></td><td><input type='number' name='subTotal[]' id='subTotal"+idProduto+"' value='0' readonly></td><td><input type='button' value='-' onclick=\" removeTRVenda('"+idProduto+"')\"></td></tr>";
alert("Produto adicionado com sucesso!");
}else if(estoque<=0){
    
    var res = confirm("Produto sem estoque!\n Deseja realizar a venda mesmo assim?");
    if(res == true){
        
        var table=document.getElementById("AddItem");
        var row=table.insertRow(0);
        row.setAttribute("id", idProduto);
        row.innerHTML= "<tr><td ><input type='text' name='codigoProduto[]' id='cod"+idProduto+"' value='"+idProduto+"' readonly></td><td><input type='text' name='nomeProduto[]' id='"+nome+"' value='"+nome+"' readonly></td><td><input class\"pula\" type='number' name='qtdUni[]' id='qtdUnitario"+idProduto+"' onChange=\"subTotal("+idProduto+"),calcValorTotal();\"></td><td><input class\"pula\" type='number' name='valorVenda[]' id='valorVenda"+idProduto+"' value='"+valorVenda+"' onChange=\"subTotal("+idProduto+"),calcValorTotal();\"></td><td><input type='number' name='subTotal[]' id='subTotal"+idProduto+"' value='0' readonly></td><td><input type='button' value='-' onclick=\" removeTRVenda('"+idProduto+"')\"></td></tr>";
        alert("Produto adicionado com sucesso!");
    }
}
}

// funcao que remove itens da lista de vendas da pagina de vendas
function removeTRVenda(idproduto) {
var objPai = document.getElementById("AddItem");
var objFilho = document.getElementById(idproduto);

//Removendo o DIV com id específico do nó-pai:
 objPai.removeChild(objFilho);
}

// funcao que calcula o total de cada item da lista de venda da pagina de vendas 
function subTotal(idProduto){
    var quantidade= document.getElementById("qtdUnitario"+idProduto).value;
    var valorVenda= document.getElementById("valorVenda"+idProduto).value;
    var subTotal = document.getElementById("subTotal"+idProduto);
    var novosubTotal=quantidade*valorVenda;
    subTotal.setAttribute("value", novosubTotal);
}

// funcao que calcula o valor tatal da venda referente aos itens adicionados na pagina de vendas
function calcValorTotal(){
 
    var TotalSoma=0;
    var subTotal = document.getElementsByName("subTotal[]");
    var desconto= document.getElementById("inputValorDesconto").value;
    var valorTotal = document.getElementById("inputValorTotal");
    
    for (var i=0; i<subTotal.length;i++){
        TotalSoma = TotalSoma+Number(subTotal[i].value);
    }
  
    var total= TotalSoma-((desconto/100)*TotalSoma);
    
    valorTotal.setAttribute("value",total );
}

// funcao que verifica quanto o cliente esta devendo e quanto ele ainda pode gastar!
function verificaSaldoXCredito(){
   var saldo = document.getElementById("inputSaldo").value;
   var credito = document.getElementById("inputLCredito").value;
   var totalVenda = document.getElementById("inputValorTotal").value;
   var formaPagamento = document.getElementById("comboPagamento").value;
   
    if(formaPagamento == "Crediario"){   
        var soma =Number(saldo) + Number(totalVenda) ;
        
        if(credito != 0){
            if(soma > credito){
                var res = confirm("Esta venda irá exceder o limite de credito do cliente!\n Deseja realizar a venda mesmo assim?");
                
                if(res == false){
                    window.location="Home.php";
                }
            }
        }
    }

}

//funcao que seta no campo complemento da pagina de vendas o complemento de endereco do cliente
function setComplementoEnd(value){
    var dadosEnd= value.split("#");
    var inputComplemento = document.getElementById("inputComplemento");
    inputComplemento.setAttribute("value", dadosEnd[1]);
    var inputBairro = document.getElementById("inputBairro");
    inputBairro.setAttribute("value",dadosEnd[2]);
}

// funcao que verifica se o radio button "endereco" da pagina de editar e excluir cliente esta selecionado
// e ablita ou nao os filtros de estado e cidade para a pesquisa.
function mostraCombosUF_Cidade(){
    var opcaoRadio= verificaRadio("pesquisaCliente");
  
if (opcaoRadio == "endereco"){
    
    document.getElementById('comboCidades').style.display="";
    
	}else{
              document.getElementById('comboCidades').style.display="none";
              
        }
}

/**
  * Fun��o para criar um objeto XMLHTTPRequest
  */
 function CriaRequest() {
     try{
         request = new XMLHttpRequest(); 
        
     }catch (IEAtual){
          
         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");      
         }catch(IEAntigo){
          
             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");         
             }catch(falha){
                 request = false;
             }
         }
     }
      
     if (!request)
         alert("Seu Navegador n�o suporta Ajax!");
     else
         return request;
 }

// funcao que pesquisa ceps usado na pagina de cadastro de clientes
function pesquisaEnderecoCep() {
     // Declara��o de Vari�veis
     var cep = document.getElementById("cep").value;
     var result = document.getElementById("resultadoEnd");
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/pesquisaCep_sql.php?cep="+cep, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }
 
 
 // funcao que pesquisa o cliente atraves do telefone do mesmo.
  function pesquisaTelefoneCliente() {
    
     // Declara��o de Vari�veis
   
     var telefone = document.getElementById("telefonecliente").value;
     var result = document.getElementById("resultadoTel");
     document.getElementById("telefonecliente").value="";
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/pesquisaTelefone_sql.php?telefone="+telefone, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }
 
 //funcao que exclui o telefone do cliente
  function ExcluirTelefone(idCliente,idtelefone) {
    
     // Declara��o de Vari�veis
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/excluirTelefone.php?idCliente="+idCliente+"&idtelefone="+idtelefone, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 alert( xmlreq.responseText);
             }else{
                 alert( "Erro: " + xmlreq.statusText);
             }
         }
     };
     xmlreq.send(null);
 }
 
 
 //funcao que excli o endereco do cliente.
 function ExcluirEndereco(idCliente,idEndereco) {
    alert(idCliente+"/////"+idEndereco);
     // Declara��o de Vari�veis
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
    //body.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/excluirEndereco.php?idCliente="+idCliente+"&idEndereco="+idEndereco, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 alert( xmlreq.responseText);
             }else{
                 alert( "Erro: " + xmlreq.statusText);
             }
         }
     };
     xmlreq.send(null);
 }
 
 // funcao utilizada na pagina de editar e exluir clientes, pesquisa cliesnte atraves de nome,CPF, e endereco.
 function pesquisaCliente() {
     
     
     // Declara��o de Vari�veis
     var opcao = verificaRadio("pesquisaCliente");
     var pesquisa = document.getElementById("campoPesquisa").value;
     var cidade = document.getElementById("manutCidade").value;
     var result = document.getElementById("resultado");
     
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/pesquisaCliente_sql.php?opcao="+opcao+"&campo="+pesquisa+"&cidade="+cidade, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 // comentario faltando
 function pesquisaFornecedor() {
     
     
     // Declara��o de Vari�veis
     var opcao = verificaRadio("pesquisaFornecedor");
     var pesquisa = document.getElementById("campoPesquisa").value;
     var result = document.getElementById("resultado");
     
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/listaFornecedor.php?opcao="+opcao+"&campo="+pesquisa, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 // comentario faltando
 function pesquisaProduto() {
     
     
     // Declara��o de Vari�veis
     var opcao = verificaRadio("pesquisaProduto");
     var pesquisa = document.getElementById("campoPesquisa").value;
     var result = document.getElementById("resultado");
     
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/listaProduto.php?opcao="+opcao+"&campo="+pesquisa, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 
 // funcao que pesquisa a cidades filtradas por estado e retorna um combo preenchido
  function pesquisaCidade() {
     
     
     // Declara��o de Vari�veis
     var siglaEstado = document.getElementById("estado").value;
     var result = document.getElementById("cidades");
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/pesquisaCidade_sql.php?sigla="+siglaEstado, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 
 // funcao que pesquisa os bairros filtrados por cidade,e retorna um combo preenchido.
 function pesquisaBairro() {
     
     
     // Declara��o de Vari�veis
     var idCidade = document.getElementById("cidades").value;
     var result = document.getElementById("bairro");
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/pesquisaBairro_sql.php?idCidade="+idCidade, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 // funcao pesquisa ruas filtradas por estado, cidade, e bairro retornando uma tabela.
 function pesquisaEndFiltros(){
      
     // Declara��o de Vari�veis
     var estado = document.getElementById("estado").value;
     var cidade = document.getElementById("cidades").value;
     var rua = document.getElementById("modalRua").value;
     var result = document.getElementById("resultadoEnd");
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = "<img src=' ../imagens/processando.gif'/>";
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/pesquisaEndFiltros_sql.php?estado="+estado+"&cidade="+cidade+"&rua="+rua, true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 function pesquisaProdutoVenda() {
     
     
     // Declara��o de Vari�veis
     var pesquisa = document.getElementById("campoPesquisa").value;
     var result = document.getElementById("resultado");
     
     
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     result.innerHTML = '<img src=" ../img/processando.gif"/>';
      
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/listaProduto.php?campo="+pesquisa+"&venda=true", true);
      
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "ERRO: " + xmlreq.statusText+xmlreq.status;
             }
         }
     };
     xmlreq.send(null);
 }
 
 
  function AtualizaFormaPagamento(idVenda) {
     
   
     // Declara��o de Vari�veis
     var i = document.getElementById("formaPagamento"+idVenda).selectedIndex;
    
     var FormaPagamento = document.getElementById("formaPagamento"+idVenda).options[i].value;
   
     var xmlreq = CriaRequest();
      
     // Exibi a imagem de progresso
     //result.innerHTML = '<img src=" ../img/processando.gif"/>';
   
     // Iniciar uma requisi��o
     xmlreq.open("get", "../functions/atualiza_vendas_sql.php?idVenda="+idVenda+"&FP="+FormaPagamento, true);
     
     // Atribui uma fun��o para ser executada sempre que houver uma mudan�a de ado
     xmlreq.onreadystatechange = function(){
          
         // Verifica se foi conclu�do com sucesso e a conex�o fechada (readyState=4)
         if (xmlreq.readyState == 4) {
              
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 alert(xmlreq.responseText);
             }else{
                alert("ERRO: " + xmlreq.statusText+xmlreq.status);
             }
         }
     };
     xmlreq.send(null);
 }
 
 // funcao que abre uma nova aba para gerar o cupom fiscal a der impresso
 function imprimeCupom(idvenda){
     window.open("../paginas/imprimeCupom.php?idVenda="+idvenda,"_blank");
 }
 
 // funcao generica que redireciona para o endereco de pagina passado por parametro
 function redirecionaPaginas(endereco){
     window.location=""+endereco+"";
 }
 
 // funcao que recebe texto como parametro e imprime na tela como alerta.
 function imprimirTela(impressao){
     alert(impressao);
 }


// funcao para janela modal 


$(document).ready(function() {
//seleciona os elementos a com atributo name="modal"
$('a[name=modal]').click(function(e) {
//cancela o comportamento padrão do link
e.preventDefault();
//armazena o atributo href do link
var id = $(this).attr('href');
//armazena a largura e a altura da tela
var maskHeight = $(document).height();
var maskWidth = $(window).width();
//Define largura e altura do div#mask iguais ás dimensões da tela
$('#mask').css({'width':maskWidth,'height':maskHeight});
//efeito de transição
$('#mask').fadeIn(1);
$('#mask').fadeTo("slow",0.8);
//armazena a largura e a altura da janela
var winH = $(window).height();
var winW = $(window).width();
//centraliza na tela a janela popup
$(id).css('top',  winH/2-$(id).height()/2);
$(id).css('left', winW/2-$(id).width()/2);
//efeito de transição
$(id).fadeIn(2000);
});
//se o botãoo fechar for clicado
$('.window .close').click(function (e) {
//cancela o comportamento padrão do link
e.preventDefault();
$('#mask, .window').hide();
});
//se div#mask for clicado
$('#mask').click(function () {
$(this).hide();
$('.window').hide();
});
});


// funcao para pular os campos quando pressionado enter 

$(document).ready(function(){ 
    /* ao pressionar uma tecla em um campo que seja de class="pula" */ 
    $('.pula').keypress(function(e){ 
        /* * verifica se o evento é Keycode (para IE e outros browsers) 
         * se não for pega o evento Which (Firefox) 
         */ 
        var tecla = (e.keyCode?e.keyCode:e.which); 
        
        /* verifica se a tecla pressionada foi o ENTER */ 
        if(tecla == 13){ 
            /* guarda o seletor do campo que foi pressionado Enter */ 
            campo = $('.pula'); 
            /* pega o indice do elemento*/ 
            indice = campo.index(this); 
            /*soma mais um ao indice e verifica se não é null 
             *se não for é porque existe outro elemento 
             */ 
            if(campo[indice+1] != null){ 
                /* adiciona mais 1 no valor do indice */ 
                proximo = campo[indice + 1]; 
                /* passa o foco para o proximo elemento */ 
                proximo.focus(); 
            } 
            /* impede o sumbit caso esteja dentro de um form */ 
            e.preventDefault(e); 
            return false; 
        } 
        
    }); 
});

$(document).ready(function(){
	$("#currency").maskMoney();
	$("#real").maskMoney({showSymbol:true,symbol:"R$", decimal:",", thousands:".", allowZero:true});
	$("#precision").maskMoney({precision:3});
        
});
