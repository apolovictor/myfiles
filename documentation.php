<?php

// Fonts
// 12px normal para o site
// 14px para texto relevante
// 18 Titulos
// 16px subtitulos

// Aplicação principal

// Avaliação de Professores

//  -- Tabelas -- 

// plan_access -> Correlaciona o usuários (id_user) com os seus respectivos planos de curso (id_plan), onde o status for 1.

// plan_call -> Correlaciona os apontamentos (description) feitos pelos usuários da sessão (id_user) aos respectivos chamados
// (id_support) e registra os horários (date_register) com status 1.

// plan_content -> Tabela de conteúdo. Contém informações da disciplina (discipline), série (series), area (area), habilidades
// (skills), conteúdos (contents), estratégias (strategies) e avaliação (evaluation). Das respectivas unidades.

// plan_support -> Tabela que armazena todos os chamados criados pelos usuários com acesso ao chamados do solutions.
// Contém categoria (category), titulo (title), descrição do chamado (description), a data e hora que foi criada (date_register)
// a ultima atualização (last_update), o solicitante (requester) e quem atendeu (attendant).

// plan_users - >   Contem o nome de todos os usuários do sistema. A tabela armazena nome de usuário (username), nome (name), 
// email (email), numero (number), level e status.