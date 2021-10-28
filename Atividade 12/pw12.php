<!doctype html>
<html>
    <body>
        <h1>Produto</h1>
        <form method="post" action="pw12.php">
            codigo: <input type="number" id="codigo" name="codigo" /><br/>
            descritivo: <input type="text" id="descritivo" name="descritivo" /><br/>
            valor: <input type="text" id="valor" name="valor" /><br/>
            quantidade: <input type="number" id="quantidade" name="quantidade" /><br/>
            categoria: <input type="text" id="categoria" name="categoria" /><br/>
            <button name="bt1">Inserir</button>
            <button name="bt2">Pesquisar</button>
            <button name="bt3">Alterar</button>
            <button name="bt4">Remover</button>
        </form>
        <?php
            if(isset($_POST["bt1"])) inserir();
            if(isset($_POST["bt2"])) pesquisar();
            if(isset($_POST["bt3"])) alterar();
            if(isset($_POST["bt4"])) remover();
        ?>
    </body>
</html>

<?php
    function inserir(){
        $codigo         = $_POST["codigo"];
        $descritivo     = $_POST["descritivo"];
        $valor          = $_POST["valor"];
        $quantidade     = $_POST["quantidade"];
        $categoria      = $_POST["categoria"];
        $con    = new mysqli("localhost", "root", "", "pwt");
        $sql    = "insert into produto(descritivo, valor, quantidade, categoria) values('$descritivo', '$valor', '$quantidade', '$categoria')";
        if(mysqli_query($con, $sql)){
            echo "<h3>Produto inserido com sucesso!</h3>";
        } else {
            echo "<h4>Ocorreu um erro.</h4>";
        }
        mysqli_close($con);
    }

    function pesquisar(){
        $codigo = $_POST["codigo"];
        $con    = new mysqli("localhost", "root", "", "pwt");
        $sql    = "select * from produto where codigo='$codigo'";
        $retorno = mysqli_query($con, $sql);

        if($reg = mysqli_fetch_array($retorno)){
            $descritivo = $reg["descritivo"];
            $valor = $reg["valor"];
            echo "<script lang='javascript'>";
            echo "descritivo.value='$descritivo';";
            echo "valor.value='$valor';";
            echo "codigo.value='$codigo';";
            echo "</script>";
        } else {
            echo "<h4>Produto não encontrado !!!</h4>";
        }
        mysqli_close($con);
    }

    function alterar(){
        $codigo         = $_POST["codigo"];
        $descritivo     = $_POST["descritivo"];
        $valor          = $_POST["valor"];
        $quantidade     = $_POST["quantidade"];
        $categoria      = $_POST["categoria"];
        $con    = new mysqli("localhost", "root", "", "pwt");
        $sql    = "update produto set descritivo='$descritivo', valor='$valor', quantidade='$quantidade', categoria='$categoria' where codigo='$codigo'";
        if(mysqli_query($con, $sql)){
            echo "<h3>Produto alterado com sucesso!</h3>";
        } else {
            echo "<h4>Ocorreu um erro $sql</h4>";
        }
        mysqli_close($con);
    }

    function remover(){
        $codigo         = $_POST["codigo"];
        $descritivo     = $_POST["descritivo"];
        $valor          = $_POST["valor"];
        $quantidade     = $_POST["quantidade"];
        $categoria      = $_POST["categoria"];
        $con    = new mysqli("localhost", "root", "", "pwt");
        $sql    = "delete from produto where codigo='$codigo'";
        if(mysqli_query($con, $sql)){
            echo "<h3>Produto removido com sucesso!</h3>";
        } else {
            echo "<h4>Ocorreu um erro $sql</h4>";
        }
        mysqli_close($con);
    }
?>