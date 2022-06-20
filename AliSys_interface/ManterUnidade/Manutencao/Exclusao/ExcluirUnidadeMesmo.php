<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
     <body style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">
        <?php
        session_start();
         include '../../../ConectaBanco.php';
         $comando = "Delete from unidade where codigo=".$_GET['codigo'].";";
         mysqli_query($conexao, $comando);
          mysqli_close($conexao);
        header("Refresh: 2; url= ../../Pesquisa/ManterUnidade.php");
        
        ?>
    </body>
</html>