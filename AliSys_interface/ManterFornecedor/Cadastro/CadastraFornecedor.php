
<html>
    <<head>
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
        $cnpjvalida = $_POST['cnpj'];
        $valida = "select cnpj from fornecedor where cnpj = '$cnpjvalida'";
        $resultado = mysqli_query($conexao, $valida);

        if (mysqli_num_rows($resultado) == 0) {

            $nomefant = $_POST['nomefant'];
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cnpj = $_POST['cnpj'];
            $vendedor=$_POST['vendedor'];
            $razsocial=$_POST['razsocial'];
            $inclusao = "insert into fornecedor
                             (nomefant,uf,cidade,rua,numero,email,telefone,cnpj,vendedor,razsocial)
                        value
                             ('$nomefant', '$uf', '$cidade','$rua', '$numero', '$email', '$telefone','$cnpj','$vendedor','$razsocial')";
            mysqli_query($conexao, $inclusao);
            if (mysqli_error($conexao)) {
                echo "<h2>Erro na conexão, não cadastrado</h2>";
            } else {
                echo "<h2>Cadastrado!</h2>";
            }
        } else {
            echo "<h2>Fornecedor já cadastrado</h2>";
        }


        mysqli_close($conexao);
        header("Refresh: 2; url= ../Pesquisa/ManterFornecedor.php");
        ?>
            </center></div>
    </body>
</html>

