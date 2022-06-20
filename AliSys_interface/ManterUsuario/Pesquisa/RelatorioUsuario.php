

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body style='background-attachment:fixed;' background="../../imagens/madeira.jpg" bgproperties="fixed">



        <?php
        include '../../logo.php';
        echo '<div  class="container">';
        echo '<center><h3>Todos os Usuários </h3> </center><br>';


        include '../../ConectaBanco.php';

        $busca = "select * from usuario;";


        $resultado = mysqli_query($conexao, $busca);


        $cliente = mysqli_fetch_assoc($resultado);


        echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC'><tr style='font-weight:bolder' ><td>Codigo</td ><td > Nome</td><td > Telefone </td><td >  CPF  </td> <td>E-mail</td><td>Estado Civil</td><td>UF</td > <td>Cidade</td ><td>Rua </td> <td>Numero </td><td>Tipo Usuario </td> </tr>";
        while ($cliente) {
            echo "<tr><td>" . $cliente['codigo'] . "</td><td>" . $cliente['nome'] . "</td><td>" . $cliente['telefone'] . "</td><td>" . $cliente['cpf'] . "</td><td>" . $cliente['email'] . "</td><td>" . $cliente['estcivil'] . " </td><td>" . $cliente['uf'] . "</td><td>" . $cliente['cidade'] . "</td><td>" . $cliente['rua'] . "</td><td>" . $cliente['numero'] . "</td><td>" . $cliente['tipous'] . " </td> </tr>";
            $cliente = mysqli_fetch_assoc($resultado);
        }
        echo "</table></center>";
        echo'<a class="btn btn-default" href="../Pesquisa/ManterUsuario.php">Voltar</a> </div>';
        mysqli_close($conexao);
        ?>

    </body>
</html>

