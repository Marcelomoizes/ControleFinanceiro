<?php

// Essa classe tera a finalidade de criar a Sessão de Login do Usuário!



class UtilDAO{

    //1º Passo: Inicia a sessão do usuário dando a permissão!
    private static function IniciarSessao(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    //2º Passo: Essa function vai levantar e armazenar os dados de acesso do usuário!

    public static function CriarSessao($cod, $nome){
        self::IniciarSessao();

        $_SESSION['cod'] = $cod;
        $_SESSION['nome'] = $nome;
    }

    //3º Passo: Vamos receber o nome do usuário a ser utilizado na aplicação.

    public static function NomeLogado(){
        self::IniciarSessao();

        return $_SESSION['nome'];
    }

    //4º Passo: vamos receber o ID do usuário para ser utilizado na aplicação.

    public static function UsuarioLogado(){
        //return 1; // Esse return 1, simula o Log de Acesso do Usuário de ID número 1 (Banco de Dados)

        self::IniciarSessao();

        return $_SESSION['cod'];
    }

    //5º Passo: Caso o usuário saia da aplicação, toda a sessão é limpada!

    public static function Deslogar(){

        self::IniciarSessao();

        unset($_SESSION['cod']);
        unset($_SESSION['nome']);

        header('location: index.php');
        exit;
    }

    //6º Passo: Essa function monitora se existe dados do usuario em sessão, caso não, redireciona para a tela de login.

    public static function VerificarLogado(){
        self::IniciarSessao();

        if(!isset($_SESSION['cod']) || $_SESSION['cod'] == ''){
            header('location: index.php');
            exit;
        }
    }
}