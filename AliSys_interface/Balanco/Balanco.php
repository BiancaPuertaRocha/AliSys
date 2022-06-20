
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../jquery-1.12.1.min.js"></script>
        <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../imagens/madeira.jpg" bgproperties="fixed">

        <?php
        include '../cabeca.php';
        ?>
        <div class="container">
            <h1 class="text-center">Gerar Relatório de Balanço</h1></br></br>
            <form class="form-horizontal" method="POST" action="RelatorioBalanco.php"><!--qual ação vai ser executada quando enviar -->
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
                        <button type="submit" class="btn btn-success">Gerar Relatório<span class="glyphicon glyphicon-copy"></span></button>

                    </div>
                </div>

            </form>
        </div>  
    </body>
</html>