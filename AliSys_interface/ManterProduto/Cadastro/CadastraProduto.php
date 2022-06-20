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

        <div class="container"><center>

        <?php
        include '../../ConectaBanco.php';


        $descricao = $_POST['descricao'];
        $precovenda = $_POST['precovenda'];
        
        $unidade = $_POST['cod_unidade'];
        $fabricante = $_POST['fabricante'];
        $codigo = $_POST['codigo'];
       
        $categoria = $_POST['categoria_codigo'];
        if($precovenda>0){
        if (isset($_POST['quantidade'])){
            
         $quantidade = $_POST['quantidade'];


        $inclusao = "insert into produto 
                             (descricao, precovenda, cod_unidade,fabricante,codigo, quantidade,categoria_codigo)
                        value
                             ('$descricao', $precovenda, $unidade, '$fabricante', $codigo, $quantidade, $categoria)";


        }
        else {
            
        $inclusao = "insert into produto 
                             (descricao, precovenda, cod_unidade,fabricante,codigo,categoria_codigo)
                        value
                             ('$descricao', $precovenda, $unidade, '$fabricante', $codigo, $categoria)";
        }
        mysqli_query($conexao, $inclusao);
        if (mysqli_error($conexao)) {
            echo "<h2>Erro na Inclusão. </2>";
        } else {
            echo "<h2>Cadastrado com sucesso!</h2>";
        }

        mysqli_close($conexao);
        header("Refresh: 2; url= ../Pesquisa/ManterProduto.php");
        } else {
            echo '<center><h2>Digite um preço de venda valido.</h2></center>';
            
            mysqli_close($conexao);
            header("Refresh: 2; url= ../Cadastro/FormProduto.php");
        }
        ?>
            </center></div>
    </body>
</html>
