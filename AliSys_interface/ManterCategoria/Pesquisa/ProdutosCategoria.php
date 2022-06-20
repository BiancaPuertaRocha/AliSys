

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body style='background-attachment:fixed;'  background="../../imagens/madeira.jpg" bgproperties="fixed">

        <?php
         include '../../cabeca.php';
        ?>
        <div class="container">
            <?php
           
            echo '<center><h3>Produtos na categoria ' . $_GET['descricao'] . ' </h3> </center><br>';

            include '../../conectabanco.php';

            $busca = "select produto.*, categoria.descricao as catdesc, unidade.descricao as unidesc from produto "
                    . "inner join categoria on produto.categoria_codigo=categoria.codigo "
                    . "inner join unidade on produto.cod_unidade=unidade.codigo where categoria_codigo=" . $_GET['codigo'] . "; ";

            $resultado = mysqli_query($conexao, $busca);

            if (isset($resultado)) {
                $produto = mysqli_fetch_assoc($resultado);

                echo "<center><table class='table table-condensed table-striped'  style='background-color:#DCDCDC' ><tr style='font-weight:bolder' >"
                . "<td>Código</td ><td > Descrição</td><td > Unidade </td><td>Categoria</td> <td>  Preço </td> "
                . "<td>Fabricante</td > <td>Estoque</td > </tr>";
                while ($produto) {
                    echo "<tr><td>" . $produto['codigo'] . "</td><td>" . $produto['descricao'] . "</td><td>" . $produto['unidesc'] . "</td>"
                    . "<td>" . $produto['catdesc'] . "</td><td>" . $produto['precovenda'] . "</td>"
                    . "<td>" . $produto['fabricante'] . "</td><td>" . $produto['quantidade'] . "</td></tr>";
                    $produto = mysqli_fetch_assoc($resultado);
                }
            } else {
                echo'<h2>Não há produtos na categoria </h2>';
            }
            echo "</table></center>";
            echo'<a class="btn btn-default" href="ManterCategoria.php">Voltar</a>';
            mysqli_close($conexao);
            ?>
        </div>
    </body>
</html>
