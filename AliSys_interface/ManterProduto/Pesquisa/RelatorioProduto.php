

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
        echo'<div class="container">';
        echo '<center><h3>Todos os Produtos </h3> </center><br>';
        include '../../ConectaBanco.php';
        $busca = "select produto.*, categoria.descricao as catdesc, unidade.descricao as unidesc from produto "
                . "left join categoria on produto.categoria_codigo=categoria.codigo "
                . "left join unidade on unidade.codigo=produto.cod_unidade;";
        $resultado = mysqli_query($conexao, $busca);
        $produto = mysqli_fetch_assoc($resultado);
        echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC'>"
        . "<tr style='font-weight:bolder' ><td>Código</td ><td > Descrição</td><td > Unidade </td><td >  Preço </td><td>Fabricante</td >"
        . "<td>Categoria </td> <td>Estoque</td > </tr>";
        while ($produto) {

            if (isset($produto['cod_unidade'])) {

                $uni = $produto['unidesc'];
            } else {
                $uni = "<div style='font-weight: bold;'>Não associado</div>";
            }
            if (isset($produto['categoria_codigo'])) {


                $cat = $produto['catdesc'];
            } else {
                $cat = "<div style='font-weight: bold;'>Não associado</div>";
            }
            echo "<tr><td>" . $produto['codigo'] . "</td><td>" . $produto['descricao'] . "</td>"
            . "<td>" . $uni . "</td><td>R$ " . $produto['precovenda'] . "</td>"
            . "<td>" . $produto['fabricante'] . "</td><td>" .
            $cat . " </td><td>" . $produto['quantidade'] . "</td></tr>";
            $produto = mysqli_fetch_assoc($resultado);
        }
        echo "</table></center>";
        mysqli_close($conexao);
        echo'<a class="btn btn-default" href="ManterProduto.php">Voltar</a> </div> ';
        ?>

    </body>
</html>
