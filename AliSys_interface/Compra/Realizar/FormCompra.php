<!DOCTYPE html>
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
        include '../../ConectaBanco.php';
        ?>
        <div  class="container">
            <h1 class="text-center"  >Compra</h1></br></br>
            <div class="col-md-9">
                <form class="form-horizontal   " method="POST" action="CadastraCompra.php">
                    <div class="form-group">
                        <label for="fornecedor_codigo" class="col-md-2  control-label">Fornecedor</label>
                        <div class="col-md-5">
                            <select  class="form-control" name="fornecedor_codigo"  id="fornecedor_codigo" >
                                <?php
                                $busca = "select * from fornecedor;";
                                $resultado = mysqli_query($conexao, $busca);
                                $produto = mysqli_fetch_assoc($resultado);
                                while ($produto) {
                                    echo '<option value=' . $produto['codigo'] . '>' . $produto['nomefant'] . '</option>';
                                    $produto = mysqli_fetch_assoc($resultado);
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="datapag" class="col-md-2  control-label">Data de Pagamento</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="datapag" required id="datapag" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnota" class="col-md-2  control-label">Numero da Nota</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="nnota" maxlength="50" min="0" required id="nnota" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-4">
                            <button type="submit" class="btn btn-success">Continuar</button>
                            <a class="btn btn-danger" href="../../Inicio.php">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>  
    </body>
</html>
