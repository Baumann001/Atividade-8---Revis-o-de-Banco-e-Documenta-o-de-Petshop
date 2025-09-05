<?php

include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone  = $_POST['telefone'];
$email = $_POST['email'];

$sql = " INSERT INTO cliente (nome, cpf, telefone, email) VALUES ('$nome', '$cpf', '$telefone', '$email')";


if ($conn->query($sql) === TRUE) {
    echo "Cliente inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

};


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="create_cliente.php" method="post">

<label for="nome">Nome:</label>
<input type="text" name = "nome" required>

<label for="cpf">CPF:</label>
<input type="text" name = "cpf" required>

<label for="telefone">Telefone:</label>
<input type="text" name = "telefone" required>

<label for="email">Email:</label>
<input type="email" name = "email" required>


<input type="submit" value = "Adicionar">

</form>
    
</body>
</html>

