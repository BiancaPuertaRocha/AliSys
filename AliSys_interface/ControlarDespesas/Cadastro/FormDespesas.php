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
            <form class="form-horizontal" class="text-center" method="POST" action="CadastraDespesa.php"><!--qual ação vai ser executada quando enviar -->
                <h1 class="text-center"> Cadastrar Despesa</h1></br></br>
                <div class="form-group">
                    <label for="descricao" class="col-md-2  control-label">Descricao</label>
                    <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control" required  id="descricao" maxlength="45" placeholder="">
                    </div>
                    
                   
                </div>
                <div class="form-group">
                    <label for="valor" class="col-md-2  control-label">Valor</label>
                    <div class="col-md-2">
                        <input type="number" name="valor" class="form-control" required min="0" id="valor" maxlength="20" step="0.01" placeholder="">
                    </div>
                    
                   
                </div>
                <div class="form-group">
                    <label for="tipo_despesa" class="col-md-2  control-label">Unidade de Venda</label>

                    <div class="col-md-2">
                        <input type="radio"  value="Fixa" name="tipo_despesa" id="tipo_despesa"  placeholder="">Fixa

                    </div>
                    <div class="col-md-2">
                        <input type="radio"  value="Adicional" name="tipo_despesa" id="tipo_despesa" placeholder="">Adicional

                    </div>


                </div>
                <div class="form-group">
                    <label for="datapag" class="col-md-2  control-label">Data de Pagamento</label>
                    <div class="col-md-2">
                        <input type="date" name="datapag" class="form-control" required  id="datapag" placeholder="">
                    </div>
                    
                   
                </div>
                
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a class="btn btn-danger" href='../Pesquisa/ControlarDespesas.php'>Cancelar</a>

            </form>

        </div>




    </div>
</body>
</html>
