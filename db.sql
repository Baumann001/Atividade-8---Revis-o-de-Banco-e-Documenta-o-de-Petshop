CREATE DATABASE petshop_db;
USE petshop_db;


CREATE TABLE  cliente(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100)NOT NULL,
cpf VARCHAR(14)NOT NULL  UNIQUE,
telefone VARCHAR(15) NOT NULL,
email VARCHAR(100)
);

CREATE TABLE pet(
id AUTO_INCREMENT PRIMARY KEY,
cliente_id INT NOT NULL,
nome VARCHAR(100) NOT NULL,
especie ENUM('cachorro',  'gato','ave','roedor','outro') NOT NULL,
porte ENUM('pequeno','medio','grande') NOT NULL,
nascimento DATE,
FOREIGN KEY (cliente_id) REFERENCES cliente(id)

);

CREATE TABLE servico (
id INT AUTO_INCREMENT  PRIMARY KEY,
nome VARCHAR(100) NOT NUlL,
preco DECIMAL(8,2) NOT NULL,
duracao_min INT NOT NULL,
CHECK(preco >=0),
CHECK(duracao_min>0)
);

CREATE TABLE agendamento(
id INT AUTO_INCREMENT PRIMARY KEY,
pet_id INT NOT NULL,
servico_id INT NOT NULL,
data_hora DATETIME NOT NULL,
status ENUM('agendado', 'concluido', 'cancelado') NOT NULL,
    observacoes VARCHAR(255),
    FOREIGN KEY (pet_id) REFERENCES pet(id),
    FOREIGN KEY (servico_id) REFERENCES servico(id)

);