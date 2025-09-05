<?php

include 'db.php';




if($_SERVER['REQUEST_METHOD'] == 'POST'){

   
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $duracao_min = $_POST['duracao_min'];
   

    $sql = "INSERT INTO servico (nome, preco, duracao_min) VALUES ('$nome', '$preco', '$duracao_min')";
    if ($conn->query($sql) === TRUE) {
        echo "Serviço inserido com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Serviço</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Pet Shop - Cadastro de Serviço</h1>
        <nav id="menu-principal">
            <a href="index.php">Home</a>
            <a href="create_agendamento.php">Agendar Atendimento</a>
            <a href="create_cliente.php">Adicionar Cliente</a>
            <a href="create_pet.php">Adicionar Pet</a>
        </nav>
    </header>

    <main>
        <form action="create_servico.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" required><br><br>

        <label for="duracao_min">Duração (min):</label>
        <input type="number" name="duracao_min" required><br><br>

        <input type="submit" value="Adicionar">

        </form>
    </main>

    <footer>
        <p>&copy; 2023 Pet Shop. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
