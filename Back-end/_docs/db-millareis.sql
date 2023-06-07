CREATE DATABASE millareis_db;

USE millareis_db;

/* Criação da tabela clientes */
CREATE TABLE clientes (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  telefone VARCHAR(50),
  data_nascimento DATE,
  observacao VARCHAR(255),
  ativo Boolean default 1,
  validado Boolean default 0
);


/* Criação da tabela serviços */
CREATE TABLE servicos (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  descricao VARCHAR(255),
  preco DECIMAL(10, 2) 
);


/* Criação da tabela agendamentos */
CREATE TABLE agendamentos (
  id INT PRIMARY KEY,
  cliente_id INT,
  servico_id INT,
  data_agendamento DATE,
  horario_agendamento TIME,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id),
  FOREIGN KEY (servico_id) REFERENCES servicos(id)
);

alter table servicos add ativo Boolean default 1;
alter table agendamentos add ativo Boolean default 1;