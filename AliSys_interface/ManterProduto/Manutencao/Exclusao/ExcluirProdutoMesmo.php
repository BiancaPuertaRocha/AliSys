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
        <?php
        session_start();
        include '../../../ConectaBanco.php';

        $comando = "Delete from produto where codigo=" . $_GET['codigo'] . ";";

        $i = mysqli_query($conexao, $comando);
        if (!$i) {
            $codigo = "delete from itemVenda where produto_codigo=" . $_GET['codigo'] . ";";
            $codigo2='delete from itemCompra  where produto_codigo=' . $_GET['codigo'] .' ; ';
            mysqli_query($conexao, $codigo);
            mysqli_query($conexao, $codigo2);
            $comando = "Delete from produto where codigo=" . $_GET['codigo'] . ";";

            $i = mysqli_query($conexao, $comando);
        }
        mysqli_close($conexao);
        header("Refresh: 1; url= ../../Pesquisa/ManterProduto.php");
        ?>
    </body>
</html>
