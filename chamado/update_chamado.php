<?php
    include '../db.php';
    $id = $_GET['id'];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $descricao = $_POST['descricao'];
        $criticidade = $_POST['criticidade'];
        $status_chamado = $_POST['status_chamado'];
        $cliente = $_POST['cliente'];
        $colaborador = $_POST['colaborador'];
        $sql = "UPDATE chamado SET descricao = '$descricao', criticidade = '$criticidade', status_chamado = '$status_chamado', id_cliente = '$cliente', id_colaborador = '$colaborador' WHERE id = '$id'"; 
        if($conn -> query($sql) === TRUE) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro: " . $sql . "<br>". $conn -> error;
        }
        $conn -> close();
        header ("Location: read_chamado.php");
        exit();
    }
    $sql = "SELECT * FROM chamado WHERE id = '$id'";
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
    <h1>Atualizar informações do chamado</h1>
    <form method="POST" action="update_chamado.php?id=<?php echo $row['id'];?>">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" value="<?php echo $row['descricao'];?>" required>
        <br>
        <label for="criticidade">Criticidade:</label>
        <input type="text" name="criticidade" value="<?php echo $row['criticidade'];?>" required>
        <br>
        <label for="status_chamado">Status do Chamado:</label>
        <input type="text" name="status_chamado" value="<?php echo $row['status_chamado'];?>" required>
        <br>
        <label for="cliente">Cliente:</label>
        <input type="text" name="cliente" value="<?php echo $row['id_cliente'];?>" required>
        <br>
        <label for="colaborador">Colaborador:</label>
        <input type="text" name="colaborador" value="<?php echo $row['id_colaborador'];?>" required>
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>