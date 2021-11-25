
<?php
    session_start();
    if (isset($_SESSION["nome"])==true) {
      header("location: logado.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <title>Pagina de Cadastro/Login</title>
        <link rel="stylesheet" href="p1.1.css" />
    </head>
    <body>
    <div class="cabecalho p-1">

<!-- primeira barra -->
<div class="d-flex justify-content-between primeirabarra">
  <!-- logo -->
  <a class="logo navbar-brand" href="p1.php">
    <img src="./imagens/shop-16.png"  width="60" height="50"  alt="">
  </a>

  <a class="logo navbar-brand" href="p1.php"> 
    <h1 class="titulo slogan text-center">Menta</h1>
  </a>

  <!-- pesquisa -->
  <form method="get" action="buscaproduto.php" class="pesquisa form-inline">
    <input class="barrapesquisa form-control m-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="busca">

    <button class="btn btnpesquisa navbar-brand" href="buscaproduto.php">
      <img src="Imagens/search_icon.png" width="40" height="40">
  </button>
  </form>

  <!-- cadastro -->
  <a class="cadastro navbar-brand" href="verificalogin.php">
    <img src="./imagens/lah.png" width="60" height="60" alt="">
  </a>

  <a class="cadastro navbar-brand mt-1" href="cesta.php">
    <img src="./imagens/carrinho.png" width="45" height="45" alt="">
  </a>
</div>
  
<!-- barra menu -->
<nav class="barramenu m-1 navbar navbar-expand-sm navbar-light bg-light">

  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
    Menu
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav bg-light">

      <li class="nav-item active">
        <a class="nav-link" href="sobre.php">Sobre a loja<span class="sr-only"></span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="contato.php">Contato<span class="sr-only"></span></a>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Serviços
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="paglogin.php">Cadastro</a>
          <a class="dropdown-item" href="cesta.php">Carrinho</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>
</div>
    
        <div class="container-fluid">
            <h1>Cadastro/Login</h1>
            <div class="row">
              <div class="col-sm-6" style="background-color:#9af1ca;">
                <h4 class="text-center">Já tenho Cadastro</h4>
                <form method="post" action="paglogincadastro.php">
                      <label for="email">Email:</label><br>
                      <input type="email" class="form-control" placeholder="E-mail" id="email" name="email"><br>
                      <label for="senha">Senha:</label><br>
                      <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha"><br>
                      <button class="btn btn-primary" name="btEntrar">Entrar</button>
                  </form>
                  <?php 
                  if(isset($_POST["btEntrar"])) entrar();
                  ?>
                  <a class="navbar-brand" href="esqueSenha.php">Esqueceu sua senha?</a>
                </div>
              <div class="col-sm-6" style="background-color:#9af1ca;">
                <h4>Ainda não tem cadastro?</h4><br>
                <button class="btn btn-primary">
                  <a class="btn text-light m-0" href="cadastroCliente.php">Clique aqui</a></button>
                </div>
            </div>
          </div>
      </body>
</html>

<?php
function entrar(){

  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $con		=	new mysqli("localhost", "root", "", "pwt");
  $sql		=	"select codigoCliente,nome,email,cpf,telefone,endereco from cliente 
  where email='$email' and senha=md5('$senha')";
  $retorno 	= mysqli_query($con, $sql);
  //echo "email=$email senha =$senha";
  //echo $sql;
  if($reg = mysqli_fetch_array($retorno)){
    $_SESSION["email"] 	= $reg["email"];
    $_SESSION["nome"] 	= $reg["nome"];
    $_SESSION["cpf"] = $reg["cpf"] ;
    $_SESSION["telefone"] = $reg["telefone"] ;
    $_SESSION["endereco"] = $reg["endereco"] ;
    $_SESSION["codigoCliente"] = $reg["codigoCliente"];
    header("location: cesta.php");
  } else {
    echo "<h3>Usuario ou senha invalidos</h3>";	
  }
  mysqli_close($con);
}
?>