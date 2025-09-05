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


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create_servico.php" method="post">

<label for="nome">Nome:</label>
<input type="text" name="nome" required><br><br>

<label for="preco">Preço:</label>
<input type="number" step="0.01" name="preco" required><br><br>

<label for="duracao_min">Duração (min):</label>
<input type="number" name="duracao_min" required><br><br>



<input type="submit" value="Adicionar">
    
</body>
</html>