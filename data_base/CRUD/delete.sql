-- CRUD (Create - Read - Update - Delete)
-- Delete: Excluir!

-- Realiza a exclusão de todo o Banco de Dados

DROP DATABASE db_exemplo;

-- Realiza a exclusão de um tabela do Banco de Dados

DROP TABLE tb_exemplo; 

DELETE FROM tb_categoria
WHERE id_categoria in (10, 11)