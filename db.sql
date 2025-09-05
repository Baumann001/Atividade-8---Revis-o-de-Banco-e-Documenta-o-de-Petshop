
CREATE DATABASE  petshop_db;
USE petshop_db;


CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(15),
    email VARCHAR(100)
);


CREATE TABLE pet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    especie ENUM('cachorro', 'gato', 'ave', 'roedor', 'outro') NOT NULL,
    porte ENUM('pequeno', 'medio', 'grande') NOT NULL,
    nascimento DATE,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id)
);


CREATE TABLE servico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    preco DECIMAL(8, 2) NOT NULL,
    duracao_min INT NOT NULL,
    CHECK (preco >= 0),
    CHECK (duracao_min > 0)
);


CREATE TABLE agendamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    servico_id INT NOT NULL,
    data_hora DATETIME NOT NULL,
    status ENUM('agendado', 'concluido', 'cancelado') NOT NULL,
    observacoes VARCHAR(255),
    FOREIGN KEY (pet_id) REFERENCES pet(id),
    FOREIGN KEY (servico_id) REFERENCES servico(id)
);

-- Insert 10 clientes
INSERT INTO cliente (nome, cpf, telefone, email) VALUES
('João Silva', '111.111.111-11', '11999999999', 'joao@example.com'),
('Maria Oliveira', '222.222.222-22', '11988888888', 'maria@example.com'),
('Carlos Santos', '333.333.333-33', '11777777777', 'carlos@example.com'),
('Ana Pereira', '444.444.444-44', '11666666666', 'ana@example.com'),
('Pedro Lima', '555.555.555-55', '11555555555', 'pedro@example.com'),
('Luana Costa', '666.666.666-66', '11444444444', 'luana@example.com'),
('Roberto Alves', '777.777.777-77', '11333333333', 'roberto@example.com'),
('Fernanda Rocha', '888.888.888-88', '11222222222', 'fernanda@example.com'),
('Gustavo Mendes', '999.999.999-99', '11111111111', 'gustavo@example.com'),
('Juliana Ferreira', '000.000.000-00', '11000000000', 'juliana@example.com');

-- Insert 5 servicos
INSERT INTO servico (nome, preco, duracao_min) VALUES
('Banho', 50.00, 30),
('Tosa', 70.00, 45),
('Consulta Veterinária', 100.00, 60),
('Vacinação', 80.00, 20),
('Corte de Unhas', 30.00, 15);

-- Insert 10 pets
INSERT INTO pet (cliente_id, nome, especie, porte, nascimento) VALUES
(1, 'Rex', 'cachorro', 'medio', '2018-05-10'),
(2, 'Mimi', 'gato', 'pequeno', '2020-08-15'),
(3, 'Buddy', 'cachorro', 'grande', '2019-03-22'),
(4, 'Luna', 'gato', 'pequeno', '2021-01-05'),
(5, 'Max', 'cachorro', 'medio', '2017-11-30'),
(6, 'Bella', 'cachorro', 'pequeno', '2022-06-12'),
(7, 'Charlie', 'gato', 'medio', '2019-09-18'),
(8, 'Daisy', 'cachorro', 'pequeno', '2020-12-25'),
(9, 'Rocky', 'cachorro', 'grande', '2018-07-14'),
(10, 'Molly', 'gato', 'pequeno', '2021-04-08');

-- Insert 10 agendamentos
INSERT INTO agendamento (pet_id, servico_id, data_hora, status, observacoes) VALUES
(1, 1, '2023-07-01 10:00:00', 'agendado', ''),
(2, 2, '2023-07-02 14:00:00', 'agendado', 'Cortar unhas também'),
(3, 1, '2023-07-05 09:00:00', 'concluido', 'Muito calmo'),
(4, 3, '2023-07-06 11:00:00', 'cancelado', 'Cliente cancelou'),
(5, 4, '2023-07-10 10:00:00', 'agendado', ''),
(6, 5, '2023-07-12 15:00:00', 'agendado', ''),
(7, 1, '2023-07-15 10:00:00', 'concluido', ''),
(8, 2, '2023-07-18 14:00:00', 'agendado', ''),
(9, 3, '2023-07-20 16:00:00', 'agendado', 'Primeira consulta'),
(10, 1, '2023-07-22 12:00:00', 'concluido', 'Banho completo');

