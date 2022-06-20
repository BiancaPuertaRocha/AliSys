
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
                session_start();
                include '../../logo.php';
                include '../../ConectaBanco.php';
                if (!isset($_SESSION['compra'])) {

                    $busca = "select * from compra;";
                    $resultado = mysqli_query($conexao, $busca);
                    $produto = mysqli_fetch_assoc($resultado);
               
                        $_SESSION['compra'] = 1;
                        while ($produto) {
                            $_SESSION['compra'] ++;
                            $produto = mysqli_fetch_assoc($resultado);
                       }
                    
                    $codigo = $_SESSION['compra'];
                    $nnota = $_POST['nnota'];
                    $datapag = $_POST['datapag'];
                    $fornecedor = $_POST['fornecedor_codigo'];
                    

                    $inclusao = "insert into compra 
                             (codigo,fornecedor_codigo,datapag,nnota)
                        value
                             ($codigo, $fornecedor, '$datapag','$nnota')";

                    mysqli_query($conexao, $inclusao);

                   
                }
                if (mysqli_error($conexao)) {
                    echo "<h2>Erro na conexão, não cadastrado</h2>";
                    header("Refresh: 2; url=../../Inicio.php");
                } else {
                    header("Refresh: 0.5; url=ContinuarCompra.php");
                }
                mysqli_close($conexao);
                ?>
            </center></div>
    </body>
</html>
