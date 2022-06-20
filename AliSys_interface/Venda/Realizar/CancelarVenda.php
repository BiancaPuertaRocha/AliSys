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
                if (isset($_SESSION['item'])) {
                    $del1 = "DELETE FROM itemVenda where codigovenda=" . $_SESSION['venda'] . ";";
                    $vetorcodig = $_SESSION['codigos'];
                    $vetorquant = $_SESSION['quantidades'];
                    $quant = $_SESSION['item'];
                    mysqli_query($conexao, $del1);

                    for ($x = 0; $x <= $quant; $x++) {
                        $codigo = $vetorcodig[$x];
                        $quantidade = $vetorquant[$x];
                        $insert = "update produto set quantidade=quantidade+$vetorquant[$x] where codigo=$vetorcodig[$x];";
                        mysqli_query($conexao, $insert);
                    }
                }
                $del2 = "DELETE FROM venda where codigo=" . $_SESSION['venda'] . ";";
                
                mysqli_query($conexao, $del2);
                unset($_SESSION['venda']);
                unset($_SESSION['total']);
                unset($_SESSION['codigos']);
                unset($_SESSION['quantidades']);
                unset($_SESSION['item']);
                if (mysqli_error($conexao)) {
                    echo "<h2>Erro na conexão</h2>";
                    header("Refresh: 2; url=../../Inicio.php");
                } else {
                     header("Refresh: 0.5; url=../../Inicio.php");
                }
                mysqli_close($conexao);
                ?>
            </center></div>
    </body>
</html>
