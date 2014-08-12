
        <?php
            session_start("login");
            
            if(empty($_SESSION["user"])){
                header("location: ../paginas/login.php");
            }
        ?>
   