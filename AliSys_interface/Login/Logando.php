<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../jquery-1.12.1.min.js"></script>
        <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body style='background-attachment:fixed;' background="../imagens/madeira.jpg" bgproperties="fixed">
    <center>
        
        <div class="container">
        <?php
       session_start();
       
       
        
        include '../ConectaBanco.php';
        if (isset($_POST['cpf']) && isset($_POST['senha'])) {
            $cpfvalida = $_POST['cpf'];
            $senha = $_POST['senha'];
            $valida = "select cpf, senha, tipous from usuario where cpf = $cpfvalida and senha = md5('$senha'); ";
            $resultado2 = mysqli_query($conexao, $valida);
            $resultado = mysqli_fetch_assoc($resultado2);
            
        if ($resultado['cpf'] == $cpfvalida && md5($senha) == $resultado['senha']) {
                $_SESSION["user"] = $_POST["cpf"];
               
                echo'<h2>  <img  style="width: 15%" src="/AliSys_interface/imagens/carregando.gif" /> Logando...</h2>';
               header("Refresh: 1; url= ../Inicio.php");
               if ($resultado['tipous']=='adm'){
                   $_SESSION['tipous']=true;
               }
               else{
                   $_SESSION['tipous']=false;
               }
                   
                
            } else {

                echo"<h2> CPF ou senha incorretos.</h2>";
                header("Refresh: 1; url= Index.php");
            }
        } else {
            echo '<h2>Você esqueceu de digitar algo<h2>';
           header("Refresh: 1; url= Index.php");
        }
        mysqli_close($conexao);
        ?>
        </div>
    </center>
    </body>
</html>
