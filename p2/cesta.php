<?php session_start();?> 
<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <title>Cesta</title>
      <link rel="stylesheet" href="p1.1.css" />
  </head>

<body>
<?php include('cabecalho.php');?>
  

  <div class='container p-3 my-3 bg-light text-dark'>
    <h1>Carrinho</h1><br/>
      <table  class='table'>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor</th>  
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php listarCesta(); 
        ?>
        </tbody>      
      </table>

      <form class="form-group" method="post" action="cesta.php">
        <button class='btn btn-danger' name="btLimpar">
          Limpar Cesta
        </button>
        <button class='btn btn-success' name="btFinalizar">
          Finalizar
        </button>
        <?php
          if(isset($_POST["btLimpar"])) limparCesta(); 
        ?>
      </form>

    </table>
  </div>
</body> 

</html>


<?php

  function listarCesta(){
    $id   = session_id();
    $sql  = "SELECT p.codigoProduto, p.titulo, c.qtd, p.valor FROM cesta c, produtos p WHERE c.codigoCesta=p.codigoProduto AND c.sessionId='$id' ORDER BY p.codigoProduto";
    $total = 0;
    $qTotal = 0;
    $conexao = new mysqli("localhost", "root", "","pwt");
    $retorno = mysqli_query($conexao, $sql);
    
    while($reg = mysqli_fetch_array($retorno)){
      $codigoProduto  = $reg["codigoProduto"];
      $titulo         = $reg["titulo"];
      $valor          = $reg["valor"];
      $qtd            = $reg["qtd"];
      $total = $total + $valor;
      $qTotal = $qTotal + $qtd;
      echo "
          <tr>
            <td>$titulo</td>
            <td>$qtd</td>
            <td>R$ $valor</td>
          </tr>";
    }
    echo "
        <tfoot>
        <tr>
          <td><b>TOTAL</b></td>
          <td>$qTotal</td>
          <td>R$ $total,00</td>
          <td></td>
        </tr>
      </tfoot>
      ";
    mysqli_close($conexao);
  }

  function limparCesta(){

    $con	=	new mysqli("localhost", "root", "", "pwt");

    $sql  = "TRUNCATE TABLE cesta";
    mysqli_query($con, $sql);
    mysqli_close($con);
  }

//   function limparCesta(){
//     $sessionId   = session_id();

//     $con	=	new mysqli("localhost", "root", "", "pwt");

//     $sql  = "delete from cesta where sessionId='$sessionId'";
//     if(mysqli_query($con, $sql)){
//     	echo "<h3>Produto removido com sucesso !</h3>";		
//     } 
//     else{
//     echo "<h4>Ocorreu um erro</h4>";
//     }
//     mysqli_close($con); 
//   }
// 
?>