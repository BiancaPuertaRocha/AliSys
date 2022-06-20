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



        <?php
        include '../../cabeca.php';
        ?>
        <div class="container">
            <h1 class="text-center">Manter Fornecedor</h1></br></br>
            <form class="form-horizontal" method="POST" action="ManterFornecedor.php"><!--qual ação vai ser executada quando enviar -->
                <div class="form-group">
                    <label for="pesquisafornecedor" class="col-md-2  control-label"></label>
                    <div class="col-md-6 col-md-offset-1">
                        <input type="text" name="pesquisafornecedor" class="form-control" id="pesquisacliente" placeholder="Pesquise por nome fantasia ou CNPJ">
                        <button type="submit" class="btn btn-default">Pesquisar <span class="glyphicon glyphicon-search"></span></button>
                        <a class="btn btn-default" href='../Cadastro/FormFornecedor.php' >Novo <span class="glyphicon glyphicon-plus"> </span></a>


                    </div>
                </div>
            </form>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">
                <?php
                if (isset($_POST['pesquisafornecedor'])) {

                    include '../../conectabanco.php';
                    $buscafornecedor = $_POST['pesquisafornecedor'];
                    $busca = "select * from fornecedor where nomefant like '%$buscafornecedor%' or cnpj like '%$buscafornecedor%';";
                    $resultado = mysqli_query($conexao, $busca);


                    $fornecedor = mysqli_fetch_assoc($resultado);

                    echo "<tr><th class='col-md-3'> Nome Fantasia</th><th class='col-md-2' > Vendedor </th><th  class='col-md-2'>E-mail</th> <th  class='col-md-2'>UF</th><th  class='col-md-2  text-center'>Ações</th></tr>";
                    while ($fornecedor) {
                        $busca2 = "select * from compra where fornecedor_codigo=" . $fornecedor['codigo'] . ";";
                        $resultado2 = mysqli_query($conexao, $busca2);

                        echo "<tr><td>" . $fornecedor['nomefant'] . "</td><td>" . $fornecedor['vendedor'] . "</td><td>" . $fornecedor['email'] . "</td><td>" . $fornecedor['uf'] .
                        "</td><td><a class='btn btn-primary' href='../Manutencao/Edicao/EditarFornecedor.php?codigo=" . $fornecedor['codigo'] . "'><span class='glyphicon glyphicon-pencil'></span>Editar</a>";
                        if (mysqli_num_rows($resultado2) == 0) {
                            echo "<a class='btn btn-primary' href='../Manutencao/Exclusao/ExcluirFornecedor.php?codigo=" . $fornecedor['codigo'] . "'><span class='glyphicon glyphicon-trash'></span>Excluir</a></td></tr>";
                        }
                        $fornecedor = mysqli_fetch_assoc($resultado);
                    }
                    mysqli_close($conexao);
                }
                ?>
            </table>
            <br>
        </div>  

    </body>
</html>


