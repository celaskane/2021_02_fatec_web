<?php
    session_start();
    if (isset($_SESSION["nome"])==true) {
      header("location: logado.php");
    }
    else{
      header("location: paglogincadastro.php");
    }
?>