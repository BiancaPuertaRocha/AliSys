<?php
session_start();
$raiz = $_SERVER['DOCUMENT_ROOT'];
include $raiz . '/AliSys_interface/ConectaBanco.php';
if (isset($_SESSION['compra'])) {
    if (isset($_SESSION['itemcompra'])) {
        $del1 = "DELETE FROM itemCompra where codigocompra=" . $_SESSION['compra'] . ";";
        $vetorcodig = $_SESSION['codigos'];
        $vetorquant = $_SESSION['quantidadecompra'];
        $_SESSION['quantitens'] = $_SESSION['item'];
        mysqli_query($conexao, $del1);

        for ($x = 0; $x < $_SESSION['quantitens']; $x++) {
            $codigo = $vetorcodig[$x];
            $quantidade = $vetorquant[$x];
            $insert = "update produto set quantidade=quantidade-$quantidade where codigo=$codigo;";
            mysqli_query($conexao, $insert);
        }
    }
    $del2 = "DELETE FROM compra where codigo=" . $_SESSION['compra'] . ";";

    mysqli_query($conexao, $del2);
    unset($_SESSION['quantidadecompra']);
    unset($_SESSION['totalcompra']);
    unset($_SESSION['codigos']);

    unset($_SESSION['compra']);
    unset($_SESSION['quantitens']);
}
if (isset($_SESSION['venda'])) {

    $codigo = "delete from itemVenda where codigovenda=" . $_SESSION['venda'] . ";";
    $cod2 = "delete from venda where codigo=" . $_SESSION['venda'] . ";";
    mysqli_query($conexao, $codigo);
    mysqli_query($conexao, $cod2);
    if (isset($_SESSION['quantidades'])) {

        $vetorcodig = $_SESSION['codigos'];
        $vetorquant = $_SESSION['quantidades'];


        for ($x = 0; $x <= $_SESSION['item']; $x++) {
            $insert = "update produto set quantidade=quantidade+" . $vetorquant[$x] . " where codigo=" . $vetorcodig[$x] . ";";
            mysqli_query($conexao, $insert);
        }
        unset($_SESSION['codigos']);
        unset($_SESSION['quantidades']);
        unset($_SESSION['item']);
        unset($_SESSION['total']);
    }
    unset($_SESSION['venda']);
}
if (!$_SESSION['user']) {
    header("Location: /AliSys_interface/Login/Index.php");
}
?>
<div  class="container"  style='background-color: #9C9C9C '>

    <div class="col-lg-offset-5">
        
        <img  style="width: 25%" src="/AliSys_interface/imagens/logo1.png" />
    </div>
    <div class="row" >
 <script  type="text/javascript">
function exibeDataHora(div){

   /*
   *
   * Funcao para exibicao de data e hora
   * Angelito M. Goulart
   * <angelito@bsd.com.br>
   * 06/04/2011
   *
   * Uso: basta chama-la ao carregar a pagina
   * e passar a div onde sera exibida a data 
   * e hora como parametro.
   *
   */

   //cria um objeto do tipo date
   var data = new Date();
   
   // obtem o dia, mes e ano
   dia = data.getDate();
   mes = data.getMonth() + 1;
   ano = data.getFullYear();
   
   //obtem as horas, minutos e segundos
   horas = data.getHours();
   minutos = data.getMinutes();
   segundos = data.getSeconds();
   
   //converte as horas, minutos e segundos para string
   str_horas = new String(horas);
   str_minutos = new String(minutos);
   str_segundos = new String(segundos);
   
   //se tiver menos que 2 digitos, acrescenta o 0
   if (str_horas.length < 2)
      str_horas = 0 + str_horas;
   if (str_minutos.length < 2)
      str_minutos = 0 + str_minutos;
   if (str_segundos.length < 2)
      str_segundos = 0 + str_segundos;
   
   //converte o dia e o mes para string
   str_dia = new String(dia);
   str_mes = new String(mes);
   
   //se tiver menos que 2 digitos, acrescenta o 0
   if (str_dia.length < 2) 
      str_dia = 0 + str_dia;
   if (str_mes.length < 2) 
      str_mes = 0 + str_mes;
   
   //cria a string que sera exibida na div
   data = str_dia + '/' + str_mes + '/' + ano + ' - ' + str_horas + ':' + str_minutos + ':' + str_segundos;
   
   //exibe a string na div
   document.getElementById(div).innerHTML = data;
   
   //executa a funcao com intervalo de 1 segundo
   setTimeout("exibeDataHora('hora')", 1000);
   
}
</script>
<div  id="hora"></div>

        <nav class="navbar navbar-default ">
            <div  >
                <div class="navbar-header">
                    <a class="navbar-brand" href="/Alisys_interface/Inicio.php"> <span class="glyphicon glyphicon-home"></span></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registros <span class="glyphicon glyphicon-pencil"></span><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/AliSys_interface/ManterProduto/Pesquisa/ManterProduto.php">Produto</a></li>
                                <li><a href="/AliSys_interface/ManterFornecedor/Pesquisa/ManterFornecedor.php">Fornecedor</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="glyphicon glyphicon-list-alt"></span><span class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <li><a href="/AliSys_interface/ManterFornecedor/Pesquisa/RelatorioFornecedor.php">Fornecedor</a></li>
                                <li><a href="/AliSys_interface/ManterCategoria/Pesquisa/RelatorioCategoria.php">Categoria</a></li>

                                <li><a href="/AliSys_interface/ManterProduto/Pesquisa/RelatorioProduto.php">Estoque</a></li>
                                <?php
                                if ($_SESSION['tipous']) {

                                    echo '<li><a href="/AliSys_interface/ManterUsuario/Pesquisa/RelatorioUsuario.php">Usuários</a></li>';
                                }
                                ?>
                                <li><a href="/AliSys_interface/Balanco/Balanco.php">Balanço</a></li>
                                <li><a href="/AliSys_interface/Venda/Relatorio/GerarRelatorioVendas.php">Venda</a></li>
                                <li><a href="/AliSys_interface/Compra/Relatorio/GerarRelatorioCompras.php">Compra</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="/AliSys_interface/Venda/Realizar/FormVenda.php" aria-haspopup="true" aria-expanded="false">Venda<span class="glyphicon glyphicon-shopping-cart"></span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/AliSys_interface/Compra/Realizar/FormCompra.php" aria-haspopup="true" aria-expanded="false">Compra<span class="glyphicon glyphicon-shopping-cart"></span></a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configurações <span class="glyphicon glyphicon-cog"></span><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/AliSys_interface/ManterCategoria/Pesquisa/ManterCategoria.php">Categoria</a></li>
                                <li><a href="/AliSys_interface/ManterUnidade/Pesquisa/ManterUnidade.php">Unidade</a></li>
                                <?php
                                if ($_SESSION['tipous']) {
                                    echo ' <li><a href="/AliSys_interface/ManterUsuario/Pesquisa/ManterUsuario.php">Usuários</a></li>'
                                    . ' <li><a href="/AliSys_interface/ControlarDespesas/Pesquisa/ControlarDespesas.php">Despesas</a></li>';
                                }
                                ?>
                            </ul>
                        </li>

                        <?php
                        if (isset($_SESSION['user'])) {
                            $que = $_SESSION['user'];
                            $busca = "select * from usuario where cpf= $que;";
                            $resultado = mysqli_query($conexao, $busca);
                            $usuario = mysqli_fetch_assoc($resultado);
                            echo '

                                                <li class="dropdown">
                                                     <a  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                      ' . $usuario['nome'] . ' <span class="glyphicon glyphicon-user dropdown-toggle"></span><span class="caret"></span></a>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="/AliSys_interface/ManterUsuario/Manutencao/Edicao/VizualizarPerfil.php">Visualizar Perfil</a></li>
                                                        <li><a href="/AliSys_interface/ManterUsuario/Manutencao/Edicao/EditarUsuario.php?cpf=' . $_SESSION['user'] . '">Editar Perfil</a></li>
                                                        <li><a href="/AliSys_interface/Login/Logout.php">Sair</a></li>


                                                    </ul>
                                                </li>';
                        }
                        ?>

                    </ul>
                </div>


            </div>
        </nav>
    </div>
</div>
