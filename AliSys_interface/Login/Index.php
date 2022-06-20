<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../jquery-1.12.1.min.js"></script>
        <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');"  style='background-attachment:fixed; ' background="../imagens/madeira.jpg" bgproperties="fixed">
    <center>
        <br><br><br><br>
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

            
           
            <?php
            if (isset($_SESSION['senha'])) {
                session_destroy();
            }
           
            include '../ConectaBanco.php';
            $busca = "select * from usuario where tipous='adm';";
            $resultado = mysqli_query($conexao, $busca);


            $usuario = mysqli_fetch_assoc($resultado);

            if (isset($usuario['cpf'])) {
                echo"<h1 class='text-center' >Bem Vindo ao Aliança System!</h1></br><br>
                     <img style='width:25%' src='/AliSys_interface/imagens/logo1.png' /><br> <br> <br>
                
            <form class='form-horizontal'method='POST' action='../Login/Logando.php'>
            
                <div class='form-group'>
                    <label for='cpf' class='col-md-4  control-label'>CPF</label>
                    <div class='col-md-4'>
                        <input type='number' name='cpf' class='form-control' required id='cpf' placeholder='Digite o CPF'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='cpf' class='col-md-4  control-label'>Senha</label>
                    <div class='col-md-4 '>
                        <input type='password' name='senha' class='form-control' required  id='senha' placeholder='Digite a senha'>
                    </div>
                </div>
                <div class='form-group'>
                  
                    <div class='col-md-8'>
                       <button class=' col-md-5 col-md-offset-7 btn btn-success' type='submit'>Acessar</button>
                    </div>
                </div>
                        
                    
                
            </form>";
            } else {
                echo '<h2>Bem Vindo ao Aliança System!</h2>';
                 echo"<img style='width:20%' src='/AliSys_interface/imagens/logo1.png' />";
                echo"<br> <br> <a class='btn btn-primary col-md-4 col-md-offset-4'href='../ManterUsuario/Cadastro/ValidarCadastroUsuario.php'>Clique para primeiro acesso!</a> <br> <br><br>";
            }

            mysqli_close($conexao);
            ?>
        </div>
    </center> 
    </body>
</html>
