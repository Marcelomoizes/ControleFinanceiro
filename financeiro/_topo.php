<?php

    //========== SESSÃO DO USUÁRIO ==========

    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();

    //=======================================

?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="inicial.php" class="navbar-brand">Financeiro</a>
    </div>
    <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
        <span>Dúvidas ou Suporte Técnico? Whatsapp: <a href="https://api.whatsapp.com/send?phone=5519998232105"
                target="_blank">(19) 99823-2105</a></span>
    </div>
</nav>