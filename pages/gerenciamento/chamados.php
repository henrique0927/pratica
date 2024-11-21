<?php
include "../../crud/db_conn.php";

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consulta para obter os dados dos clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 20px;
        }
        .no-data {
            text-align: center;
            color: #666;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div>
        <h1>Lista de Clientes Cadastrados</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                    </tr>";
            // Loop para exibir os dados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['id_cliente']) . "</td>
                        <td>" . htmlspecialchars($row['email_cliente']) . "</td>
                        <td>" . htmlspecialchars($row['nome_cliente']) . "</td>
                        <td>" . htmlspecialchars($row['telefone_cliente']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='no-data'>Nenhum cliente encontrado.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
