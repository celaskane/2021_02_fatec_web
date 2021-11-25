<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <title>Menta Esqueci a senha</title>
        <link rel="stylesheet" href="p1.1.css" />
    </head>

    <body>
    <?php include('cabecalho.php');?>
    
        <div class="container mt-3">
            <form method="post" action="esqueSenha.php">
                <div class="form-group">
                    <label for="esqueceSenha">INFORME O SEU E-MAIL </label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <button class="btn btn-success" id="btOk" name="btOk">Ok</button>
            </form>
            <?php
             if(isset($_POST["btOk"])) enviarEmail();
            ?>
        </div>
    </body>
</html>
<?php
function enviarEmail(){
    if(isset($_POST["btOk"])){
        $email = $_POST["email"];
        $txtAssunto = "Loja Menta - Recuperacao de senha ";
        $header = "MIME-Version: 1.0\r\n";
        $header .= "from: Loja Menta<gabriel20silver@hotmail.com>";
        $con = new mysqli("localhost", "root", "", "pwt");
        $sql		=	"select * from cliente where email='$email'";
	    $retorno 	= mysqli_query($con, $sql);

        if($reg = mysqli_fetch_array($retorno)){
            $email = $reg["email"];
            $codigoCliente = $reg["codigoCliente"];
            $txtMensagem = "Como solicidado aqui esta o link para a alteracao de senha http://localhost/p2/p2/novaSenha.php?email=$email";

            $success = mail($email, $txtAssunto, $txtMensagem, $header);
            if($success){	
                echo "<h4>Email enviado com sucesso</h4>";
            } else {
                echo "<h4>Email não encontrado !</h4>";	
            }
        }   
    }
    mysqli_close($con);
}
?>