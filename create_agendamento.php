<?php

include 'db.php';

// Fetch pets for dropdown
$sql_pets = "SELECT p.id, p.nome AS pet_nome, c.nome AS cliente_nome FROM pet p JOIN cliente c ON p.cliente_id = c.id";
$result_pets = $conn->query($sql_pets);

// Fetch services for dropdown
$sql_servicos = "SELECT id, nome FROM servico";
$result_servicos = $conn->query($sql_servicos);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   
    $pet_id = $_POST['pet_id'];
    $servico_id = $_POST['servico_id'];
    $data_hora = $_POST['data_hora'];
    $status = $_POST['status'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO agendamento (pet_id, servico_id, data_hora, status, observacoes) VALUES ('$pet_id', '$servico_id', '$data_hora', '$status', '$observacoes')";
    if ($conn->query($sql) === TRUE) {
        echo "Agendamento inserido com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Agendamento</title>
</head>
<body>

<form action="create_agendamento.php" method="post">

<label for="pet_id">Pet:</label>
<select name="pet_id" required>
    <option value="">Selecione um pet</option>
    <?php
    if ($result_pets->num_rows > 0) {
        while($row = $result_pets->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['pet_nome'] . " (" . $row['cliente_nome'] . ")</option>";
        }
    }
    ?>
</select><br><br>

<label for="servico_id">Serviço:</label>
<select name="servico_id" required>
    <option value="">Selecione um serviço</option>
    <?php
    if ($result_servicos->num_rows > 0) {
        while($row = $result_servicos->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
        }
    }
    ?>
</select><br><br>

<label for="data_hora">Data e Hora:</label>
<input type="datetime-local" name="data_hora" required><br><br>

<label for="status">Status:</label>
<select name="status" required>
    <option value="">Selecione o status</option>
    <option value="agendado">Agendado</option>
    <option value="concluido">Concluído</option>
    <option value="cancelado">Cancelado</option>
</select><br><br>

<label for="observacoes">Observações:</label>
<textarea name="observacoes"></textarea><br><br>

<input type="submit" value="Agendar">

</form>

</body>
</html>
