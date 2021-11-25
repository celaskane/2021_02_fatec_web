<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"></script>
    <title>Menta, a loja</title>
    <link rel="stylesheet" href="p1.1.css" />
  </head>

  <body>
    
    <?php include('cabecalho.php');?>

    <div class="container-fluid mt-1">
      <div id="demo" class="carousel slide" data-ride="carousel" style="background-color: #22b8753b;">
        <!-- Indicadores -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active">Fungi</li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- the slide show -->
        <div class="carousel-inner text-center">
          <div class="carousel-item active">
            <a href="detalhe.php?codigoProduto=2"><img src="imagens/2.jpg" alt="fungi" height="500"></a>
          </div>
          <div class="carousel-item">
            <img src="imagens/jerry.jpg" alt="produto2" height="500">
          </div>
          <div class="carousel-item">
            <img src="imagens/jerry.jpg" alt="produto3" height="500">
          </div>
        </div>

        <!-- left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
    <!-- <div class="text=cente" id='titulo_produto'>LISTA DE PRODUTOS</div> -->
    <br>

    <div class='container text-center' id='corpo'>
      <div class='row'>
        <?php mostravitrine();?>
      </div>
    </div>

  </body>

</html>

<?php
  function mostravitrine(){
    $con    =   new mysqli("localhost", "root", "", "pwt");

    $sql = "select * from produtos order by titulo";

    $retorno    =   mysqli_query($con, $sql);

    while($reg = mysqli_fetch_array($retorno)){
        $codigoProduto  = $reg["codigoProduto"];
        $titulo         = $reg["titulo"];
        $descritivo     = substr($reg["descritivo"], 0, 100);
        $valor          = $reg["valor"];
        $destaque       = $reg["destaque"];
        $qtd            = $reg["qtd"];
        $categoria      = $reg["categoria"];
        $material       = $reg["material"];
        $marca          = $reg["marca"];
        $idioma         = $reg["idioma"];
        $nrjogadores    = $reg["nrjogadores"];   

        echo "
        <div class='card-group col-md-3 col-6'>
          <div class='card border-success col-md-auto p-1 mt-1' id='card'>
            <a href='detalhe.php?codigoProduto=$codigoProduto'>
              <img class='card-img-top m-auto' style='height:15rem; max-width: fit-content;' src='imagens/$codigoProduto.jpg' alt='Card image cap'>
            </a>
            <div class='card-body align-items-center'>
              <h5 class='card-title'>$titulo</h5>
              <p class='card-text'>$descritivo...</p>
            </div>
            <div class='card-footer border-success text-muted'>
              <a href='detalhe.php?codigoProduto=$codigoProduto' style='width: 100%' class='btn btn-success'>Garanta o seu</a>
            </div>
           </div>
        </div>
        ";
    }

    mysqli_close($con); 
  }
?>
<!-- 

<div class="container-xl text-center p-1" id="corpo">
    <div col-3 mt-5 id="titulo_produto">LISTA DE PRODUTOS</div>
    <div class="card-deck">
      <div class="card col-md-3" style="width: 20rem;" id="card">
        <img class="card-img-top" src="imagens/destaque2.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Fungi</h5>
          <p>Uma loja só para lojas está para chegar...</p>
          <a href="detalhe.html" class="btn btn-success">Garanta o seu</a>
        </div>
      </div>
      <div class="card col-md-3" style="width: 20rem;" id="card">
        <img class="card-img-top" src="imagens/destaque2.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Fungi</h5>
          <p>Uma loja só para lojas está para chegar...</p>
          <a href="detalhe.html" class="btn btn-success">Garanta o seu</a>
        </div>
      </div>
    </div>
  </div>
</div> -->
