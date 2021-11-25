<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <title>Menta Detalhe</title>
        <link rel="stylesheet" href="p1.1.css" />
    </head>
    <body>
      <?php include('cabecalho.php');?>

      <?php 
        if (isset($_GET["codigoProduto"])) mostraProduto($_GET["codigoProduto"]);
      ?>
    </body>
</html>

<?php

function mostraProduto($codigoProduto){
    $con    =   new mysqli("localhost", "root", "", "pwt");

    $sql = "select * from produtos where codigoProduto like '%$codigoProduto%'";

    $retorno    =   mysqli_query($con, $sql);

    if($reg = mysqli_fetch_array($retorno)){
        $codigoProduto  = $reg["codigoProduto"];
        $titulo         = $reg["titulo"];
        $descritivo     = $reg["descritivo"];
        $valor          = $reg["valor"];
        $destaque       = $reg["destaque"];
        $qtd            = $reg["qtd"];
        $categoria      = $reg["categoria"];
        $material       = $reg["material"];
        $marca          = $reg["marca"];
        $idioma         = $reg["idioma"];
        $nr_jogadores   = $reg["nrjogadores"];

        echo "<div class='container h-25 w-25 float-left p1-5'>
        <img src='imagens/$codigoProduto.jpg' class='img-thumbnail ' alt='Cinque Terre'>
        </div>
          <div class='container w-26 p1-6'>
            <h1 class='display-4 text-left'>$titulo</h1>
          </div>

          <div class='container mx-auto text-justify'>
            <h6 class='mx-auto'>$descritivo</h6>
          </div>
          
          <div class='container'>
              </br>
              <h5 class='font-weight-bold'>R$ $valor</h5>
              <a  href='incluirCesta.php?codigoProduto=$codigoProduto' class='btn btn-warning btn-lg bi bi-bug'>COMPRAR</a></button>
          </div>

          <div class='container float-left'>
              </br>
              </br>
              <h1>Descrição do Produto</h1>
              <dl class='font-weight-light'>
                  <dt>Material</dt>
                  <dd>$material</dd>
                  <dt>Marca</dt>
                  <dd>$marca</dd>
                  <dt>Idioma</dt>
                  <dd>$idioma</dd>
                  <dt>Número de jogadores</dt>
                  <dd>$nr_jogadores</dd>
              </dl>
          </div>

        </div>";
    }
    mysqli_close($con); 
}

?>