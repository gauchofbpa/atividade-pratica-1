<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Chamados</title>
</head>
<body>
    <h1>Visualizar os chamados</h1>
    <table>
        <thead>
            <th>ID Chamado</th>
            <th>Descrição do problema</th>
            <th>Criticidade</th>
            <th>Status</th>
            <th>Data de abertura</th>
            <th>ID Cliente</th>
            <th>ID Colaborador Responsável</th>
        </thead>
        <tbody>
            <?php
                include '../db.php';
                $sql = "SELECT * FROM chamado";
                $result = $conn -> query($sql);
                if ($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr>
                        <th scope='row'> {$row['id']} </th>
                        <td>{$row['descricao']}</td>
                        <td>{$row['criticidade']}</td>
                        <td>{$row['status_chamado']}</td>
                        <td>{$row['data_abertura']}</td>
                        <td>{$row['id_cliente']}</td>
                        <td>{$row['id_colaborador']}</td>
                        <td>
                            <a href='update_chamado.php?id={$row['id']}'>Editar</a> |
                            <a href='delete_chamado.php?id={$row['id']}'>Excluir</a>
                        </td>
                        </tr>";
                        }
                    } else {
                        echo "Nenhum registro encontrado";
                    }
                    $conn -> close();
            ?>
        </tbody>    
    </table>  
    <a href="create_chamado.php">Inserir novo chamado</a>
    <br>
    <a href="../cliente/read_cliente.php">Visualizar todos os clientes</a>
    <br>
    <a href="../colaborador/read_colaborador.php">Visualizar todos os colaboradores</a>
</body>
</html>