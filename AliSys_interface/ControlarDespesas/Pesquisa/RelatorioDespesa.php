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

    <body style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">

        <?php
        include '../../logo.php';
        echo '<div class="container"><center>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">';
        if ($_GET['data1'] != '' && $_GET['data2'] != '') {
            echo '<h2>Relatorio de despesas entre as datas ' . $_GET['data1'] . ' e ' . $_GET['data2'] . '<h2>';

            include '../../ConectaBanco.php';
            $busca1 = $_GET['data1'];
            $busca2 = $_GET['data2'];
            if ($_GET['tipo'] == 'adicional') {
                $busca = "select * from despesa where datapag BETWEEN '$busca1' and '$busca2' and tipo_despesa='adicional';";
            } else
            if ($_GET['tipo'] == 'fixa') {
                $busca = "select * from despesa where datapag BETWEEN '$busca1' and '$busca2' and tipo_despesa='fixa';";
            } else
            if ($_GET['tipo'] == 'todas') {
                $busca = "select * from despesa where datapag BETWEEN '$busca1' and '$busca2';";
            }
            $resultado = mysqli_query($conexao, $busca);

            $despesa = mysqli_fetch_assoc($resultado);
            echo "<tr><th class='col-md-1 '>Codigo</th ><th class='col-md-3'>Descrição</th><th  class='col-md-2'> Valor </th><th class='col-md-2' >Tipo de Despesa</th><th  class='col-md-2'>Data de Pagamento</th> </tr>";
            while ($despesa) {
                echo "<tr><td>" . $despesa['codigo'] . "</td><td>" . $despesa['descricao'] . "</td><td>R$" . $despesa['valor'] . "</td><td>" . $despesa['tipo_despesa'] . "</td><td>" . $despesa['datapag'] . "</tr>";
                $despesa = mysqli_fetch_assoc($resultado);
            }
            echo '</table>';

            mysqli_close($conexao);
            echo'<a class="btn btn-default" href="../Pesquisa/ControlarDespesas.php">Voltar</a>';
        } else {
            echo '<h2> Pesquise por uma data<h2>';
            header("Refresh: 2; url= ../Pesquisa/ControlarDespesas.php");
        }
        echo '</center>
                </div>';
        ?>

    </body>
</html>
