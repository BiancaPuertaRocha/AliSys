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
        session_start();
        include '../../logo.php';
        include '../../ConectaBanco.php';
        ?>
        <br><br><br><br><br><br>
        <div  class="container">
            <h1 class="text-center" >Venda</h1></br></br>
            <div class="col-md-7">


                <form class="form-horizontal" method="POST" action="ContinuarVenda.php">


                    <div class="form-group">
                        <label for="produto_codigo" class="col-md-2  control-label">Codigo do Produto</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" value='null' name="produto_codigo" id="produto_codigo" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantidade" class="col-md-2  control-label">Quantidade</label>
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="quantidade" value="1" min="1" id="quantidade" >
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-offset-2 col-sm-4">
                            <button type="submit" class="btn btn-primary">Continuar</button>
                            <a href="CancelarVenda.php"  class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>


                </form>
                <br>
               
            
            </div>
            <?php
           
            if (isset($_POST["produto_codigo"])) {
                if ($_POST["produto_codigo"] != null) {



                    $buscacod = $_POST["produto_codigo"];
                    $busca = "select *from produto where codigo=$buscacod";
                    $resultado = mysqli_query($conexao, $busca);
                    $prod = mysqli_fetch_assoc($resultado);

                    if (isset($prod)) {
                        if (!isset($_SESSION['item'])) {
                            $_SESSION['item'] = 0;
                        } else {
                            $_SESSION['item'] ++;
                        }
                        if (isset($_SESSION['quantidades']) && isset($_SESSION['codigos'])) {
                            $vetorquant = $_SESSION['quantidades'];
                            $vetorcodig = $_SESSION['codigos'];
                        }
                        $inclusao = "insert into itemVenda (codigoitem,codigovenda,quantidade, produto_codigo,valor)values (" . $_SESSION['item'] . "," . $_SESSION['venda'] . "," . $_POST['quantidade'] . "," . $prod['codigo'] . "," . $prod['precovenda'] . "); ";

                        mysqli_query($conexao, $inclusao);
                        if ($prod['quantidade'] - $_POST['quantidade'] <= 0) {

                            echo'<h2 style="color: red">Atualize o estoque.</h2>';
                            $up = "update produto set quantidade=0 where codigo=" . $_POST['produto_codigo'] . ";";
                            mysqli_query($conexao, $up);
                        } else {
                            $up = "update produto set quantidade=( quantidade- " . $_POST['quantidade'] . ") where codigo=" . $_POST['produto_codigo'] . ";";

                            mysqli_query($conexao, $up);
                        }
                        $vetorquant[$_SESSION['item']] = $_POST['quantidade'];
                        $vetorcodig[$_SESSION['item']] = $_POST['produto_codigo'];

                        $_SESSION['quantidades'] = $vetorquant;
                        $_SESSION['codigos'] = $vetorcodig;
                    } else {
                        echo'<h2 style="color: red">Produto não cadastrado!</h2>';
                    }
                    $busca2 = "select itemVenda.*, produto.descricao as proddesc, produto.codigo as prodcod, produto.precovenda as precovenda from itemvenda inner join produto on produto.codigo=itemvenda.produto_codigo 
                inner join venda on venda.codigo=itemVenda.codigovenda where itemVenda.CodigoVenda=" . $_SESSION['venda'] . ";";

                    $resultado2 = mysqli_query($conexao, $busca2);
                    $item = mysqli_fetch_assoc($resultado2);

                    echo'<div class="col-md-5">'
                    . ' <table class="table table-condensed table-striped"  >'
                    . '<tr ><th>Produto</th><th>Quantidade</th><th>Preço Unitário</th><th>Subtotal</th></tr>';
                    $_SESSION['total'] = 0;
                    while ($item) {
                        $sub = $item['quantidade'] * $item['precovenda'];
                        echo'<tr><td>' . $item['proddesc'] . '</td><td>' . $item['quantidade'] . '</td><td>' . $item['precovenda'] . '</td><td>' . $sub . '</td></tr>';
                        $item = mysqli_fetch_assoc($resultado2);

                        $_SESSION['total'] = $_SESSION['total'] + $sub;
                    }
                    echo"
                    <tr style='background-color: white'><td >TOTAL:" . $_SESSION['total'] . " </td></tr>
                </table>
                
            </div>";
                   
                } else {
                    '<h2 style="color: red">Insira o codigo do produto!</h2>';

                    $busca2 = "select itemVenda.*, produto.descricao as proddesc, produto.codigo as prodcod, produto.precovenda as precovenda from itemvenda inner join produto on produto.codigo=itemvenda.produto_codigo 
                inner join venda on venda.codigo=itemVenda.codigovenda where itemVenda.CodigoVenda=" . $_SESSION['venda'] . ";";

                    $resultado2 = mysqli_query($conexao, $busca2);

                    $item = mysqli_fetch_assoc($resultado2);
                    if (mysqli_num_rows($resultado2) != 0) {
                        echo'<div class="col-md-5">'
                        . ' <table class="table table-condensed table-striped"  >'
                        . '<tr ><th>Produto</th><th>Quantidade</th><th>Preço Unitário</th><th>Subtotal</th></tr>';

                        while ($item) {
                            $sub = $item['quantidade'] * $item['precovenda'];
                            echo'<tr><td>' . $item['proddesc'] . '</td><td>' . $item['quantidade'] . '</td><td>' . $item['precovenda'] . '</td><td>' . $sub . '</td></tr>';
                            $item = mysqli_fetch_assoc($resultado2);
                        }
                        echo"
                    <tr style='background-color: white'><td>TOTAL:" . $_SESSION['total'] . " </td></tr>
                </table>";
                    }
                }
                
                 if(isset($_SESSION['total'])&& $_SESSION['total']!=0){
                     echo '<div class=col-md-7>';
                        echo'<a class="col-md-5 btn btn-success" href="ContinuarContinuarVenda.php">Finalizar</a></div>';
                        
                    }
                    
            }
            mysqli_close($conexao);
            ?>

        </div>

        <br><br>


    </body>
</html>
