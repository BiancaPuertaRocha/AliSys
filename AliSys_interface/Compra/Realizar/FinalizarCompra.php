
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../.+./bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">
        <div class="container"><center>
                <?php
                include '../../ConectaBanco.php';
                include '../../logo.php';
                session_start();
                $valorpago = $_SESSION['totalcompra'];
                $inclusao = "UPDATE compra set valortotal=$valorpago where codigo=" . $_SESSION['compra'] . ";";
                mysqli_query($conexao, $inclusao);
                unset($_SESSION['quantidadecompra']);
                unset($_SESSION['totalcompra']);
                unset($_SESSION['codigos']);
                unset($_SESSION['quantitens']);
                unset($_SESSION['compra']);
                if (mysqli_error($conexao)) {
                    echo "<h2>Erro na conexão</h2>";
                    header("Refresh: 2; url=../../Inicio.php");
                } else {
                    echo"<h1>Compra Registrada! </h1>";
                    header("Refresh: 0.5; url=../../Inicio.php");
                }
                mysqli_close($conexao);
                ?>
            </center></div>
    </body>
</html>
