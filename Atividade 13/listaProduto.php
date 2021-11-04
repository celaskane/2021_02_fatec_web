<!doctype html>
<html>
    <body>
        <h1>Lista de produtos</h1>
        <a href="produto.php">inserir novo</a>
        <form method="post" action="listaProduto.php">
            <input type="text" id="busca" name="busca" required />
            <button name="bt1">Pesquisar</button>
        </form>
        <table border="1" align="center" width="70%">
            <tr>
                <td><b>codigo</b></td>
                <td><b>descritivo</b></td>
                <td><b>valor</b></td>
                <td><b>quantidade</b></td>
                <td><b>categoria</b></td>
            </tr>
            <?php listar(); ?>
        </table>
    </body>
</html>

<?php
    function listar(){
        $con = new mysqli("localhost", "root", "", "pwt");
        if(isset($_POST["bt1"])){
            $busca = $_POST["busca"];
            $sql = "select * from produto where descritivo like '%$busca%' or categoria like '%$busca%' order by descritivo";
        } else{
            $sql = "select * from produto order by descritivo";
        }
        $retorno = mysqli_query($con, $sql);
        while($reg = mysqli_fetch_array($retorno)){
            $codigo = $reg["codigo"];
            $descritivo = $reg["descritivo"];
            $valor = $reg["valor"];
            $quantidade = $reg["quantidade"];
            $categoria = $reg["categoria"];
            echo "<td>$codigo</td><td>$descritivo</td><td>$valor</td><td>$quantidade</td><td>$categoria</td>";
		    echo "<td><a href='produto.php?codigo=$codigo'>Editar</a></td></tr>";
        }
        mysqli_close($con);
    }
?>