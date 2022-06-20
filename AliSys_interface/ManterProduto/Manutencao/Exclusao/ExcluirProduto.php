

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">
        <div  class="container">
            <?php
            include'../../../cabeca.php';
            echo '<center><h3>Deseja Mesmo Excluir Este Produto? </h3> </center><br>';
            include '../../../ConectaBanco.php';
            $busca = "select produto.*, unidade.descricao as unidesc, categoria.descricao as catdesc from produto "
                    . "left join unidade on unidade.codigo=produto.cod_unidade "
                    . "left join categoria on categoria.codigo=produto.categoria_codigo   "
                    . "where (produto.codigo=" . $_GET['codigo'] . ");";
            
            $resultado = mysqli_query($conexao, $busca);
            $produto = mysqli_fetch_assoc($resultado);
            echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC; '>"
            . "<tr style='font-weight:bolder' >"
            . "<th>Código</th ><th > Descrição</th><th > Unidade </th><th>Categoria</th><th >  Preço de venda </th> "
            . "<th>Fabricante</th > <th>Estoque</th > </tr> ";

            if (isset($produto['cod_unidade'])) {


                $uni = $produto['unidesc'];
            } else {
                $uni = "<div style='font-weight: bold;'>Não associado</div>";
            }
            if (isset($produto['categoria_codigo'])) {

                $cat = $produto['catdesc'];
            } else {
                $cat = "<div style='font-weight: bold;'>Não associado</div>";
            }
            echo "<tr><td>" . $produto['codigo'] . "</td><td>" . $produto['descricao'] . "</td><td>" . $uni . "</td>"
            . "<td>" . $produto['precovenda'] . "</td><td>" . $produto['fabricante'] . "</td><td>" .
            $cat . " </td><td>" . $produto['quantidade'] . "</td></tr>";
            $prod = $_GET['codigo'];
            echo "</table></center>";
            echo '<br> <br> <div class="col-md-offset-1 col-sm-4">
              <a  href="ExcluirProdutoMesmo.php?codigo=' . $produto['codigo'] . '" class="btn btn-success">Excluir</a>
              <a  href="../../Pesquisa/ManterProduto.php" class="btn btn-danger">Cancelar</a>
              
                    </div>';


            mysqli_close($conexao);
            ?>
        </div>

    </body>
</html>
