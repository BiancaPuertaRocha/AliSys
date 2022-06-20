<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;'background="../../imagens/madeira.jpg" bgproperties="fixed">
        <?php      
        include '../../ConectaBanco.php';                   
        echo'<div class="container">';
        $busca = "select * from usuario where tipous='adm';";
        $resultado = mysqli_query($conexao, $busca);
        $usuario = mysqli_fetch_assoc($resultado);
        if (isset($usuario)) {
            include '../../cabeca.php';
            if (isset($_SESSION['user'])) {                
                if ($usuario['cpf'] == $_SESSION['user']) {                    
                    include './FormUsuario.php';                    
                } else {
                    echo'<h1>Você não esta autorizado!</h1>';
                }
            } else {
                echo'<a href="../Login/Index.php"> Clique aqui para logar</a>';
            }
        } else {
            include './FormUsuario.php';
        }
        echo '</div>';
        mysqli_close($conexao);
        ?>
</body>
</html>
