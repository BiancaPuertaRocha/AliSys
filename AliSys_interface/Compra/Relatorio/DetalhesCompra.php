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
        
        echo '<center><h3>Produtos Comprados, compra numero ' . $_GET['codigo'] . '</h3> </center><br>';
        
        include '../../ConectaBanco.php';
        
        $busca3="select * from compra where codigo=".$_GET['codigo'].";";
        $resultado3 = mysqli_query($conexao, $busca3);
        $produto3 = mysqli_fetch_assoc($resultado3);
        
        echo"<h3>Data da Compra: ".$produto3['datapag']."<h3>";
        echo"<h3>Valor Total: R$ ".$produto3['valortotal']."<h3>";
        $busca4="select * from fornecedor where codigo=".$produto3['fornecedor_codigo'].";";
        $resultado4 = mysqli_query($conexao, $busca4);
        $produto4 = mysqli_fetch_assoc($resultado4);
        
        echo"<h3>Fornecedor (Razão Social): ".$produto4['razsocial']."<h3>";
        echo"<h3>Fornecedor (Nome Fantasia): ".$produto4['nomefant']."<h3>";
        $busca2 = "select * from itemCompra where codigocompra=" . $_GET['codigo'] . ";";
        $resultado2 = mysqli_query($conexao, $busca2);
        $produto2 = mysqli_fetch_assoc($resultado2);
        
        echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC'>"
        . "<tr style='font-weight:bolder' ><td>Código</td ><td > Descrição</td><td > Unidade </td><td >  Preço de Compra </td><td>Fabricante</td >"
        . "<td>Categoria </td> <td>Quantidade Comprada</td > </tr>";
        while ($produto2) {
            $busca = "select produto.*, categoria.descricao as catdesc, unidade.descricao as unidesc from produto "
                    . "left join categoria on produto.categoria_codigo=categoria.codigo "
                    . "left join unidade on unidade.codigo=produto.cod_unidade where produto.codigo=" . $produto2['produto_codigo'] . ";";
          
            $resultado = mysqli_query($conexao, $busca);
            $produto = mysqli_fetch_assoc($resultado);

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
                . "<td>" . $uni . "</td><td>R$ " . $produto2['valor'] . "</td>"
                . "<td>" . $produto['fabricante'] . "</td><td>" .
                $cat . " </td><td>" . $produto2['quantidade'] . "</td></tr>";
                $produto = mysqli_fetch_assoc($resultado);
            }
            $produto2 = mysqli_fetch_assoc($resultado2);
        }
        echo "</table></center>";
        mysqli_close($conexao);
        echo'<a class="btn btn-default" href="GerarRelatorioCompras.php">Voltar</a> </div> ';
        ?>

    </body>
</html>