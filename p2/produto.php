<?php session_start();?>
<!doctype html>
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
    <link rel="stylesheet" href="p1.1.css" />
	</head>
<body>
	<?php include('cabecalho.php');?>

	<div class="page-header" styles:text-align:center>
		<h1> Inserir Produto</h1>
	</div>
	<a href="listaProduto.php">voltar para a lista</a>
	<form class="from-group" method="post" action="produto.php">
		<label for="codigoProduto">Codigo</label>
		<input  type="number" class="form-control" id="codigoProduto" name="codigoProduto"/><br/>

		<label for="titulo">Titulo:</label>
		<input type="text" class="form-control" id="titulo" name="titulo" /><br/>

		<label for="descritivo">Descritivo:</label>
		<input type="text" class="form-control" id="descritivo" name="descritivo" /><br/>

		<label for="valor">Valor:</label>	
		<input type="number" class="form-control" id="valor" name="valor" /><br/>

		<label for="destaque">Destaque:</label>	
		<input type="text" class="form-control" id="destaque" name="destaque" /><br/>

		<label for="qtd">Quantidade:</label>	
		<input type="number" class="form-control" id="qtd" name="qtd" /><br/>

		<label for="categoria">Categoria:</label>	
		<input type="text" class="form-control" id="categoria" name="categoria" /><br/>

		<label for="material">material:</label>	
		<input type="text" class="form-control" id="material" name="material" /><br/>

		<label for="marca">marca:</label>	
		<input type="text" class="form-control" id="marca" name="marca" /><br/>

		<label for="idioma">idioma:</label>	
		<input type="text" class="form-control" id="idioma" name="idioma" /><br/>

		<label for="nrjogadores">Número de jogadores:</label>	
		<input type="text" class="form-control" id="nrjogadores" name="nrjogadores" /><br/>
		
		<div class="container">
			<button class="btn btn-success" name="bt1">Inserir</button>
			<button class="btn btn-success" name="bt2">Pesquisar</button>
			<button class="btn btn-success" name="bt3">Alterar</button>
			<button class="btn btn-success" name="bt4">Remover</button>
		</div>
	</form>
	<?php
	if(isset($_POST["bt1"])) inserir();
	if(isset($_POST["bt2"])) pesquisar($_POST["codigoProduto"]);
	if(isset($_POST["bt3"])) alterar();	
	if(isset($_POST["bt4"])) remover();
	if(isset($_GET["codigoProduto"])) pesquisar($_GET["codigoProduto"]);
	?>
</body>
</html>
<?php
function inserir(){
	$codigoProduto	=	$_POST["codigoProduto"];
	//echo "<h3>$codigoProduto</h3>";
	$titulo    		=	$_POST["titulo"];
	//echo "<h3>$titulo</h3>";
    $descritivo 	=   $_POST["descritivo"];
	//echo "<h3>$descritivo</h3>";
    $valor      	=   $_POST["valor"];
	//echo "<h3>$valor</h3>";
    $destaque  	 	=   $_POST["destaque"];
	//echo "<h3>$destaque</h3>";
    $qtd        	=   $_POST["qtd"];
	//echo "<h3>$qtd</h3>";
    $categoria		=   $_POST["categoria"];
	//echo "<h3>$categoria</h3>";
	$material		=   $_POST["material"];
	//echo "<h3>$material</h3>";
	$marca 			= 	$_POST["marca"];
	//echo "<h3>$marca</h3>";
	$idioma			=   $_POST["idioma"];
	//echo "<h3>$idioma</h3>";
	$nrjogadores	=   $_POST["nrjogadores"];
	//echo "<h3>$nrjogadores</h3>";

	$con			=	new mysqli("localhost", "root", "", "pwt");


	$sql = "INSERT INTO produtos(titulo, descritivo, valor, destaque, qtd, categoria, material, marca, idioma, nrjogadores) 
	VALUES('$titulo', '$descritivo', '$valor', '$destaque', '$qtd', '$categoria', '$material', '$marca', '$idioma', '$nrjogadores')";
	echo "<h3>$sql</h3>";
	if(mysqli_query($con, $sql)){
		echo "<h3>Produto inserido com sucesso !</h3>";		
	} else {
		echo "<h4>Ocorreu um erro</h4>";
	}
	mysqli_close($con);
}	

function pesquisar($codigoProduto){
	$con	    =	new mysqli("localhost", "root", "", "pwt");
	$sql	    =	"select * from produtos where codigoProduto='$codigoProduto'";
	$retorno 	= mysqli_query($con, $sql);
	
	if($reg = mysqli_fetch_array($retorno)){
		$titulo	    	=	$reg["titulo"];
		$descritivo 	=   $reg["descritivo"];
		$valor			=	$reg["valor"];
		$destaque   	=  	$reg["destaque"];
		$qtd			=	$reg["qtd"];
		$categoria		=	$reg["categoria"];
		$material		=   $reg["material"];
		$marca			=	$reg["marca"];
		$idioma			=   $reg["idioma"];
		$nrjogadores	=   $reg["nrjogadores"];

		echo "<script lang='javascript'>";
		echo "codigoProduto.value='$codigoProduto';";
		echo "titulo.value='$titulo';";
		echo "descritivo.value='$descritivo';";
		echo "valor.value='$valor';";
		echo "destaque.value='$destaque';";
		echo "qtd.value='$qtd';";
		echo "categoria.value='$categoria';";
		echo "material.value='$material';";
		echo "marca.value='$marca';";
		echo "idioma.value='$idioma';";
		echo "nrjogadores.value='$nrjogadores';";
		
		echo "</script>";
	} else {
		echo "<h4>Registro não encontrado !!!</h4>";
	}
	mysqli_close($con);
}


function alterar(){
	$codigoProduto	    =	$_POST["codigoProduto"];
	$titulo     		=   $_POST["titulo"];
    $descritivo 		=   $_POST["descritivo"];
    $valor      		=   $_POST["valor"];
    $destaque   		=   $_POST["destaque"];
    $qtd        		=   $_POST["qtd"];
    $categoria			=   $_POST["categoria"];
	$material			=   $_POST["material"];
	$marca				= 	$_POST["marca"];
	$idioma				=   $_POST["idioma"];
	$nrjogadores		=   $_POST["nrjogadores"];

		$con	=	new mysqli("localhost", "root", "", "pwt");
		$sql	=	"update produtos set titulo='$titulo', categoria='$categoria', valor='$valor' where codigoProduto='$codigoProduto'";
	if(mysqli_query($con, $sql)){
		echo "<h3>Produto alterado com sucesso !</h3>";		
	} else {
		echo "<h4>Ocorreu um erro</h4>";
	}
	mysqli_close($con);
}	

function remover(){
	$codigoProduto	=	$_POST["codigoProduto"];
	$con	=	new mysqli("localhost", "root", "", "pwt");
	$sql	=	"delete from produtos where codigoProduto='$codigoProduto'";
	if(mysqli_query($con, $sql)){
		echo "<h3>Produto removido com sucesso !</h3>";		
	} else {
		echo "<h4>Ocorreu um erro</h4>";
	}
	mysqli_close($con);
}	
?>