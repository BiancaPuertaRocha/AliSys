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
        <div  class="container">
            <h1 class="text-center">Manter Unidade</h1></br></br>
            <form class="form-horizontal" method="POST" action="ManterUnidade.php"><!--qual ação vai ser executada quando enviar -->
                <div class="form-group">
                    <label for="pesquisa" class="col-md-2  control-label"></label>
                    <div class="col-md-6 col-md-offset-1">

                        <input type="text" name="pesquisa" class="form-control" id="pesquisacliente" placeholder="Pesquise por descrição">
                        <button type="submit" class="btn btn-default">Pesquisar <span class="glyphicon glyphicon-search"></span></button>
                        <a class="btn btn-default" href='../Cadastro/FormUnidade.php'>Novo <span class="glyphicon glyphicon-plus"> </span></a>

                    </div>
                </div>
            </form>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">
                <?php
                if (isset($_POST['pesquisa'])) {

                    include '../../ConectaBanco.php';
                    $buscauni = $_POST['pesquisa'];
                    $busca = "select * from unidade where descricao like '%$buscauni%';";
                    $resultado = mysqli_query($conexao, $busca);

                    $uni = mysqli_fetch_assoc($resultado);
                    echo "<tr><th class='col-md-1 '>Codigo</th ><th class='col-md-3'>Descrição</th><th class='col-md-3'>Opções</th></tr>";
                    while ($uni) {
                        $desc = $uni['descricao'];
                        echo "<tr><td>" . $uni['codigo'] . "</td><td>" . $uni['descricao'] . "</td>"
                        . "<td><a class='btn btn-default' href='ProdutosUnidade.php?codigo=" . $uni['codigo'] . "&descricao=$desc'> Ver produtos na unidade</a>"
                        . "<a class='btn btn-primary' href='../Manutencao/Editar/EditarUnidade.php?codigo=" . $uni['codigo'] . ">"
                        . "<span class='glyphicon glyphicon-pencil'></span>Editar</a> ";

                        $busca2 = "select * from produto where cod_unidade=" . $uni['codigo'] . ";";
                        $resultado2 = mysqli_query($conexao, $busca2);

                        if (mysqli_num_rows($resultado2) == 0) {
                            echo " <a class='btn btn-primary' href='../Manutencao/Exclusao/ExcluirUnidade.php?codigo=" . $uni['codigo'] . "'>"
                            . "<span class='glyphicon glyphicon-trash'></span>Excluir</a>";
                        }
                        "</td> "
                                . "</tr>";
                        $uni = mysqli_fetch_assoc($resultado);
                    }
                }
                mysqli_close($conexao);
                ?>
            </table>
        </div>  
    </body>
</html>

