<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">
        <?php
        echo '<center><h2>Deseja mesmo excluir este usuário? </h2> </center><br>';
        include '../../../ConectaBanco.php';
        echo '<div class="container" style="font-size:18px; font-weight:bolder;">';
        $busca = "select * from usuario where cpf=" . $_GET['cpf'] . ";";
        $resultado = mysqli_query($conexao, $busca);
        $produto = mysqli_fetch_assoc($resultado);
        echo'Nome: ' . $produto['nome'];
        echo '<br> <br>CPF: ' . $produto['cpf'];
        echo '<br><br> RG: ' . $produto['rg'];
        echo '<br><br> Data de Nascimento: ' . $produto['datanasc'];
        echo '<br><br> Cidade: ' . $produto['cidade'];
        echo '<br><br> Rua: ' . $produto['rua'];
        echo '<br><br> Numero: ' . $produto['numero'];
        echo '<br><br> UF: ' . $produto['uf'];
        echo '<br><br> Email: ' . $produto['email'];
        echo '<br><br> Telefone: ' . $produto['telefone'];
        echo '<br><br> Estado Civil: ' . $produto['estcivil'] . '<br> <br>';
        echo '<div class="col-md-offset-2 col-sm-4">
              <a  href="ExcluirUsuarioMesmo.php?cpf=' . $produto['cpf'] . '" class="btn btn-success">Excluir</a>
              <a  href="../../Pesquisa/ManterUsuário.php" class="btn btn-danger">Cancelar</a>
                    </div>';
        echo '</div>';
        mysqli_close($conexao);
        ?>
    </body>
</html>
