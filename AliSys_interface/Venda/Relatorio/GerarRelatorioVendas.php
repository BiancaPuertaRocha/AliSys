
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">

        <?php
        include '../../cabeca.php';
        ?>
        <div class="container">
            <h1 class="text-center">Gerar Relatório de Vendas</h1></br></br>
            <form class="form-horizontal" method="POST" action="GerarRelatorioVendas.php"><!--qual ação vai ser executada quando enviar -->
                <div class="form-group">
                    <label for="data1" class="col-md-2  control-label"></label>
                    <div class="col-md-2">
                        <input type="date" name="data1" class="form-control" value="0" id="data1" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="data2" class="col-md-2  control-label"></label>
                    <div class="col-md-2">
                        <input type="date" name="data2" class="form-control" value="0" id="data2" placeholder="">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-md-4 col-md-offset-2">
                        <button type="submit" class="btn btn-default">Pesquisar <span class="glyphicon glyphicon-search"></span></button>

                    </div>
                </div>

            </form>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">
                <?php
                if (isset($_POST['data1']) && isset($_POST['data2'])) {
                    $busca1 = $_POST['data1'];
                    $busca2 = $_POST['data2'];

                    $busca = "select venda.*, usuario.nome as username from venda inner join usuario on usuario.codigo= venda.usuario_codigo"
                            . " where datavenda BETWEEN '$busca1' and '$busca2';";

                    include '../../ConectaBanco.php';


                    $resultado = mysqli_query($conexao, $busca);

                    $venda = mysqli_fetch_assoc($resultado);
                    echo "<tr><th >Codigo</th ><th >Usuário </th>"
                    . "<th  > Valor </th><th  >Data</th><th  >Opções</th></tr>";
                    while ($venda) {
                        echo "<tr><td>" . $venda['codigo'] . "</td><td>" . $venda['username'] . "</td><td>R$ " . $venda['valorpago'] . "</td>"
                        . "<td>" . $venda['datavenda'] . "</td><td><a class='btn btn-default' href='DetalhesVenda.php?codigo=" . $venda['codigo'] . "'>Detalhes</td></tr>";
                        $venda = mysqli_fetch_assoc($resultado);
                    }
                    mysqli_close($conexao);
                    echo"<a href='RelatorioVendas.php?data1=$busca1&data2=$busca2' class='btn btn-primary'>Gerar Relatório "
                    . "<span class='glyphicon glyphicon-list-alt'></span></a>";
                }
                ?>
            </table>

        </div>  
    </body>
</html>


