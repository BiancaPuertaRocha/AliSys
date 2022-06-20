<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">
        <div class="container"><center>        
                <?php
                include '../../ConectaBanco.php';
                $descricao = $_POST['descricao'];
                $datapag = $_POST['datapag'];
                $valor = $_POST['valor'];
                $tipo_despesa = $_POST['tipo_despesa'];
                if ($valor > 0) {
                    $inclusao = "insert into despesa
                             (descricao, datapag, valor, tipo_despesa)
                        value
                             ('$descricao', '$datapag', $valor,'$tipo_despesa')";
                    mysqli_query($conexao, $inclusao);
                    if (mysqli_error($conexao)) {
                        echo "<h2>Erro na conexão, não cadastrado</h2>";
                    } else {
                        echo "<h2> Cadastrado!</h2>";
                    }
                    mysqli_close($conexao);
                    header("Refresh: 2; url= ../Pesquisa/ControlarDespesas.php");
                } else {
                    echo '<center><h2>Não foi possível executar a ação.</h2></center>';

                    mysqli_close($conexao);
                    header("Refresh: 2; url= ../Cadastro/FormDespesa.php");
                }
                ?>
            </center></div>
    </body>
</html>

