<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src=".././/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">
        <div class="container"><center>
                <?php
                include '../../ConectaBanco.php';

                $descricao = $_POST['descricao'];
                $busca = "select * from unidade where descricao='$descricao';";
                $resultado = mysqli_query($conexao, $busca);


                if (mysqli_num_rows($resultado) == false) {


                    $inclusao = "insert into unidade
                             (descricao)
                        value
                             ('$descricao')";
                    mysqli_query($conexao, $inclusao);
                    if (mysqli_error($conexao)) {
                        echo "<h2>Erro na conexão.<h2>";
                    } else {
                        echo '<h2>Unidade cadastrada com sucesso.<h2>';
                    }
                } else {
                    echo "<h2>Unidade já cadastrada.<h2>";
                }



                mysqli_close($conexao);
                header("Refresh: 1; url= ../Pesquisa/ManterUnidade.php");
                ?>
            </center></div>
    </body>

</html>

