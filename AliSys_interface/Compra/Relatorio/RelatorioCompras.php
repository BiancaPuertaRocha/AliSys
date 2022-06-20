<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body  style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">

        <?php
        include '../../logo.php';
        echo '<div class="container"><center>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">';
        if ($_GET['data1'] != '' && $_GET['data2'] != '') {
            echo '<h2>Relatorio de compras entre as datas ' . $_GET['data1'] . ' e ' . $_GET['data2'] . '<h2>';

            include '../../ConectaBanco.php';
            $busca1 = $_GET['data1'];
                    $busca2 = $_GET['data2'];

                   $busca = "select compra.*, fornecedor.razsocial from compra inner join fornecedor on fornecedor.codigo= compra.fornecedor_codigo"
                            . " where datapag BETWEEN '$busca1' and '$busca2';";


                    
                    $resultado = mysqli_query($conexao, $busca);

                    $compra = mysqli_fetch_assoc($resultado);
                    echo "<tr><th >Codigo</th ><th>Numero da Nota</th><th >Fornecedor</th>"
                    . "<th  > Valor </th><th  >Data</th></tr>";
                    while ($venda) {
                        echo "<tr><td>" . $compra['codigo'] . "</td><td>".$compra['nnota']."</td><td>" . $compra['nomefant'] . "</td><td>R$ " . $compra['valortotal'] . "</td><td>". $compra['datapag'] ."</td></tr>";
                        $venda = mysqli_fetch_assoc($resultado);
                    }
                    echo '</table>';
                    mysqli_close($conexao);
            echo'<a class="btn btn-default" href="GerarRelatorioVendas.php">Voltar</a>';
        } else {
            echo '<h2> Pesquise por uma data<h2>';
            header("Refresh: 2; url= GerarRelatorio.php");
        }
        echo '</center>
                </div>';
        ?>

    </body>
</html>
