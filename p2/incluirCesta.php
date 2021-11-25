<?php
    if($_GET["codigoProduto"]) {
        $produto = $_GET["codigoProduto"];
        session_start();
        $id = session_id();
        $sql = "INSERT INTO cesta(sessionId, codigoCesta, qtd) VALUES
        ('$id', '$produto', 1)";
        $conexao = new mysqli("localhost", "root", "", "pwt");
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);
    }

    header("location: cesta.php");
?>