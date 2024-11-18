<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Chamados</title>
</head>
<body>
    <h1>Criar um chamado</h1>
    <form method="POST" action="create_chamado.php">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required>
        <br>
        <label for="criticidade">Criticidade:</label>
        <input type="text" name="criticidade" required>
        <br>
        <label for="cliente">Cliente:</label>
        <input type="text" name="cliente" required>
        <br>
        <label for="colaborador">Colaborador:</label>
        <input type="text" name="colaborador" required>
        <br>
        <br>
        <input type="submit" value="Adicionar">
    </form>
    <a href="read_chamado.php">Ver todos os chamados existentes</a>
    <br>
</body>
</html>
<?php
    include '../db.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $descricao = $_POST['descricao'];
        $criticidade = $_POST['criticidade'];
        $cliente = $_POST['cliente'];
        $colaborador = $_POST['colaborador'];
        $sql = "INSERT INTO chamado (descricao, criticidade, status_chamado, id_cliente, id_colaborador) VALUE ('$descricao', '$criticidade', 'Aberto', '$cliente', '$colaborador')";
        if($conn -> query($sql) === TRUE) {
            echo "Novo registro adicionado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>". $conn -> error;
        }
    }
    $conn -> close();
?>