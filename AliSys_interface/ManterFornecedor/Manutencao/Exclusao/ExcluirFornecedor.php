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
        include '../../../ConectaBanco.php';
        include '../../../cabeca.php';
        echo '<center><div class="container"><h3>Deseja mesmo excluir este fornecedor? </h3> <br>';
        $busca = "select * from fornecedor "
                . "where codigo=" . $_GET['codigo'] . ";";
        $resultado = mysqli_query($conexao, $busca);
        $fornecedor = mysqli_fetch_assoc($resultado);
        echo "<center><table class='table table-condensed table-striped' ><tr style='font-weight:bolder' >"
        . "<td>Codigo</td ><td > Nome Fantasia</td><td > CNPJ </td><td > Razão Social  </td> <td>Vendedor</td>"
        . "<td>E-mail Para Contato</td > <td>Cidade</td ><td>Rua </td> <td>Numero </td> <td> UF </td><td> Telefone </td>  </tr>";

        echo "<tr><td>" . $fornecedor['codigo'] . "</td><td>" . $fornecedor['nomefant'] . "</td>"
        . "<td>" . $fornecedor['cnpj'] . "</td><td>" . $fornecedor['razsocial'] . "</td>"
        . "<td>" . $fornecedor['vendedor'] . "</td><td>" . $fornecedor['email'] . "</td>"
        . "<td>" . $fornecedor['cidade'] . "</td><td>" . $fornecedor['rua'] . "</td><td>" . $fornecedor['numero'] . "</td>"
        . "<td>" . $fornecedor['uf'] . "</td><td>" . $fornecedor['telefone'] . "</td></tr>";
        echo "</table></center>";
        echo '<div class="col-md-offset-2 col-sm-4">
              <a  href="ExcluirFornecedorMesmo.php?codigo=' . $fornecedor['codigo'] . '" class="btn btn-success">Excluir</a>
              <a  href="../../Pesquisa/ManterFornecedor.php" class="btn btn-danger">Cancelar</a>
                    </div</center></div>';
        mysqli_close($conexao);
        ?>
    </body>
</html>
