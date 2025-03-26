<?php

//========== SESSÃO DO USUÁRIO ==========

require_once './DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

//=======================================

require_once './DAO/EmpresaDAO.php';

$objDAO = new EmpresaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $idEmpresa = $_GET['cod'];

    $dados = $objDAO->DetalharEmpresa($idEmpresa);

    if (count($dados) == 0) {
        header('location: consultar_empresa.php');
        exit;
    }
} else if (isset($_POST['btn_gravar'])) {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);
    $idEmpresa = $_POST['cod'];

    $ret = $objDAO->AlterarEmpresa($nome, $telefone, $endereco, $idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btn_excluir'])) {
    $idEmpresa = $_POST['cod'];

    $ret = $objDAO->ExcluirEmpresa($idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_empresa.php');
    exit;
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php'
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
                        <h2>Alterar ou Excluir Empresa</h2>
                        <h5>Aqui você poderá ALTERAR ou EXCLUIR suas empresas.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr>
                <form action="alterar_empresa.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label>Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o nome da Empresa. Exemplo: Casas Bahias..." name="nome" id="nome" value="<?= $dados[0]['nome_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Telefone (Whatsapp):</label>
                        <input type="number" class="form-control" placeholder="Digite o Telefone/Whatsapp da Empresa (Opcional)" name="telefone" id="telefone" value="<?= $dados[0]['telefone_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input class="form-control" placeholder="Digite o Endereço da Empresa (Opcional)" name="endereco" id="endereco" value="<?= $dados[0]['endereco_empresa'] ?>" />
                        <br>
                        <button name="btn_gravar" class="btn btn-success" onclick="return ValidarEmpresa();">Gravar</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir</button>

                        <!-- INÍCIO DO MODAL DE EXCLUSÃO -->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir a Empresa?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <span>Nome da Empresa: </span><strong><?= $dados[0]['nome_empresa'] ?></strong>
                                            <br>
                                            <span>Telefone da Empresa: </span><strong><?= $dados[0]['telefone_empresa'] ?></strong>
                                            <br>
                                            <span>Endereço da Empresa: </span><strong><?= $dados[0]['endereco_empresa'] ?></strong>
                                            <br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-danger" name="btn_excluir">Sim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM DO MODAL DE EXCLUSÃO -->

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>