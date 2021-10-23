<?php
    session_start();
    function mostrarDados(){
        $nome  = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $telefone = $_SESSION["telefone"];
        $senha = $_SESSION["senha"];
        $id    = session_id();
        echo "<h3>Variaveis de sessao</h3>";
        echo "nome=$nome<br/>email=$email<br/>telefone=$telefone<br/>senha=$senha<br/>Session id=$id";
    }
?>

<!doctype html>
<html>
    <body>
        <?php mostrarDados(); ?>
    </body>
</html>