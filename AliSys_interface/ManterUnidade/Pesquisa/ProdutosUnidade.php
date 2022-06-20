<html>
   <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../jquery-1.12.1.min.js"></script>
        <script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
      <body style='background-attachment:fixed;'  background="../../imagens/madeira.jpg" bgproperties="fixed">
          <div class="container">
        <?php
        include '../../cabeca.php';
        echo '<center><h3>Produtos vendidos a '.$_GET['descricao'].' </h3> </center><br>';                   
            include '../../conectabanco.php';           
            $busca = "select produto.*,categoria.descricao as catdesc, unidade.descricao as unidesc from produto  "
                    . "left join unidade on unidade.codigo=produto.cod_unidade "
                    . "left join categoria on categoria.codigo=produto.categoria_codigo "
                    . "where cod_unidade=". $_GET['codigo'].";";
                      
            $resultado = mysqli_query($conexao, $busca);            
            if(isset($resultado)){
            $produto = mysqli_fetch_assoc($resultado);          
            echo "<center><table class='table table-condensed table-striped' style='background-color:#DCDCDC'>"
            . "<tr style='font-weight:bolder' ><td>Código</th ><td > Descrição</th><th > Unidade </th><th>Categoria</th>"
                    . "<th >  Preço de venda </th> <th>Fabricante</th > <th>Estoque</th > </tr>";
            while ($produto) {
           
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
            $produto = mysqli_fetch_assoc($resultado);
        }}
            else {
                echo'<h2>Não há produtos cadastrados com a unidade </h2>';
            }
            echo "</table></center>";
            echo'<a class="btn btn-default" href="ManterUnidade.php">Voltar</a>';
            mysqli_close($conexao);
        ?>
          </div>
    </body>
</html>
