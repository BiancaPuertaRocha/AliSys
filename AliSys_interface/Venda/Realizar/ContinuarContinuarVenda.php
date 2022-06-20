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
          include '../../logo.php';
        ?>
        <br><br><br><br> 
        <div  class="container">
            
            <h1 class="text-center" >Venda</h1></br></br>
            <form class="form-horizontal text-center" method="POST" action="FinalizarVenda.php">
                <?php
                    echo'<div class="form-group">
                    <label class="col-md-2  control-label"></label>
                    <div class="col-md-3">
                        <h1>Total: '.$_SESSION['total'].' </h1>
                    </div>
                </div>';
                ?>
                <div class="form-group">
                    <label for="desconto" class="col-md-3  control-label">Desconto</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="desconto"  id="desconto" >
                    </div>
                </div>
                 <div class="form-group">
                    <label for="tipo_despesa" class="col-md-2  control-label">Desconto em: </label>

                    <div class="col-md-2">
                        <input type="radio"  value="Dinheiro" name="tipo_des" id="tipo_despesa"  placeholder="">Dinheiro

                    </div>
                    <div class="col-md-2">
                        <input type="radio"  value="Porcentagem" name="tipo_des" id="tipo_despesa"  placeholder="">Porcentagem

                    </div>


                </div>
                
               
                <div class="form-group">
                    <div class="col-md-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                        <a class='btn btn-danger'  href="CancelarVenda.php">Cancelar</a>
                    </div>
                </div>
 <br><br>
            </form>
        </div>
    </body>
</html>
