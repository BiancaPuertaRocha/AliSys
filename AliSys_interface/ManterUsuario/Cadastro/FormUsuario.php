<h1 class="text-center" >Cadastrar Usuario</h1></br></br>
<h2 style="color:#B22222;">ESTA PAGINA É SOMENTE PARA O ADMINISTRADOR</h2>
<form class="form-horizontal" method="POST" action="CadastraUsuario.php"><!--qual ação vai ser executada quando enviar -->
    <div class="form-group">
        <label for="nome" class="col-md-2  control-label">Nome de Usuario</label>
        <div class="col-md-4">
            <input type="text" name="nome" class="form-control" required id="nome" maxlength="50" placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="cpf" class="col-md-2  control-label">CPF</label>
        <div class="col-md-2">
            <input type="number" class="form-control" name="cpf" required min="0" maxlength="20" id="cpf" >
        </div>
    </div>
    <div class="form-group">
        <label for="rg" class="col-md-2  control-label">RG</label>
        <div class="col-md-2">
            <input type="number" class="form-control" name="rg" required min="0" maxlength="20" id="rg" >
        </div>
    </div>

    <div class="form-group">
        <label for="cidade" class="col-md-2  control-label">Cidade</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="cidade"  id="cidade" maxlength="50" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="rua" class="col-md-2  control-label">Rua</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="rua" maxlength="50" id="rua" >
        </div>
    </div>
    <div class="form-group">
        <label for="numero" class="col-md-2  control-label">Numero</label>
        <div class="col-md-2">
            <input type="number" class="form-control" name="numero" min="0" maxlength="5" id="numero" >
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
            <input type="tel" class="form-control" name="telefone" maxlength="20" id="telefone"  placeholder="">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-2  control-label">E-mail</label>
        <div class="col-md-4">
            <input type="email" class="form-control" name="email" maxlength="60" id="email">
        </div>
    </div>
    <div class="form-group">
        <label for="estcivil" class="col-md-2  control-label">Estado Civil</label>

        <div class="col-md-4">
            <select class="form-control" name="estcivil" required id="estcivil">
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
        <label for="datanasc" class="col-md-2  control-label">Data de Nascimento</label>
        <div class="col-md-2">
            <input type="date" class="form-control" name="datanasc" required  id="datanasc">
        </div>
    </div>
    <div class="form-group">
        <label for="senha" class="col-md-2  control-label">Senha</label>
        <div class="col-md-2">
            <input type="password" class="form-control" name="senha" required maxlength="10" id="senha">
        </div>
    </div>

    <div class="form-group">
        <label for="senha2" class="col-md-2  control-label">Confirme a senha</label>
        <div class="col-md-2">
            <input type="password" class="form-control" maxlength="10" name="senha2" required  id="senha">
        </div>
    </div>
    <div class="form-group">
        <label for="tipous" class="col-md-2  control-label">Tipo de Usuário</label>

        <div class="col-md-4">
            <select class="form-control" name="tipous" maxlength="20" required id="tipous">
                
                <?php
                include '../../ConectaBanco.php';
                $busca = "select * from usuario where tipous = 'adm';";
                $resultado = mysqli_query($conexao, $busca);
                $linha = mysqli_fetch_assoc($resultado);
                if (empty($linha['cpf'])) {


                    echo'<option value="adm">Administrador</option>';
                } else {
                    echo'<option value = "comum">Usuário Comum</option>';
                }

                echo'</select><br>';


                echo'';
                ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-sm-4">
            <button type="submit"class="btn btn-success">Cadastrar</button>
            <?php
            if (isset($_SESSION['user']) && isset($_SESSION['senha'])) {
                echo'<a class="btn btn-danger" href="../Pesquisa/ManterUsuario.php"> Cancelar </a>';
            } else {
                echo'<a class="btn btn-danger" href="../../Login/index.php"> Cancelar </a>';
            }
            ?>
        </div>
    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          




</form>