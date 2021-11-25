<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <title>Menta Alterar senha</title>
  <link rel="stylesheet" href="p1.1.css" />
  <script lang="javascript" src="vali.js"></script>
</head>

<body>
  <?php include('cabecalho.php');?>

  <h1 class="text-center mt-3">Alterar senha</h1>
  <div class="container">
  <form class="from-group" method="post" action="novaSenha.php">
    
      <label for="nome">Digite seu e-mail</label>
      <input type="email" class="form-control" id="email" name="email">

      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha">

      
      <!-- <button class="btn btn-success mt-2" click="validar();" name="btPesquisar" id="btPesquisar">Pesquisar</button> -->
      <button class="btn btn-success mt-2" click="validar();" name="btAlterar" id="btAlterar">Alterar</button>

    </form>  
    <?php
	    if(isset($_POST["btAlterar"])) alterar($_POST["email"]);	
      if(isset($_GET["email"])) alterar($_GET["email"]);
    ?>  
  </div>
</body>
</html>

<script lang="javascript">
  function validar() {
    if (!reEmail.test(email.value)) {
      alert("Informe um email valido !");
      email.focus();
      email.value = "";
      return false;
    }
    if (!reSenhaForte.test(senha.value)) {
      alert("preencha uma senha alfanumerica com ao menos 8 caracteres!");
      senha1.focus();
      senha1.value = "";
      return false;
    }
  }
</script>


<?php
  function alterar($email){
    $con		=	new mysqli("localhost", "root", "", "pwt");
    $email	=	$_POST["email"];
    $senha	=	$_POST["senha"];
    $sql	=	"update cliente set senha=md5('$senha') where email='$email'";
    if(mysqli_query($con, $sql)){
      echo "<h3>Senha alterada com sucesso !</h3>";		
    } else {
      echo "<h4>Ocorreu um erro</h4>";
    }
    mysqli_close($con);
  }	
?>