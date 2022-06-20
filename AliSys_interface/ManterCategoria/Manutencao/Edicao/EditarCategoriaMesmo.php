<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body  style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">
    <center>
        <?php
           
        include '../../../ConectaBanco.php';
        $codigo = $_POST['codigo'];
        
        $comando = "UPDATE categoria SET descricao='".$_POST["descricao"]."'  WHERE codigo = $codigo ";
              
        mysqli_query($conexao, $comando);
        header ("refresh: 1, url='../../Pesquisa/ManterCategoria.php'");
                
        ?>
        
            </center>
    </body>
</html>

        
 
