<!DOCTYPE html>


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
            <form class="form-horizontal" class="text-center" method="POST" action="CadastraCategoria.php"><!--qual ação vai ser executada quando enviar -->
                <h1 class="text-center"> Cadastrar Categoria</h1></br></br>
                <div class="form-group">
                    <label for="descricao" class="col-md-2  control-label">Descricao</label>
                    <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control" required  id="descricao" maxlength="50" placeholder="">
                    </div>


                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a class="btn btn-danger" href='../Pesquisa/ManterCategoria.php'>Cancelar</a>


            </form>
            <br><br>

        </div>




    </div>
</body>
</html>
