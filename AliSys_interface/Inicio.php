<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="jquery-1.12.1.min.js"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="imagens/madeira.jpg" bgproperties="fixed">
       <?php
        include 'cabeca.php';
        ?>
        
        <div class="container">
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
<div id="hora"></div>
            
            <h1 class="text-center">Bem Vindo!</h1>
            <?php
            include 'conectabanco.php';

            $busca = "select produto.*from produto where produto.quantidade<=0 ;";


            $resultado = mysqli_query($conexao, $busca);

            if (mysqli_num_rows($resultado) != 0) {
                $produto = mysqli_fetch_assoc($resultado);

                echo'<h2 class="text-center"><span><img src="imagens/warning.png" width="5%" ></span> Produtos em falta:</h2></br></br>
           
            <div class="col-md-offset-3 col-md-6">
                <table class="table table-condensed table-striped"  style="background-color:#DCDCDC;">';
                echo "<tr><th >Código</th><th class='col-md-4' > Descrição</th><th>Preço</th><th  >Ações</th> </tr>";
                while ($produto) {

                    echo "<tr><td>" . $produto['codigo'] . "</td><td>" . $produto['descricao'] . "</td><td>" . $produto['precovenda'] . "</td> " .
                    "</td><td class='col-md-6'> "
                    . "       <a class='btn btn-primary' href='ManterProduto/Manutencao/Exclusao/ExcluirProduto.php?codigo=" . $produto['codigo'] . "'><span class='glyphicon glyphicon-trash'></span>Excluir</a></td></tr>";
                    $produto = mysqli_fetch_assoc($resultado);
                }
                echo'</table></div>';
                mysqli_close($conexao);
            }
            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
            ?>
            
        </div>
    
</body>
</html>
