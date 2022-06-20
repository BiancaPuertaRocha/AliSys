<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">
        <div  class="container">

        <?php
        include'../../../cabeca.php';
        echo '<center><h3>Deseja Mesmo Excluir Esta unidade? </h3> </center><br>';

        include '../../../ConectaBanco.php';

        $busca = "select * from unidade where codigo=" . $_GET['codigo'] . ";";

        $resultado = mysqli_query($conexao, $busca);

        $produto = mysqli_fetch_assoc($resultado);
            
            echo "<center><table class='table table-condensed table-striped' ><tr style='font-weight:bolder' >"
        . "<td>Código</td ><td > Descrição</td></tr>";
          
                echo "<tr><td>" . $produto['codigo'] . "</td><td>". $produto['descricao']. "</td></tr>";
            
            echo "</table></center>";            
        
        echo '<br> <br> <div class="col-md-offset-1 col-sm-4">
              <a  href="ExcluirUnidadeMesmo.php?codigo='.$produto['codigo'].'" class="btn btn-success">Excluir</a>
              <a  href="../../Pesquisa/ManterUnidade.php" class="btn btn-danger">Cancelar</a>
              
                    </div>';
        
        
        mysqli_close($conexao);
        ?>
        </div>

    </body>
</html>