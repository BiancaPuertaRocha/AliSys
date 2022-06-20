<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>AliSys</title>
        <link rel="stylesheet" href="../../../bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <script src="../../../jquery-1.12.1.min.js"></script>
        <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </head>

    <body onload="javascript:exibeDataHora('hora');" style='background-attachment:fixed;' background="../../../imagens/madeira.jpg" bgproperties="fixed">
       <?php
        include '../../../cabeca.php';
       ?>
        
        <div class="container">


        <?php
       
        include '../../../ConectaBanco.php';


        $busca = "select * from usuario where cpf=" . $_GET['cpf'] . ";";
        

        $resultado = mysqli_query($conexao, $busca);


        $usuario = mysqli_fetch_assoc($resultado);
       

        echo '
            <h1 class="text-center" >Editar Usuário ' . $usuario['nome'] . '</h1></br></br>

<form class="form-horizontal" method="POST" action="EditarUsuarioMesmo.php"><!--qual ação vai ser executada quando enviar -->
 <input type="hidden" name="codigo" value="'.$usuario['codigo'].'">
    <div class="form-group">
        <label for="nome" class="col-md-2  control-label">Nome de Usuario</label>
        <div class="col-md-4">
            <input type="text" name="nome" class="form-control"  id="nome" value="'.$usuario['nome'].'" maxlength="50" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="cpf" class="col-md-2  control-label">CPF</label>
        <div class="col-md-2">
            <input type="number" class="form-control" name="cpf" value="'.$usuario['cpf'].'" required min="0" maxlength="20" id="cpf" >
        </div>
    </div>
    <div class="form-group">
        <label for="rg" class="col-md-2  control-label">RG</label>
        <div class="col-md-2">
            <input type="number" class="form-control" name="rg" value="'.$usuario['rg'].'" maxlength="20" min="0" id="rg" >
        </div>
    </div>

    <div class="form-group">
        <label for="cidade" class="col-md-2  control-label">Cidade</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="cidade" value="'.$usuario['cidade'].'" id="cidade" maxlength="50" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="rua" class="col-md-2  control-label">Rua</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="rua" value="'.$usuario['rua'].'" required maxlength="50" id="rua" >
        </div>
    </div>
    <div class="form-group">
        <label for="numero" class="col-md-2  control-label">Numero</label>
        <div class="col-md-2">
            <input type="number" class="form-control" name="numero" value="'.$usuario['numero'].'" required min="0" maxlength="5" id="numero" >
        </div>
    </div>
    <div class="form-group">
        <label for="uf" class="col-md-2  control-label">Estado</label>
        <div class="col-md-4">
            <select class="form-control" name="uf" id="uf">
                <option value="">Selecione</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espirito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MT">Mato Grosso</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="telefone" class="col-md-2  control-label">Telefone</label>
        <div class="col-md-2">
            <input type="tel" class="form-control" value="'.$usuario['telefone'].'" name="telefone"required id="telefone" maxlength="20" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-2  control-label">E-mail</label>
        <div class="col-md-4">
            <input type="email" class="form-control" name="email" value="'.$usuario['email'].'" required maxlength="60" id="email">
        </div>
    </div>
    <div class="form-group">
        <label for="estcivil" class="col-md-2  control-label">Estado Civil</label>

        <div class="col-md-4">
            <select class="form-control" name="estcivil" id="estcivil">
                <option value="#">Selecione</option>
                <option value="solteiro">Solteiro</option>
                <option value="casado">Casado</option>
                <option value="divorciado">Divorciado</option>
                <option value="separado">Separado</option>
                <option value="viuvo">Viuvo</option> 
            </select>
        </div>
    </div>
    
    
    <div class="form-group">
        <label for="senhaant" class="col-md-2  control-label">Senha Antiga</label>
        <div class="col-md-2">
            <input type="password" class="form-control" name="senhaant" required maxlength="10" id="senhaant">
        </div>
    </div>
    <div class="form-group">
        <label for="senha" class="col-md-2  control-label">Nova Senha</label>
        <div class="col-md-2">
            <input type="password" class="form-control" name="senha" required maxlength="10" id="senha">
        </div>
    </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-sm-4">
                <button type="submit"class="btn btn-success">Confirmar</button>
                <a class="btn btn-danger" href="VizualizarPerfil.php">Cancelar</a>
            </div>
        </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    </div>
</div>


</form>
        ';
        ?>
        </div>
    </body>
</html>
