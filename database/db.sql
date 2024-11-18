CREATE DATABASE genciamentoDeChamados;

CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    email_cliente varchar(255) not null,
    nome_cliente varchar(255) not null,
    telefone_cliente int not null
);

CREATE TABLE colaboradores (
    id_colaborador INT PRIMARY KEY AUTO_INCREMENT,
    nome_colaborador varchar(155),
    cargo_colaborador enum ('Desenvolvedor', 'Supervisor de Atendimento ao Cliente', 'Suporte Técnico')
);

CREATE TABLE chamados (
    id_chamado INT PRIMARY KEY AUTO_INCREMENT,
    descricao_problema_chamado varchar(255),
    criticidade_chamado enum ('baixa', 'média', 'alta') not null,
    status_chamado enum ('aberto', 'em andamento', 'resolvido') not null -- 'aberto' padrão
    data_abertura_chamado DATE  not null
);
