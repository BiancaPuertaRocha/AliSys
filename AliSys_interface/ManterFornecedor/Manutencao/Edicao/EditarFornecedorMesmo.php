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
    <center>
        <?php
           
        include '../../../ConectaBanco.php';
        $codigo = $_POST['codigo'];
        
        $comando = "UPDATE fornecedor SET nomefant='".$_POST["nomefant"]."', cnpj=".$_POST["cnpj"].", razsocial='"
                .$_POST["razsocial"]."', vendedor='".$_POST["vendedor"]."', email='".$_POST["email"]."', telefone='"
                .$_POST["telefone"]."', uf='".$_POST["uf"]."', cidade= '".$_POST["cidade"]."', rua='".$_POST["rua"]."', numero="
                .$_POST["numero"]."  WHERE codigo = $codigo ";
        
        
        mysqli_query($conexao, $comando);
        header ("refresh: 1, url='../../Pesquisa/ManterFornecedor.php'");
        
        
       
        ?>
        
        

            </center>
    </body>
</html>

        
 
