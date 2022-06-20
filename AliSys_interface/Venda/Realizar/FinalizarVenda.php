
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

                if (($_POST['desconto']) > 0) {
                    if (isset($_POST['tipo_des'])) {
                        if ($_POST['tipo_des'] == 'Porcentagem') {
                            $desconto = $_POST['desconto'];
                            $valorpago = $_SESSION['total'] - ($_SESSION['total'] * ($desconto / 100));
                        } else {
                            $desconto = $_POST['desconto'];
                            $valorpago = $_SESSION['total'] - $desconto;
                        }
                        $inclusao = "UPDATE venda set valorpago=$valorpago where codigo=" . $_SESSION['venda'] . ";";
                        mysqli_query($conexao, $inclusao);
                    } else {
                        echo"<h1>Escolha um tipo de desconto.</h1>";
                        header("Refresh: 0.5; url=ContinuarContinuarVenda.php");
                    }
                } else {
                    $valorpago = $_SESSION['total'];
                    $valorpago = $_SESSION['total'];
                    $inclusao = "UPDATE venda set valorpago=$valorpago where codigo=" . $_SESSION['venda'] . ";";

                    mysqli_query($conexao, $inclusao);
                }
                unset($_SESSION['venda']);
                unset($_SESSION['total']);
                unset($_SESSION['codigos']);
                unset($_SESSION['quantidades']);
                unset($_SESSION['item']);
                if (mysqli_error($conexao)) {
                    echo "<h2>Erro na conexão, não cadastrado</h2>";
                    header("Refresh: 0.5; url=../../Inicio.php");
                } else {
                    echo"<h1>Obrigada por comprar conosco. </h1>";
                    header("Refresh: 0.5; url=../../Inicio.php");
                }

                mysqli_close($conexao);
                ?>
            </center></div>
    </body>
</html>
