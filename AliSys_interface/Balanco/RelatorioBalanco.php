<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../jquery-1.12.1.min.js"></script>
        <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body  style='background-attachment:fixed;' background="../imagens/madeira.jpg" bgproperties="fixed">

        <?php
        include '../logo.php';

        echo'<div class="container">';
        include '../ConectaBanco.php';
        if ($_POST['data1'] != '' && $_POST['data2'] != '') {
            echo '<center><h3>Relatório de balanco entre as datas ' . $_POST['data1'] . ' e ' . $_POST['data2'] . '</h3> </center><br>';
            $pesquisa1 = 'select produto_codigo,sum(itemVenda.quantidade) as total 
						   from itemVenda
                          inner join venda on itemVenda.codigovenda=venda.codigo
                          
                          where venda.datavenda between "' . $_POST['data1'] . '" and "' . $_POST['data2'] . '"
                          group by itemVenda.produto_codigo';
            $resultado1 = mysqli_query($conexao, $pesquisa1);
            $produto1 = mysqli_fetch_assoc($resultado1);
            $maior = $produto1['total'];
            $cod2 = $produto1['produto_codigo'];
            while ($produto1) {
                if ($produto1['total'] > $maior) {
                    $cod2 = $produto1['produto_codigo'];
                    $maior = $produto1['total'];
                }
                $produto1 = mysqli_fetch_assoc($resultado1);
            }

            $pesquisa2 = "select produto.descricao from produto where codigo=" . $cod2 . ";";
            $resultado2 = mysqli_query($conexao, $pesquisa2);

            $produto2 = mysqli_fetch_assoc($resultado2);
            echo '<h3>Produto mais vendido: ' . $produto2['descricao'] . ' </h3>';

            $pesquisa9 = 'select produto_codigo,sum(itemVenda.quantidade) as total 
						   from itemVenda
                          inner join venda on itemVenda.codigovenda=venda.codigo
                          
                          where venda.datavenda between "' . $_POST['data1'] . '" and "' . $_POST['data2'] . '"
                          group by itemVenda.produto_codigo';
            $resultado9 = mysqli_query($conexao, $pesquisa9);
            $produto9 = mysqli_fetch_assoc($resultado9);

            $menor = $produto9['total'];
            $cod1 = $produto9['produto_codigo'];
            while ($produto9) {
                if ($produto9['total'] < $menor) {
                    $menor = $produto9['total'];
                    $cod1 = $produto9['produto_codigo'];
                }
                $produto9 = mysqli_fetch_assoc($resultado9);
            }
            $pesquisa3 = "select produto.descricao from produto where codigo=" . $cod1 . ";";
            $resultado3 = mysqli_query($conexao, $pesquisa3);
            $produto3 = mysqli_fetch_assoc($resultado3);
            echo '<h3>Produto menos vendido: ' . $produto3['descricao'] . ' </h3>';

            $pesquisa4 = 'select sum(valorpago) as valor from venda where datavenda between "' . $_POST['data1'] . '" and "' . $_POST['data2'] . '";';
            $resultado4 = mysqli_query($conexao, $pesquisa4);
            $produto4 = mysqli_fetch_assoc($resultado4);
            echo '<h3>Valor total das vendas: R$ ' .number_format( $produto4['valor'], 2, "," , ".") . ' </h3>';

            $pesquisa5 = 'select sum(valortotal) as valor from compra where datapag between "' . $_POST['data1'] . '" and "' . $_POST['data2'] . '";';

            $resultado5 = mysqli_query($conexao, $pesquisa5);
            $produto5 = mysqli_fetch_assoc($resultado5);
            echo '<h3>Valor total das compras: R$ ' . number_format( $produto5['valor'], 2, "," , ".") . ' </h3>';

            $pesquisa6 = 'select sum(valor) as sumval  from despesa where  tipo_despesa="Fixa" and datapag between "' . $_POST['data1'] . '" and "' . $_POST['data2'] . '";';
            $resultado6 = mysqli_query($conexao, $pesquisa6);
            $produto6 = mysqli_fetch_assoc($resultado6);

            echo '<h3>Valor gasto em despesas fixas: R$ ' . number_format( $produto6['sumval'], 2, "," , ".") . '</h3>';

            $pesquisa7 = 'select sum(valor) as sumval  from despesa where tipo_despesa="Adicional"  and datapag  between "' . $_POST['data1'] . '" and "' . $_POST['data2'] . '" ;';
          
            $resultado7 = mysqli_query($conexao, $pesquisa7);
            
            $produto7 = mysqli_fetch_assoc($resultado7);
            echo '<h3>Valor gasto em despesas adicionais: R$ ' . number_format( $produto7['sumval'], 2, "," , ".") . '</h3>';
            $lucro = $produto4['valor'] - ($produto5['valor'] + $produto6['sumval'] + $produto7['sumval']);
            if ($lucro <= 0) {
                echo '<h3>Lucro (Considerando as compras, despesas fixas e adicionas): Não houve lucro!</h3>';
            } else {
                echo '<h3>Lucro (Considerando as compras, despesas fixas e adicionas): R$ ' . number_format( $lucro, 2, "," , ".") . ' </h3>';
            }
            echo'</center><a class="btn btn-default" href="Balanco.php">Voltar</a> </div> ';
        } else {
            echo"<center><h3>Pesquise por uma data.<h3></center>";
            header("Refresh: 2; url= Balanco.php");
        }
        mysqli_close($conexao);
        ?>

    </body>
</html>