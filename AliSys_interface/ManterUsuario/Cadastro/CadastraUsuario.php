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
        <div class='container'><center>
        <?php
        include '../../ConectaBanco.php';
        
        session_start();    
        


        $cpfvalida = $_POST['cpf'];
        $valida = "select cpf from usuario where cpf = '$cpfvalida'";
        $resultado = mysqli_query($conexao, $valida);
        

        if (mysqli_num_rows($resultado) == 0) {
            if($_POST['senha']==$_POST['senha2']&&$_POST['numero']>0&&$_POST['cpf']>0){

            $nome = $_POST['nome'];
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];
            
            $datanasc = $_POST['datanasc'];
            $estcivil = $_POST['estcivil'];
            $rg = $_POST['rg'];
            $tipous = $_POST['tipous'];

            $inclusao = "insert into usuario (nome,uf,cidade,rua,numero,email,telefone,cpf, rg, estcivil, datanasc, senha, tipous) value ('$nome', '$uf', '$cidade','$rua', '$numero', '$email', '$telefone',$cpf, $rg,'$estcivil', '$datanasc', md5('$senha'), '$tipous');";
            mysqli_query($conexao, $inclusao);
            if (mysqli_error($conexao)) {
                echo "<h2>Erro na Inclusão, você esqueceu algo</h2>";
            } else {
                echo "<h2>Cadastrado com sucesso!<h2>";
            }} else {
    echo "<h2>Invalido!</h2>";
    header("Refresh: 1; url= ./ValidarCadastroUsuario.php");
            }
        } else {
            echo "<h2>Usuario já cadastrado</h2>";
        }
        if (isset($_SESSION['user'])) {
            header("Refresh: 1; url= ../Pesquisa/ManterUsuario.php");
        } else {
            header("Refresh: 1; url= ../../Login/Index.php");
        }


        mysqli_close($conexao);
       
        ?>
            </center> </div>
    </body>
    
</html>
