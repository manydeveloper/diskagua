<!doctype html><?php      session_start("login");?><html><head><meta charset="utf-8"><link href="../css/style.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script><script type="text/javascript" src="../js/script.js"></script><title>LOGIN</title></head><body>    <div id="div_login" ><form action="../functions/logar_sql.php" method="post">        <br>    <label id="label_login"><strong>Login</strong></label>    <br>    <input type="text" name="login" id="login">    <br>    <label id="label_login"><strong>Senha</strong></label>    <br>    <input type="password" name="senha" id="senha">    <br>    <input id="botao_logar" type="submit" value="Logar">    </form>        <br>        <?php 				if (!empty($_GET["acao"]) == "ERRO"){		echo "Login ou Senha incorreto";		}		?>    </div>   </body></html>