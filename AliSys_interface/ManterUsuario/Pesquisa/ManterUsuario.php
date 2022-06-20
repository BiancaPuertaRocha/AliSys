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
            <h1 class="text-center">Manter Usuario</h1></br></br>
            <form class="form-horizontal" method="POST" action="ManterUsuario.php"><!--qual ação vai ser executada quando enviar -->
                <div class="form-group">
                    <label for="pesquisacliente" class="col-md-2  control-label"></label>
                    <div class="col-md-6 col-md-offset-1">
                        <input type="text" name="pesquisacliente" class="form-control" id="pesquisacliente" placeholder="Pesquise por nome ou CPF">
                        <button type="submit" class="btn btn-default">Pesquisar <span class="glyphicon glyphicon-search"></span></button>
                        <a class="btn btn-default"  href="../Cadastro/ValidarCadastroUsuario.php" >Novo <span class="glyphicon glyphicon-plus"> </span></a>


                    </div>
                </div>
            </form>
            <table class="table table-condensed table-striped" style="background-color:#DCDCDC">
                <?php
                if (isset($_POST['pesquisacliente'])) {

                    include '../../ConectaBanco.php';
                    $buscacliente = $_POST['pesquisacliente'];
                    $busca = "select * from usuario where nome like '%$buscacliente%' and tipous!='adm' or cpf like '%$buscacliente%' and tipous='comum';";
                    $resultado = mysqli_query($conexao, $busca);


                    $cliente = mysqli_fetch_assoc($resultado);
                    echo "<tr><th class='col-md-1 '>Codigo</th ><th class='col-md-3'> Nome</th><th  class='col-md-2'> Telefone </th><th class='col-md-2' >CPF</th><th  class='col-md-2'>E-mail</th> <th  class='col-md-2  text-center'>Ações</th></tr>";
                    while ($cliente) {
                        echo "<tr><td>" . $cliente['codigo'] . "</td><td>" . $cliente['nome'] . "</td><td>" . $cliente['telefone'] . "</td><td>" . $cliente['cpf'] . "</td><td>" . $cliente['email'];
                        echo"</td><td><a class='btn btn-primary' href='../Manutencao/Edicao/EditarUsuario.php?cpf=" . $cliente['cpf'] . "'><span class='glyphicon glyphicon-pencil'></span>Editar</a>";
                        $pesq = "select * from venda where usuario_codigo=" . $cliente['codigo'];
                  
                        $resultado2 = mysqli_query($conexao, $pesq);
                        if (!isset($resultado2)) {
                            
                            echo " <a class='btn btn-primary' href='../Manutencao/Exclusao/ExcluirUsuario.php?cpf=" . $cliente['cpf'] . "'><span class='glyphicon glyphicon-trash'></span>Excluir</a></td></tr>";
                        }
                        
                        $cliente = mysqli_fetch_assoc($resultado);
                    }


                    mysqli_close($conexao);
                }
                ?>
            </table>
        </div>  
    </body>
</html>


