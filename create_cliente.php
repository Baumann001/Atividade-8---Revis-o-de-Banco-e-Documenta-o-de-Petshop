<?php

include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone  = $_POST['telefone'];
    $email = $_POST['email'];

    
    $sql_check = "SELECT id FROM cliente WHERE cpf = '$cpf'";
    $result = $conn->query($sql_check);

    if($result->num_rows > 0){
        echo "Erro: CPF já cadastrado!";
    } else {
        $sql = "INSERT INTO cliente (nome, cpf, telefone, email) VALUES ('$nome', '$cpf', '$telefone', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Cliente inserido com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Pet Shop - Cadastro de Cliente</h1>
        <nav id="menu-principal">
            <a href="index.php">Home</a>
            <a href="create_servico.php">Criar Serviço</a>
            <a href="create_agendamento.php">Agendar Atendimento</a>
            <a href="create_pet.php">Adicionar Pet</a>
        </nav>
    </header>

    <main>
        <form action="create_cliente.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Adicionar">

        </form>
    </main>

    <footer>
        <p>&copy; 2023 Pet Shop. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
