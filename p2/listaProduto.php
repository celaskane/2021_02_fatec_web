<?php session_start();?>
<!doctype html>
<html>
    <body>
        <?php include('cabecalho.php');?>

        <h1>Lista de Produtos</h1>
        <form method="post" action="listaProduto.php">
            <input type="text" id="busca" name="busca" required />
            <button name="bt1">Pesquisar</button>
        </form>
        <table border="1" align="center" width="70%">
            <tr>
                <td><b>codigo</b></td>
                <td><b>titulo</b></td>
                <td><b>descritivo</b></td>
                <td><b>valor</b></td>
                <td><b>destaque</b></td>
                <td><b>qtd</b></td>
                <td><b>categoria</b></td>
                <td><b>material</b></td>
                <td><b>marca</b></td>
                <td><b>idioma</b></td>
                <td><b>nrjogadores</b></td>
            </tr>
            <?php listarProduto(); ?>
        </table>
    </body>
</html>

<?php 
function listarProduto(){
    $con    =   new mysqli("localhost", "root", "", "pwt");
    if(isset($_POST["bt1"])){
        $busca = $_POST["busca"];
        $sql = "select * from produtos where titulo like '%$busca%' or categoria like '%$busca%' order by titulo";
    } else {
        $sql = "select * from produtos order by titulo";
    }
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

        echo "<tr>
                <td>$codigoProduto</td>
                <td>$titulo</td>
                <td>$descritivo</td>
                <td>$valor</td>
                <td>$destaque</td>
                <td>$qtd</td>
                <td>$categoria</td>
                <td>$material</td>
                <td>$marca</td>
                <td>$idioma</td>
                <td>$nrjogadores</td>";
        echo "<td><a href='produto.php?codigoProduto=$codigoProduto'>Editar</a></td></tr>";
    }

    mysqli_close($con); 
}
?>