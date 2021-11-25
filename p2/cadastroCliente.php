<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <title>Menta Cadastro</title>
  <link rel="stylesheet" href="p1.1.css" />
  <script lang="javascript" src="vali.js"></script>
</head>

<body>
  <?php include('cabecalho.php');?>

  <h1 class="text-center mt-3">CADASTRO</h1>
  <form class="from-group" method="post" action="cadastroCliente.php" id="form1">
    <div class="container">
    
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome">

      <label for="email">E-mail</label>
      <input type="email" class="form-control" id="email" name="email">

      <label for="senha">Senha</label>
      <input type="password" class="form-control" id="senha" name="senha">

      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf">

      <label for="telefone">Telefone</label>
      <input type="text" class="form-control" id="telefone" name="telefone">

      <label for="endereco">Endereço</label>
      <input type="text" class="form-control" id="endereco" name="endereco">

      <button type="button" class="btn btn-success mt-2" click="validar();" name="btCadastro" id="btCadastro">Confirma</button>
      
      <a class="btn btn-primary mt-2" href="paglogincadastro.php">Já tenho uma conta</a><br><br><br>
    </div>
  </form>    
</body>
</html>

<script lang="javascript">
  function validar() {
    if (!reNome.test(nome.value)) {
      alert("preencha o seu nome!");
      nome.focus();
      return false;
    }
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
    if (!reCPF.test(cpf.value)) {
      alert("Informe um cpf valido !");
      cpf.focus();
      cpf.value = "";
      return false;
    }
    if (!reTelefone.test(telefone.value)) {
      alert("Informe um telefone valido !");
      telefone.focus();
      telefone.value = "";
      return false;
    }
    //if(!reEndereco.test(endereco.value)){
    //  alert("Informe um endereço valido !");
    //  endereco.focus();
    //  endereco.value="";
    //  return false;
    //}
    form1.submit();
  }
</script>

<?php
if (isset($_POST["nome"])) inserirCliente();
?>

<?php
function inserirCliente()
{
  if (isset($_POST["btCadastro"])){
  $nome             = $_POST["nome"];
  $email            = $_POST["email"];
  $senha            = $_POST["senha"];
  $cpf              = $_POST["cpf"];
  $telefone         = $_POST["telefone"];
  $endereco         = $_POST["endereco"];
  $con    =  new mysqli("localhost", "root", "", "pwt");

  $sql  =  "insert into cliente(nome, email, senha, cpf, telefone, endereco) values('$nome', '$email', md5('$senha'), '$cpf', '$telefone', '$endereco')";
  if(mysqli_query($con, $sql)) 
  {
    echo "<h3>Cliente inserido com sucesso !</h3>";
  } 
  else 
  {
    echo "<h4>Ocorreu um erro</h4>";
  }
  mysqli_close($con);
  }
}	
?>