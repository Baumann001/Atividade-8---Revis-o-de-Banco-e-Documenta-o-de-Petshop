<?php

include 'db.php';

// Fetch clientes for dropdown
$sql_clientes = "SELECT id, nome, cpf FROM cliente";
$result_clientes = $conn->query($sql_clientes);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $cliente_id = $_POST['cliente_id'];
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $porte = $_POST['porte'];
    $nascimento = $_POST['nascimento'];

    $sql = "INSERT INTO pet (cliente_id, nome, especie, porte, nascimento) VALUES ('$cliente_id', '$nome', '$especie', '$porte', '$nascimento')";
    if ($conn->query($sql) === TRUE) {
        echo "Pet inserido com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pet</title>
</head>
<body>

<form action="create_pet.php" method="post">

<label for="cliente_id">Cliente:</label>
<select name="cliente_id" required>
    <option value="">Selecione um cliente</option>
    <?php
    if ($result_clientes->num_rows > 0) {
        while($row = $result_clientes->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . " (" . $row['cpf'] . ")</option>";
        }
    }
    ?>
</select><br><br>

<label for="nome">Nome do Pet:</label>
<input type="text" name="nome" required><br><br>

<label for="especie">Espécie:</label>
<select name="especie" required>
    <option value="">Selecione a espécie</option>
    <option value="cachorro">Cachorro</option>
    <option value="gato">Gato</option>
    <option value="ave">Ave</option>
    <option value="roedor">Roedor</option>
    <option value="outro">Outro</option>
</select><br><br>

<label for="porte">Porte:</label>
<select name="porte" required>
    <option value="">Selecione o porte</option>
    <option value="pequeno">Pequeno</option>
    <option value="medio">Médio</option>
    <option value="grande">Grande</option>
</select><br><br>

<label for="nascimento">Data de Nascimento:</label>
<input type="date" name="nascimento" required><br><br>

<input type="submit" value="Adicionar">

</form>
    
</body>
</html>
