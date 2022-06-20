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
        session_start();
        include '../../ConectaBanco.php';
         include '../../logo.php';
        $busca = "select * from usuario;";
        $resultado = mysqli_query($conexao, $busca);
        $produto = mysqli_fetch_assoc($resultado);
        ?>
        <br><br><br><br><br><br><br><br>
        <div  class="container">
            
            <h1 class="text-center" >Venda</h1></br></br>
            <form class="form-horizontal" method="POST" action="CadastraVenda.php">
                <div class="form-group">
                    <label for="usuario_codigo" class="col-md-2  control-label">Nome do Vendedor</label>
                    <div class="col-md-4">
                        <select class="form-control" name="usuario_codigo" id="uf">
                            <?php
                           
                            while (isset($produto['codigo'])) {
                                $nome = $produto['nome'];
                                $cod = $produto['codigo'];
                                echo "<option value='$cod'>$nome</option>";

                                $produto = mysqli_fetch_assoc($resultado);
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datavenda" class="col-md-2  control-label">Data da venda</label>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="datavenda" required id="vencimento" >
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                        <a class='btn btn-danger'  href="../../Inicio.php">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
 <br><br>

    </body>
</html>
