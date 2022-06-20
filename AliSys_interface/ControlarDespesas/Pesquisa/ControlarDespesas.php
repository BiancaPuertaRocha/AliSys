
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
            <h1 class="text-center">Controlar Despesas</h1></br></br>
            <form class="form-horizontal" method="POST" action="ControlarDespesas.php"><!--qual ação vai ser executada quando enviar -->
                <div class="form-group">
                    <label for="data1" class="col-md-2  control-label">Data 1 </label>
                    <div class="col-md-2">
                        <input type="date" name="data1" class="form-control" value="0" id="data1" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="data2" class="col-md-2  control-label">Data 2 </label>
                    <div class="col-md-2">
                        <input type="date" name="data2" class="form-control" value="0" id="data2" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-md-2  control-label"></label>
                    <div class="col-md-2">
                        <select  name="tipo" class="form-control" id="tipo" >
                            <option value='todas'>Todas</option>
                            <option value='adicional'>Adicional</option>
                            <option value='fixa'>Fixa</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-4 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Pesquisar <span class="glyphicon glyphicon-search"></span></button>
                        <a class='btn btn-default' href='../Cadastro/FormDespesas.php'><span class="glyphicon glyphicon-plus"> </span></a>   
                    </div>
                </div>

            </form>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">
                <?php
                if (isset($_POST['data1']) && isset($_POST['data2'])) {
                    $busca1 = $_POST['data1'];
                    $busca2 = $_POST['data2'];
                    if ($_POST['tipo'] == 'adicional') {
                        $busca = "select * from despesa where datapag BETWEEN '$busca1' and '$busca2' and tipo_despesa='adicional';";
                    } else
                    if ($_POST['tipo'] == 'fixa') {
                        $busca = "select * from despesa where datapag BETWEEN '$busca1' and '$busca2' and tipo_despesa='fixa';";
                    } else
                    if ($_POST['tipo'] == 'todas') {
                        $busca = "select * from despesa where datapag BETWEEN '$busca1' and '$busca2';";
                    }
                    include '../../ConectaBanco.php';


                    $resultado = mysqli_query($conexao, $busca);

                    $despesa = mysqli_fetch_assoc($resultado);
                    echo "<tr><th class='col-md-1 '>Codigo</th ><th class='col-md-3'>Descrição</th>"
                    . "<th  class='col-md-2'> Valor </th><th class='col-md-2' >Tipo de Despesa</th>"
                    . "<th  class='col-md-2'>Data de Pagamento</th> </tr>";
                    while ($despesa) {
                        echo "<tr><td>" . $despesa['codigo'] . "</td><td>" . $despesa['descricao'] . "</td><td>R$ " . $despesa['valor'] . "</td><td>" . $despesa['tipo_despesa'] . "</td><td>" . $despesa['datapag'] . "</td></tr>";
                        $despesa = mysqli_fetch_assoc($resultado);
                    }
                    mysqli_close($conexao);
                    echo"<a href='RelatorioDespesa.php?data1=$busca1&data2=$busca2&tipo=".$_POST['tipo']."' class='btn btn-primary'>Gerar Relatório <span class='glyphicon glyphicon-list-alt'></span></a>";
                }
                ?>
            </table>

        </div>  
    </body>
</html>


