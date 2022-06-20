
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body  onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">



        <?php
        include '../../../cabeca.php';
        include '../../../ConectaBanco.php';

        $codigo=$_GET['codigo'];
        $busca = "select * from unidade where codigo='$codigo';";


        $resultado = mysqli_query($conexao, $busca);


        $uni = mysqli_fetch_assoc($resultado);

        echo '
        <div  class="container">
            <h1 class="text-center" >Editar Unidade</h1></br></br>
            
            <form class="form-horizontal" method="POST" action="EditarUnidadeMesmo.php">
            <input type="hidden" name="codigo" value="'.$uni['codigo'].'">
                <div class="form-group">
                    <label for="descricao" class="col-md-2  control-label" >Descrição</label>
                    <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control"  value="'.$uni['descricao'].'" id="descricao" maxlength="50" placeholder="">
                    </div>
                </div>

                

                <div class="form-group">
                    <div class="col-md-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-success" >Confirmar</button>
                        <a class="btn btn-danger" href="../../Pesquisa/ManterUnidade.php">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>';
                ?>
    </body>
</html>

