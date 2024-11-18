<?php
    include '../db.php';
    $id = $_GET['id'];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sql = "UPDATE cliente SET nome = '$name', email = '$email', telefone = '$telefone' WHERE id = '$id'"; 
        if($conn -> query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>". $conn -> error;
        }
        $conn -> close();
        header ("Location: read_cliente.php");
        exit();
    }
    $sql = "SELECT * FROM cliente WHERE id = '$id'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Chamados</title>
</head>
<body>
    <h1>Atualizar cadastro do cliente</h1>
    <form method="POST" action="update_cliente.php?id=<?php echo $row['id'];?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['nome'];?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email'];?>" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $row['telefone'];?>" required>
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>