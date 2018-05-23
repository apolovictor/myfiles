<?php

/* 

-- Usuários: -- 
 * level = 1: Usuário é um Artista.
 * level = 2: Usuário é um Cliente.


Status do usuário:
 * para level = 1:
 * 
 * status = 0: artista inativo (aguardando confirmação do email)
 * status = 4: artista inativo (aguardando aprovação do administrador)
 * status = 1: artista ativo (conta aprovada pelo administrador)
 * status = 3: artista removido (conta removida)
 * 
 * para level = 2:
 * 
 * status = 0: cliente inativo (aguardando confirmação de e-mail)
 * status = 1: cliente ativo (pode acessar o site com perfil de cliente)
 * status = 3: cliente removido (ele removeu a conta)
 * 
 * 
 * 
-- Produtos:
 * 
 * level = 0: produto aguardando aprovação
 * level = 1: produto ativo
 * level = 3: produto removido
 */

