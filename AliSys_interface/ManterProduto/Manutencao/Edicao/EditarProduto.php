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
        include '../../../cabeca.php';
        include '../../../ConectaBanco.php';
        $busca = "select * from produto where codigo=" . $_GET['codigo'] . ";";
        $resultado = mysqli_query($conexao, $busca);
        $produto = mysqli_fetch_assoc($resultado);
        $busca2 = "select * from unidade;";
        $resultado2 = mysqli_query($conexao, $busca2);
        $uni = mysqli_fetch_assoc($resultado2);
        echo '
        <div  class="container">
           <form class="form-horizontal" class="text-center" method="POST" action="EditarProdutoMesmo.php?codigo=' . $_GET['codigo'] . '"><!--qual ação vai ser executada quando enviar -->
                <h1 class="text-center"> Editar produto</h1></br></br>
                <div class="form-group">
                    <label for="descricao" class="col-md-2  control-label">Descricao</label>
                    <div class="col-md-4">
                        <input type="text" name="descricao" class="form-control" required value="' . $produto['descricao'] . '" id="descricao" maxlength="50" placeholder="">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="precovenda" class="col-md-2  control-label">Preço de Venda</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="precovenda" value="' . $produto['precovenda'] . '" required step="0.01" min="0" id="precovenda" >
                    </div>
                </div>';
        $que = $_SESSION['user'];
        $busca = "select * from usuario where cpf= $que;";
        $resultado = mysqli_query($conexao, $busca);
        $usuario = mysqli_fetch_assoc($resultado);
        if ($usuario['tipous'] == 'adm') {

            echo ' <div class="form-group">
                    <label for="quantidade" class="col-md-2  control-label">Quantidade</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="quantidade" value="' . $produto['quantidade'] . '" required step="0.01" min="0" id="quantidade" >
                    </div>
                </div>';
        }
        echo'<div class="form-group">
                    <label for="fabricante" class="col-md-2  control-label">Fabricante</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="' . $produto['fabricante'] . '"name="fabricante" required maxlength="20" id="fabricante" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="categoria_codigo" class="col-md-2  control-label">Categoria</label>
                    <div class="col-md-4">
                        <select class="form-control" name="categoria_codigo" id="uf">';

        include "./ConectaBanco.php";
        $busca3 = "select * from categoria;";
        $resultado3 = mysqli_query($conexao, $busca3);
        echo "<option value='null'>Selecione</option>";
        $cat = mysqli_fetch_assoc($resultado3);
        while (isset($cat['codigo'])) {
            $desc = $cat['descricao'];
            $cod = $cat['codigo'];
            echo "<option value='$cod'>$desc</option>";

            $cat = mysqli_fetch_assoc($resultado3);
        }
        mysqli_close($conexao);
                echo' </select>
                            </div>
                        </div>
                <div class="form-group">
                    <label for="cod_unidade" class="col-md-2  control-label">Unidade de venda</label>
                    <div class="col-md-4">
                        <select class="form-control" name="cod_unidade" id="uf">
                           ';
                echo '<option value="null">Selecione</option>';
                while (isset($uni['codigo'])) {
                    $desc_uni = $uni['descricao'];
                    $cod_uni = $uni['codigo'];
                    echo "<option value='$cod_uni'>$desc_uni</option>";
                    $uni = mysqli_fetch_assoc($resultado2);
                }
                mysqli_close($conexao);
                echo'</select>
                    </div>
               </div>';
        echo"<div class='form-group'>
                    <div class='col-md-offset-2 col-sm-4'>
                        <button type='submit' class='btn btn-success'>Confirmar</button>
                        <a class='btn btn-danger' href = '../../Pesquisa/ManterProduto.php' >Cancelar</a>
                    </div>
                </div>
            </form>
        </div>";
        ?>
    </body>
</html>
