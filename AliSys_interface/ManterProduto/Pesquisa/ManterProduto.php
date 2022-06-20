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
            <h1 class="text-center">Manter Produto</h1></br></br>
            <form class="form-horizontal" method="POST" action="ManterProduto.php"><!--qual ação vai ser executada quando enviar -->
                <div class="form-group">
                    <label for="pesquisa" class="col-md-2  control-label"></label>
                    <div class="col-md-6 col-md-offset-1">
                        <input type="text" name="pesquisa" class="form-control" id="pesquisacliente" placeholder="Procure por descrição">
                        <button type="submit" class="btn btn-default">Pesquisar <span class="glyphicon glyphicon-search"></span></button>
                        <a class="btn btn-default" href='../Cadastro/FormProduto.php'>Novo <span class="glyphicon glyphicon-plus"> </span></a>

                    </div>
                </div>
            </form>
            <div class="col-md-offset-3 col-md-6">
                <table class="table table-condensed table-striped"  style="background-color:#DCDCDC; ">
                    <?php
                    if (isset($_POST['pesquisa'])) {

                        include '../../conectabanco.php';
                        $busca = $_POST['pesquisa'];
                        $busca = "select produto.*from produto where descricao like '%$busca%';";


                        $resultado = mysqli_query($conexao, $busca);
                        $produto = mysqli_fetch_assoc($resultado);

                        echo "<tr><th >Código</th><th class='col-md-4' > Descrição</th><th>Preço</th><th  >Ações</th> </tr>";
                        while ($produto) {

                            echo "<tr><td>" . $produto['codigo'] . "</td><td>" . $produto['descricao'] . "</td>"
                            . "<td>R$ " . $produto['precovenda'] . "</td> " .
                            "</td><td><a class='btn btn-primary' href='../Manutencao/Edicao/EditarProduto.php?codigo=" . $produto['codigo'] . "'>"
                            . "<span class='glyphicon glyphicon-pencil'></span>Editar</a>"
                            . "       <a class='btn btn-primary' href='../Manutencao/Exclusao/ExcluirProduto.php?codigo=" . $produto['codigo'] . "'>"
                            . "<span class='glyphicon glyphicon-trash'></span>Excluir</a></td></tr>";
                            $produto = mysqli_fetch_assoc($resultado);
                        }
                        mysqli_close($conexao);
                    }
                    ?>
                </table>
            </div>
             <br><br>
        </div>
    </body>
</html>
