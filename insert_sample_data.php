<?php
include 'db.php';

// Sample data for clientes
$clientes = [
    ['nome' => 'João Silva', 'cpf' => '123.456.789-00', 'telefone' => '11999999999', 'email' => 'joao@example.com'],
    ['nome' => 'Maria Oliveira', 'cpf' => '987.654.321-00', 'telefone' => '11988888888', 'email' => 'maria@example.com'],
];

// Insert clientes
foreach ($clientes as $cliente) {
    $sql = "INSERT INTO cliente (nome, cpf, telefone, email) VALUES ('{$cliente['nome']}', '{$cliente['cpf']}', '{$cliente['telefone']}', '{$cliente['email']}')";
    $conn->query($sql);
}

// Sample data for pets
$pets = [
    ['cliente_cpf' => '123.456.789-00', 'nome' => 'Rex', 'especie' => 'cachorro', 'porte' => 'medio', 'nascimento' => '2018-05-10'],
    ['cliente_cpf' => '987.654.321-00', 'nome' => 'Mimi', 'especie' => 'gato', 'porte' => 'pequeno', 'nascimento' => '2020-08-15'],
];

// Insert pets
foreach ($pets as $pet) {
    // Get cliente_id by cpf
    $result = $conn->query("SELECT id FROM cliente WHERE cpf = '{$pet['cliente_cpf']}'");
    if ($row = $result->fetch_assoc()) {
        $cliente_id = $row['id'];
        $sql = "INSERT INTO pet (cliente_id, nome, especie, porte, nascimento) VALUES ($cliente_id, '{$pet['nome']}', '{$pet['especie']}', '{$pet['porte']}', '{$pet['nascimento']}')";
        $conn->query($sql);
    }
}

// Sample data for servicos
$servicos = [
    ['nome' => 'Banho', 'preco' => 50.00, 'duracao_min' => 30],
    ['nome' => 'Tosa', 'preco' => 70.00, 'duracao_min' => 45],
];

// Insert servicos
foreach ($servicos as $servico) {
    $sql = "INSERT INTO servico (nome, preco, duracao_min) VALUES ('{$servico['nome']}', {$servico['preco']}, {$servico['duracao_min']})";
    $conn->query($sql);
}

// Sample data for agendamentos (appointments)
$agendamentos = [
    ['pet_nome' => 'Rex', 'servico_nome' => 'Banho', 'data_hora' => '2023-07-01 10:00:00', 'status' => 'agendado', 'observacoes' => ''],
    ['pet_nome' => 'Mimi', 'servico_nome' => 'Tosa', 'data_hora' => '2023-07-02 14:00:00', 'status' => 'agendado', 'observacoes' => 'Cortar unhas também'],
    ['pet_nome' => 'Rex', 'servico_nome' => 'Tosa', 'data_hora' => '2023-07-05 09:00:00', 'status' => 'concluido', 'observacoes' => 'Muito calmo'],
    ['pet_nome' => 'Mimi', 'servico_nome' => 'Banho', 'data_hora' => '2023-07-06 11:00:00', 'status' => 'cancelado', 'observacoes' => 'Cliente cancelou'],
    ['pet_nome' => 'Rex', 'servico_nome' => 'Banho', 'data_hora' => '2023-07-10 10:00:00', 'status' => 'agendado', 'observacoes' => ''],
    ['pet_nome' => 'Mimi', 'servico_nome' => 'Tosa', 'data_hora' => '2023-07-12 15:00:00', 'status' => 'agendado', 'observacoes' => ''],
    ['pet_nome' => 'Rex', 'servico_nome' => 'Banho', 'data_hora' => '2023-07-15 10:00:00', 'status' => 'concluido', 'observacoes' => ''],
    ['pet_nome' => 'Mimi', 'servico_nome' => 'Tosa', 'data_hora' => '2023-07-18 14:00:00', 'status' => 'agendado', 'observacoes' => ''],
