<!docktype html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="mt-3 text-center">Email online 1000% gratuito</h1>
        <form class="form-group m-auto w-75" action="pw14.php" method="post">
            de:         <input class="form-control" type="text" id="de" name="de"/><br><br>
            para:       <input class="form-control" type="text" id="para" name="para"/><br><br>
            assunto:    <input class="form-control" type="text" id="assunto" name="assunto"/><br><br>
            mensagem:   <input class="form-control" type="text" id="mensagem" name="mensagem"/><br>
            <button class="btn btn-success" name="bt1">enviar</button><br><br>
        </form>
        <?php enviaremail();?>
    </body>
</html>

<?php
        function enviaremail(){
        if(isset($_POST["bt1"])){
                $de         = $_POST["de"];
                $para       = $_POST["para"];
                $assunto    = $_POST["assunto"];
                $mensagem   = $_POST["mensagem"];
                $header     = "MIME-Version: 1.0\r\n";
                $header     .= "from: <$de>";

                $success = mail($para, $assunto, $mensagem, $header);
                if ($success) {
                    echo "<div class='bg-success m-auto text-center w-75'><h3>email enviado com sucesso</h3></div>";
                }
                else {
                    echo "<div class='bg-danger m-auto text-center w-75'><h3>falha ao enviar email</h3></div><br>";
                }
            }
        }
?>