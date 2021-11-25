<?php session_start();?>
<!doctype html>
<html>
    <body>
        <?php include('cabecalho.php');?>

        <h1>Lista de Clientes</h1>
        <form method="post" action="listaCliente.php">
            <input type="text" id="busca" name="busca" required />
            <button name="bt1pesquisa">Pesquisar</button> 
        </form>
        <table border="1" align="center" width="70%">
            <tr>
                <td><b>codigo</b></td>
                <td><b>nome</b></td>
                <td><b>e-mail</b></td>
                <td><b>senha</b></td>
                <td><b>documento</b></td>
                <td><b>telefone</b></td>
            </tr>
            <?php listarCliente(); ?>
        </table>
    </body>
</html>

<?php 
    function listarCliente(){
    $con = new mysqli("localhost", "root", "", "pwt");
    if(isset($_POST["bt1"])){
        $busca = $_POST["busca"];
        $sql = "select * from cliente where nome like '%$busca%' or email like '%$busca%' order by nome";
    } else {
        $sql = "select * from cliente order by nome";
    }
    $retorno = mysqli_query($con, $sql);
    while($reg = mysqli_fetch_array($retorno)){
        $codigoCliente = $reg["codigoCliente"];
        $nome = $reg["nome"];
        $email = $reg["email"];
        $senha = $reg["senha"];
        $cpf = $reg["cpf"];
        $telefone = $reg["telefone"];

        echo "<tr>
        <td>$codigoCliente</td>
        <td>$nome</td>
        <td>$email</td>
        <td>$senha</td>
        <td>$cpf</td>
        <td>$telefone</td>";
        echo "<td><a href='cadastroCliente.php?codigoProduto=$codigoCliente'>Editar</a></td></tr>";
    }
    mysqli_close($con);
}
?>