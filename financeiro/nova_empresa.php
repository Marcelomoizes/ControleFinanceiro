<?php

//========== SESSÃO DO USUÁRIO ==========

require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

//=======================================

require_once './DAO/EmpresaDAO.php';


if(isset($_POST['btn_gravar'])){
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    $objDAO = new EmpresaDAO();
    $ret = $objDAO->CadastrarEmpresa($nome, $telefone, $endereco);
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Cadastrar Empresas</h2>
                        <h5>Aqui você pode CADASTRAR as Empresas.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr>
                <form action="nova_empresa.php" method="post">
                    <div class="form-group">
                        <label>Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o nome da Empresa..." name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Telefone (Whatsapp):</label>
                        <input type="number" class="form-control" placeholder="Digite o Telefone/Whatsapp da Empresa..." name="telefone" id="telefone" value="<?= isset($telefone) ? $telefone : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input class="form-control" placeholder="Digite o Endereço da Empresa..." name="endereco" id="endereco" value="<?= isset($endereco) ? $endereco : '' ?>"/>
                    </div>
                    <button name="btn_gravar" class="btn btn-success" onclick="return ValidarEmpresa();" >Gravar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>