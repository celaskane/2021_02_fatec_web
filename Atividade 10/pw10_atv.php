<!DOCTYPE html>
<html>
    <body>
        <h1>Atividade pw10</h1>
        <form method = "post" action="pw10_atv.php">
            Valor a: <input type="number" id="n1" name="n1" />
            Valor b: <input type="number" id="n2" name="n2" />
            <button name="b1">Somar</button>
            <button name="b2">Multiplicar</button>
            <button name="b3">Subtrair</button>
            <button name="b4">Dividir</button>
            <button name="b5">Taboada</button>
        </form>
        <?php 
            somar();
            multiplicar();
            subtrair();
            dividir();
            taboada();
        ?>
    </body>
</html>

<?php
function somar() {
    if(isset($_POST["b1"])){
		$a = $_POST["n1"];
		$b = $_POST["n2"];
        $c = $a + $b;
		echo "<br/>a + b = <b>$c</b><br/>";
	}
}

function multiplicar() {
    if(isset($_POST["b2"])){
		$a = $_POST["n1"];
		$b = $_POST["n2"];
        $c = $a * $b;
		echo "<br/>a * b = <b>$c</b><br/>";
	}
}

function subtrair() {
    if(isset($_POST["b3"])){
		$a = $_POST["n1"];
		$b = $_POST["n2"];
        $c = $a - $b;
		echo "<br/>a - b = <b>$c</b><br/>";
	}
}

function dividir() {
    if(isset($_POST["b4"])){
		$a = $_POST["n1"];
		$b = $_POST["n2"];
        $c = $a / $b;
		echo "<br/>a / b = <b>$c</b><br/>";
	}
}

function taboada() {
    if(isset($_POST["b5"])){
		$a = $_POST["n1"];
		$b = $_POST["n2"];
        for($i=0; $i<=$b; $i++){
            $c = $a * $i;
            echo "<br/>a * $i = <b>$c</b><br/>";
        }
	}
}
?>