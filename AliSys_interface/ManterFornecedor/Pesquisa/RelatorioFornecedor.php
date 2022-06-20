<!DOCTYPE html>


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
        echo'<div class="container">';
        echo '<center><h3>Todos os Fornecedores </h3> </center><br>';


        include '../../ConectaBanco.php';

        $busca = "select * from fornecedor;";


        $resultado = mysqli_query($conexao, $busca);


        $fornecedor = mysqli_fetch_assoc($resultado);


        echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC'><tr style='font-weight:bolder' ><td>Codigo</td ><td > Nome Fantasia</td><td > CNPJ </td><td > Razão Social  </td> <td>Vendedor</td><td>E-mail Para Contato</td > <td>Cidade</td ><td>Rua </td> <td>Numero </td> <td> UF </td><td> Telefone </td>  </tr>";
        while ($fornecedor) {
            echo "<tr><td>" . $fornecedor['codigo'] . "</td><td>" . $fornecedor['nomefant'] . "</td><td>" . $fornecedor['cnpj'] . "</td><td>" . $fornecedor['razsocial'] . "</td><td>" . $fornecedor['vendedor'] . "</td><td>" . $fornecedor['email'] . "</td><td>" . $fornecedor['cidade'] . "</td><td>" . $fornecedor['rua'] . "</td><td>" . $fornecedor['numero'] . "</td><td>" . $fornecedor['uf'] . "</td><td>" . $fornecedor['telefone'] . "</td></tr>";
            $fornecedor = mysqli_fetch_assoc($resultado);
        }
        echo "</table></center>";
         echo'<a class="btn btn-default" href="ManterFornecedor.php">Voltar</a> </div> ';
        mysqli_close($conexao);
        
        ?>
       
    </body>
</html>
