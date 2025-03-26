-- CRUD (Create - Read - Update - Delete)
-- Update: Atualizar!

UPDATE tb_usuario
   SET nome_usuario = 'Camila Carvalho'
 WHERE id_usuario = 3;
 
 UPDATE tb_usuario
    SET email_usuario = 'camila.carvalho@gmail.com',
        senha_usuario = 'cami1628'
  WHERE id_usuario = 3;
  

 UPDATE tb_usuario
    SET nome_usuario = 'Maria Helena',
        email_usuario = 'maria.helena@gmail.com',
        senha_usuario = 'Lena630'
  WHERE id_usuario = 4;
  
  update tb_categoria
  set nome_categoria = 'IPVA'
  where id_categoria = 9