-- INNER JOIN: Relatórios com multiplos dados de multiplas tabelas.

SELECT * FROM tb_movimento WHERE tipo_movimento = 1

SELECT data_cadastro, data_movimento, tb_usuario.id_usuario
   FROM tb_usuario
   INNER JOIN tb_movimento
   ON tb_movimento.id_usuario = tb_usuario.id_usuario
   WHERE data_movimento BETWEEN '2024-01-01' AND '2024-12-31';
   
   SELECT nome_usuario, nome_categoria
   FROM tb_usuario
   INNER JOIN tb_categoria
   ON tb_categoria.id_usuario = tb_usuario.id_usuario;
   
   
   SELECT nome_usuario, email_usuario, banco_conta, saldo_conta, numero_conta
   FROM tb_usuario
   INNER JOIN tb_conta
   ON tb_conta.id_usuario = tb_usuario.id_usuario;
   
  SELECT nome_categoria, nome_empresa, nome_usuario, data_movimento, valor_movimento, tipo_movimento 
  FROM tb_usuario
  INNER JOIN tb_categoria
  ON tb_categoria.id_usuario = tb_usuario.id_usuario
  INNER JOIN tb_empresa
  ON tb_empresa.id_usuario = tb_usuario.id_usuario
  INNER JOIN tb_movimento
  ON tb_movimento.id_usuario = tb_usuario.id_usuario;
  
  SELECT nome_usuario,
  email_usuario,
  senha_usuario,
  data_cadastro,
  nome_categoria,
  nome_empresa,
  telefone_empresa,
  endereco_empresa,
  banco_conta,
  agencia_conta,
  numero_conta,
  saldo_conta,
  tipo_movimento,
  data_movimento,
  valor_movimento,
  obs_movimento
  FROM tb_usuario AS us
  INNER JOIN tb_categoria AS ctg
  ON ctg.id_usuario = us.id_usuario
  INNER JOIN tb_empresa AS emp
  ON emp.id_usuario = us.id_usuario
  INNER JOIN tb_conta AS money
  ON money.id_usuario = us.id_usuario
  INNER JOIN tb_movimento AS caixa
  ON caixa.id_usuario = us.id_usuario
  
  
