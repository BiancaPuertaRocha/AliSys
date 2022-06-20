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
        include '../../../ConectaBanco.php';


        $busca = "select * from fornecedor where codigo=" . $_GET['codigo'] . ";";


        $resultado = mysqli_query($conexao, $busca);


        $fornecedor = mysqli_fetch_assoc($resultado);

        echo '
        <div  class="container">
            <h1 class="text-center" >Editar Fornecedor</h1></br></br>
            
            <form class="form-horizontal" method="POST" action="EditarFornecedorMesmo.php"><!--qual ação vai ser executada quando enviar -->
            <input type="hidden" name="codigo" value="'.$fornecedor['codigo'].'">
                <div class="form-group">
                    <label for="nomefant" class="col-md-2  control-label" >Nome Fantasia</label>
                    <div class="col-md-4">
                        <input type="text" name="nomefant" class="form-control"  value="'.$fornecedor['nomefant'].'" id="nomefant" maxlength="50" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cnpj" class="col-md-2  control-label">CNPJ</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="cnpj" value="'.$fornecedor['cnpj'].'" required min="0" maxlength="20" id="cnpj" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="razsocial" class="col-md-2  control-label">Razão Social</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" value="'.$fornecedor['razsocial'].'" name="razsocial" min="0" maxlength="50" id="numero" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="cidade" class="col-md-2  control-label">Cidade</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="'.$fornecedor['cidade'].'" name="cidade"  id="cidade" maxlength="50" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rua" class="col-md-2  control-label">Rua</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="'.$fornecedor['rua'].'" name="rua" required maxlength="50" id="rua" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="col-md-2  control-label">Numero</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" value="'.$fornecedor['numero'].'" name="numero" min="0" required maxlength="5" id="numero" >
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
                    <div class="col-md-4">
                        <input type="tel" class="form-control" value="'.$fornecedor['telefone'].'" name="telefone" required id="telefone" maxlength="10" placeholder="">
                    </div>
                </div>
        
                <div class="form-group">
                    <label for="email" class="col-md-2  control-label">E-mail</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" value="'.$fornecedor['email'].'" name="email" required maxlength="50" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="vendedor" class="col-md-2  control-label">Vendedor</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="'.$fornecedor['vendedor'].'" name="vendedor" required maxlength="50"  id="vendedor">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-sm-4">
                        <button type="submit" class="btn btn-success" >Confirmar</button>
                        <a href="../../Pesquisa/ManterFornecedor.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>';
                ?>
    </body>
</html>
