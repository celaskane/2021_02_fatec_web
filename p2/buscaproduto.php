<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <title>Menta Busca</title>
        <link rel="stylesheet" href="p1.1.css" />
    </head>

    <body>
        <?php include('cabecalho.php');?>
    
        <div class="container mt-5">
          <form class="d-flex flex-row" method="post" action="buscaproduto.php">
              <input class="form-control" id="busca" type="text" placeholder="Pesquisar" name="busca" required />
              <button class="btn btn-success" name="bt1">Pesquisar</button>
          </form>
          <div class="container mt-5">
            <?php 
              	if(isset($_POST["bt1"])) mostrarProduto($_POST["busca"]);

                if(isset($_GET["busca"])) mostrarProduto($_GET["busca"]); 
            ?>
          </div>
        </div>
    </body>
</html>

<?php

function mostrarProduto($busca){
    $con = new mysqli("localhost", "root", "", "pwt");

    $sql = "select * from produtos where titulo like '%$busca%' or categoria like '%$busca%' order by titulo";

    $retorno    =   mysqli_query($con, $sql);
    while($reg = mysqli_fetch_array($retorno)){
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
        $nrjogadores    = $reg["nrjogadores"]; 
        
        echo "<div class='media mt-5'>
                <div class='media-left m-2'>
                    <img src='Imagens/$codigoProduto.jpg' class='media-object' style='width:60px'>
                </div>
                <div class='media-body'>
                    <h4 class='media-heading'><a href='detalhe.php?codigoProduto=$codigoProduto'>$titulo</a></h4>
                    <p>$categoria</p>
                    <p>$descritivo</p>
                    <p>R$:$valor</p>
                </div>
            </div>";
    }
    mysqli_close($con);
}
?>