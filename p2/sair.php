<?php
    session_start();
    $con	=	new mysqli("localhost", "root", "", "pwt");
    $sql  = "TRUNCATE TABLE cesta";
    mysqli_query($con, $sql);
    mysqli_close($con);

    session_destroy();
    header("location: verificalogin.php")
?>