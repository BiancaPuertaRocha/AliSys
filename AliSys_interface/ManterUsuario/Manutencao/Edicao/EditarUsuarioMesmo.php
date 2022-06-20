<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>
    <body style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">

        <div class="container">


            <?php
            session_start();
            include '../../../ConectaBanco.php';
            $comando2 = 'select * from usuario where cpf=' . $_POST['cpf'] . ';';
            $resultado2 = mysqli_query($conexao, $comando2);

            $produto = mysqli_fetch_assoc($resultado2);
            $senha=$_POST["senhaant"];
            
            
            if ($produto['senha'] == md5("$senha")&&$_POST['cpf']>0&&$_POST['numero']>0) {

                $codigo = $_POST['codigo'];

                $comando = "UPDATE usuario SET "
                        . "nome = '" . $_POST['nome'] . "', rg='" . $_POST['rg'] . "', estcivil='" . $_POST['estcivil'] . "',senha=md5('" . $_POST['senha'] . "'), uf='" . $_POST['uf'] . "', cidade='" . $_POST['cidade'] . "', rua='" . $_POST['rua'] . "', numero=" . $_POST['numero'] . ", email='" . $_POST['email'] . "',telefone='" . $_POST['telefone'] . "' where cpf='" . $_POST['cpf'] . "';";




                echo'<h2>Alterado com sucesso</h2>';
                mysqli_query($conexao, $comando);
            } else {
                echo'<center><h2>Invalido</h2></center>';
            }

            header ("refresh: 1, url='../../../Inicio.php'");
            mysqli_close($conexao);
            ?>
        </div>
    </body>
    <html>

