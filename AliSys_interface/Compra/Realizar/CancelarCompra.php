<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">
        <div class="container"><center>
                <?php
                include '../../ConectaBanco.php';
                session_start();
                if (isset($_SESSION['quantitens'])) {
                    $del1 = "DELETE FROM itemCompra where codigocompra=" . $_SESSION['compra'] . ";";
                    $vetorcodig = $_SESSION['codigos'];
                    $vetorquant = $_SESSION['quantidadecompra'];
                    
                    mysqli_query($conexao, $del1);

                    for ($x =1 ; $x < $_SESSION['quantitens']; $x++) {
                        $codigo = $vetorcodig[$x];
                        $quantidade = $vetorquant[$x];
                        $insert = "update produto set quantidade=quantidade-$quantidade where codigo=$codigo;";
                         
                        mysqli_query($conexao, $insert);
                    }
                }
                $del2 = "DELETE FROM compra where codigo=" . $_SESSION['compra'] . ";";
              
                mysqli_query($conexao, $del2);
                unset($_SESSION['quantidadecompra']);
                unset($_SESSION['totalcompra']);
                unset($_SESSION['codigos']);
                
                unset($_SESSION['compra']);
                unset($_SESSION['quantitens']);
                if (mysqli_error($conexao)) {
                    echo "<h2>Erro na conexão</h2>";
                   
                } else {
                     header("Refresh: 0.5; url=../../Inicio.php");
                }
                mysqli_close($conexao);
                ?>
            </center></div>
    </body>
</html>
