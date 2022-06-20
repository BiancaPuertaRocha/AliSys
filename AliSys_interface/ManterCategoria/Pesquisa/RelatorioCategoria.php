<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">

        

            <?php
            include '../../logo.php';
            echo'<div  class="container">';
            echo '<center><h3>Todas as Categorias </h3> </center><br>';


            include '../../conectabanco.php';

            $busca = "select * from categoria;";



            $resultado = mysqli_query($conexao, $busca);


            $produto = mysqli_fetch_assoc($resultado);
            $desc = $produto['descricao'];
            echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC'>"
            . "<tr style='font-weight:bolder'  ><td>Codigo</td><td>Descrição</td></tr>";
            while ($produto) {



                echo "<tr><td>" . $produto['codigo'] . "</td><td>" . $produto['descricao'] . "</td></tr>";



                $produto = mysqli_fetch_assoc($resultado);
            }
            echo "</table></center>";
            mysqli_close($conexao);
            echo'<a class="btn btn-default" href="ManterCategoria.php">Voltar</a>';
            ?>
        </div>   
    </body>
</html>