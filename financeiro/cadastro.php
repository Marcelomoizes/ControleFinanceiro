<?php

require_once './DAO/UsuarioDAO.php';


if (isset($_POST['btn_cadastrar'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $repSenha = trim($_POST['repSenha']);


    $objDAO = new UsuarioDAO();
    $ret = $objDAO->CriarCadastro($nome, $email, $senha, $repSenha);
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php' ?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Controle Financeiro: Cadastro</h2>

                <h5>( Faça seu cadastro )</h5>
                <br />
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Preencher todos os campos </strong>


                    </div>
                    <div class="panel-body">

                        <?php include_once '_msg.php'; ?>

                        <form role="form" action="cadastro.php" method="post">
                            <br>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Digite seu Nome aqui..." name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>" />
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Digite seu E-mail aqui..." name="email" id="email" value="<?= isset($email) ? $email : '' ?>" />
                            </div>

                            <span class="msgSenha">A Senha deve conter entre 6 e 8 caracteres!</span>
                            <div class="form-group input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Digite sua Senha aqui..." name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>" />
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Digite novamente sua Senha..." name="repSenha" id="repSenha" value="<?= isset($repSenha) ? $repSenha : '' ?>" />
                            </div>

                            <button name="btn_cadastrar" class="btn btn-success" onclick="return ValidarCadastro();">Finalizar cadastro</button>
                            <hr>
                            <span>Já possui cadastro?</span> <a href="index.php">Clique Aqui!</a>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>

</body>

</html>