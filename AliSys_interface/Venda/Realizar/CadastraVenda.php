
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
                if (!isset($_SESSION['venda'])) {



                    $busca = "select * from venda;";
                    $resultado = mysqli_query($conexao, $busca);
                    $produto = mysqli_fetch_assoc($resultado);

                    $_SESSION['venda'] = 1;
                    while ($produto) {
                        $_SESSION['venda'] ++;
                        $produto = mysqli_fetch_assoc($resultado);
                    }
                } else {
                    unset($_SESSION['venda']);
                    $busca = "select * from venda;";
                    $resultado = mysqli_query($conexao, $busca);
                    $produto = mysqli_fetch_assoc($resultado);
                    if (isset($produto)) {

                        $_SESSION['venda'] = 1;
                        while ($produto) {
                            $_SESSION['venda'] ++;
                            $produto = mysqli_fetch_assoc($resultado);
                        }
                    }
                }



                $codigo = $_SESSION['venda'];
                $usuario_codigo = $_POST['usuario_codigo'];
                $datavenda = $_POST['datavenda'];


                $inclusao = "insert into venda 
                             (codigo,usuario_codigo,datavenda)
                        value
                             ($codigo, $usuario_codigo, '$datavenda')";
  
                
                mysqli_query($conexao, $inclusao);
                if (mysqli_error($conexao)) {
                    echo "<h2>Erro na conexão, não cadastrado</h2>";
                    header("Refresh: 2; url=../../Inicio.php");
                } else {
                    header("Refresh: 0.5; url=ContinuarVenda.php");
                }



                mysqli_close($conexao);
                ?>
            </center></div>
    </body>
</html>
