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
        session_start();
        include '../../../ConectaBanco.php';
       $codigo=$_GET['codigo'];
       if (isset($_POST['quantidade'])) {
            $que = $_SESSION['user'];
            $busca = "select * from usuario where cpf= $que;";
            $resultado = mysqli_query($conexao, $busca);
            $usuario = mysqli_fetch_assoc($resultado);
            if ($usuario['tipous'] == 'adm') {
                $comando = "UPDATE produto SET descricao='".$_POST["descricao"].
                "', precovenda=".$_POST["precovenda"].", fabricante='".$_POST["fabricante"].
                "', categoria_codigo=".$_POST["categoria_codigo"].", cod_unidade=".$_POST["cod_unidade"].
                ", quantidade=".$_POST['quantidade']." WHERE codigo = $codigo ;"; 
               
            }
        }else{
        
        $comando = "UPDATE produto SET descricao='".$_POST["descricao"].
                "', precovenda=".$_POST["precovenda"].", fabricante='".$_POST["fabricante"].
                "', categoria_codigo=".$_POST["categoria_codigo"].", cod_unidade='".$_POST["cod_unidade"].
        "'  WHERE codigo = $codigo ;";}
      mysqli_query($conexao, $comando);
     
      echo '<div class="container"><h2> Alterado com sucesso</h2> </div> ';
     header ("refresh: 1, url='../../Pesquisa/ManterProduto.php'");
       
       mysqli_close($conexao);
       
        
        ?>

            </center>
    </body>
</html>

        