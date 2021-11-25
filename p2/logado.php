<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <title>Perfil</title>
      <link rel="stylesheet" href="p1.1.css" />
    </head>
    <body>
        <?php include('cabecalho.php');?>

    <div class="container">
        <h2>Meu Cadastro</h2> 
	    <form class="from-group" method="post" action="logado.php">

        <label for="nome">Nome</label>
		<input  type="text" class="form-control" id="nome" name="nome"/></br>

		<label for="email">Email:</label>
		<input type="text" class="form-control" id="email" name="email" /></br>

		<label for="cpf">Cpf:</label>
		<input type="text" class="form-control" id="cpf" name="cpf" /></br>

		<label for="telefone">Telefone:</label>	
		<input type="text" class="form-control" id="telefone" name="telefone" /></br>

		<label for="endereco">Endereço:</label>	
		<input type="text" class="form-control" id="endereco" name="endereco" /></br>
 
		<button class="btn btn-success" name="bt1">Salvar</button></br></br>

        <a class='link-danger' href='sair.php'>Clique aqui para sair</a></br></br>
	</form>
        <?php
        mostrarDados();
        if(isset($_POST["bt1"])) alterar();	
        ?>
    </div>

    </body>
</html>

<?php
function mostrarDados(){
    if (isset($_SESSION["nome"])==false) {
        header("location: verificalogin.php");
    }
    else{
        $nome       = $_SESSION["nome"];
        $email      = $_SESSION["email"];
        $cpf        = $_SESSION["cpf"];
        $telefone   = $_SESSION["telefone"];
        $endereco   = $_SESSION["endereco"];

        $id = session_id();
        echo "<script lang='javascript'>";
		echo "nome.value='$nome';";
		echo "email.value='$email';";
		echo "cpf.value='$cpf';";
		echo "telefone.value='$telefone';";
		echo "endereco.value='$endereco';";
		echo "</script>";
    }
}

function alterar(){
    $nome             = $_POST["nome"];
    $email            = $_POST["email"];
    $cpf              = $_POST["cpf"];
    $telefone         = $_POST["telefone"];
    $endereco         = $_POST["endereco"];

    $con	=	new mysqli("localhost", "root", "", "pwt");
    $sql	=	"update cliente set nome='$nome', email='$email', cpf='$cpf', telefone='$telefone', endereco='$endereco'";
	if(mysqli_query($con, $sql)){
		echo "<h3>Cadastro atualizado com sucesso !</h3>";		
	} else {
		echo "<h4>Ocorreu um erro</h4>";
	}
	mysqli_close($con);
}
?>