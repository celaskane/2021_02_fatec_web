<?php
    if(isset($_POST["btPost"])){
        $nome  = $_POST["nome"];	
        $email = $_POST["email"];	
        $telefone = $_POST["telefone"];
        $senha = $_POST["senha"];
        //echo "<h2>Recebidos por post</h2>nome=$nome <br/> email=$email <br/> telefone=$telefone <br/> senha=$senha";
        session_start();
        $_SESSION["nome"] = $nome;
        $_SESSION["email"] = $email;
        $_SESSION["telefone"] = $telefone;
        $_SESSION["senha"] = $senha;
        $id    = session_id();
        echo "<h3>Dados</h3>";
        echo "nome=$nome<br/>email=$email<br/>telefone=$telefone<br/>senha=$senha<br/>Session id=$id";
        header("location: sessao.php");
    }
?>