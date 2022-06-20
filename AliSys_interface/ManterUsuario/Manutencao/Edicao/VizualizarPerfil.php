<!DOCTYPE html>


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
        include'../../../cabeca.php';
        ?>
        <div class="container" style="font-size:17px ">

            <?php
            include '../../../ConectaBanco.php';

            $busca = "select * from usuario where cpf=" . $_SESSION['user'] . ";";


            $resultado = mysqli_query($conexao, $busca);


            $produto = mysqli_fetch_assoc($resultado);
            echo '<center><h1>Perfil do usuário</h1><br> <h3> ' . $produto['nome'] . ' </h3> </center><br>';
            echo 'CPF:' . $produto['cpf'];
            echo '<br><br> RG:' . $produto['rg'];
            echo '<br><br> Data de Nascimento:' . $produto['datanasc'];
            echo '<br><br> Cidade:' . $produto['cidade'];
            echo '<br><br> Rua:' . $produto['rua'];
            echo '<br><br> Numero:' . $produto['numero'];
            echo '<br><br> UF:' . $produto['uf'];
            echo '<br><br> Email:' . $produto['email'];
            echo '<br><br> Telefone:' . $produto['telefone'];
            echo '<br><br> Estado Civil:' . $produto['estcivil'];
            echo '<a class="col-md-3 col-md-offset-9  btn btn-primary" href="EditarUsuario.php?cpf=' . $produto['cpf'] . '">Editar Informações</a>';




            mysqli_close($conexao);
            ?>

        </div>   
    </body>
</html>
