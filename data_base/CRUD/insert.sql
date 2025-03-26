-- CRUD (Create - Read - Update - Delete)
-- Create: Criar!



INSERT INTO  tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Carina Moizes', 'caah.moi@gmail.com', 'caa1524', '2024-12-13');

INSERT INTO  tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Marcelo Moizes', 'marcelo_moizes@gmail.com', 'marcelo152', '2024-12-06');


INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('VIVO', 1);

INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Carro', 4);

INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Aluguel', 2);

INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Carro', 2);


INSERT INTO tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
VALUES
('Ype', '19998232104', 'Rodovia Beira', 3);


tb_movimentoINSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('Nubank', '6666', '1111', 9585.00, 4);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
VALUES
('Banco do Brasil', '4444', '25422', 2541.00, 4);

INSERT INTO tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
VALUES
(1, '2024-12-20', 5235, 'Contas', 9, 14, 4, 2)