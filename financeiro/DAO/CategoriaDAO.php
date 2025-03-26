<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao  //Classe categoria vai ser extendida para classe conexão, aqui retorna a herança
{
    public function CadastrarCategoria($nomeCategoria)
    {
        if ($nomeCategoria == '') {
            return 0;
        } else {
            //return 1;

            // 1º Passo: Criar uma Variável para receber a conexão!
            $conexao = parent::retornarConexao();

            // 2º Passo: Vamos criar um ScripSQL que sera executado no Banco de Dados pelo PDO!
            $comando_sql = 'INSERT INTO tb_categoria(nome_categoria, id_usuario) VALUES(?, ?);';

            //3º Passo: Criar um objetocom os recursos do PDO.
            // PDO: Função nativa do PHP para gerir ações no Banco de Dados!
            $sql = new PDOStatement();

            // 4º Passo: Vamos adicionar um processo no objeto sql para preparar a execuxão do Scrip SQL no Banco de Dados!
            $sql = $conexao->prepare($comando_sql);

            // 5º Passo: Vamos identificar e validar o que está sendo pasado para o Banco de Dados!
            $sql->bindValue(1, $nomeCategoria);
            $sql->bindValue(2, UtilDAO::UsuarioLogado());

            //6º Passo: Vamos tentar executar o código desenvolvido!
            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }


    public function ConsultarCategoria()
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_categoria, nome_categoria 
                        FROM tb_categoria 
                        WHERE id_usuario = ?
                        ORDER BY nome_categoria';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());

        //Realiza a consulta no banco de dados via PDO, monta e retorna um array com tudo que foi encontrado
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    //Identifica os dados referente ao ID que vai ser alterado ou excluído!
    public function DetalharCategoria($idCategoria)
    {
        if ($idCategoria == '') {
            return 0;
        } else {
            $conexao = parent::retornarConexao();

            $comando_sql = 'SELECT id_categoria, nome_categoria 
                            FROM tb_categoria 
                            WHERE id_categoria = ? 
                            AND id_usuario = ?;';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $i = 1;

            $sql->bindValue($i++, $idCategoria);
            $sql->bindValue($i++, UtilDAO::UsuarioLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }
    }


    public function AlterarCategoria($nomeCategoria, $idCategoria)
    {

        if ($nomeCategoria == '' || $idCategoria == '') {
            return 0;
        } else {
            $conexao = parent::retornarConexao();

            $comando_sql = 'UPDATE tb_categoria 
                            SET nome_categoria = ? 
                            WHERE id_categoria = ? 
                            AND id_usuario = ?;';


            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $i = 1;

            $sql->bindValue($i++, $nomeCategoria);
            $sql->bindValue($i++, $idCategoria);
            $sql->bindValue($i++, UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }


    public function ExcluirCategoria($idCategoria)
    {
        if ($idCategoria == '') {
            return 0;
        } else {

            $conexao = parent::retornarConexao();

            $comando_sql = 'DELETE FROM tb_categoria 
                            WHERE id_categoria = ? 
                            AND id_usuario = ?';


            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $idCategoria);
            $sql->bindValue(2, UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -4;
            }
        }
    }
}
