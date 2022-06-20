<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../jquery-1.12.1.min.js"></script>
        <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
     <body style='background-attachment:fixed;' background="../imagens/madeira.jpg" bgproperties="fixed">
        
        <?php
        session_start();


        session_destroy();
        header("Refresh: 2; url= Index.php");
        ?>
         <div class="container"><center>
                  
                 <h2><img  style="width: 10%" src="/AliSys_interface/imagens/carregando.gif" /> Saindo...</h2></center>
         </div>
    </body>
</html>
