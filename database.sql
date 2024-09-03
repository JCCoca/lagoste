CREATE DATABASE lagoste;

USE lagoste;

CREATE TABLE fale_conosco (
    id BIGINT(19) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    sexo CHAR(1) NOT NULL,
    mensagem TEXT NOT NULL,
    data_hora_mensagem DATETIME NOT NULL DEFAULT NOW()
);

CREATE TABLE usuario (
    id BIGINT(19) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL
);

INSERT INTO usuario (
    nome,
    email,
    senha
) VALUE (
    'Administrador',
    'admin@gmail.com',
    '$2y$10$p.vrasqJxu6wtnT68VsfNe0PI3M3bfIJT2m7en/LgQjRQxT3hzTQm'
);

CREATE TABLE categoria (
    id BIGINT(19) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    criado_em DATETIME NOT NULL DEFAULT NOW(),
    atualizado_em DATETIME NULL,
    excluido_em DATETIME NULL
);

CREATE TABLE produto (
    id BIGINT(19) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    valor DECIMAL(12,2) NOT NULL,
    quantidade INT(11) NOT NULL,
    id_categoria BIGINT(19) NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categoria (id),
    criado_em DATETIME NOT NULL DEFAULT NOW(),
    atualizado_em DATETIME NULL,
    excluido_em DATETIME NULL
);