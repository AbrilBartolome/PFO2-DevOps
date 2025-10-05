<?php

$servername = getenv('DB_SERVER');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASSWORD');
$dbname     = getenv('DB_NAME');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Películas</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Listado de Películas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Director</th>
            <th>Género</th>
            <th>Duración (min)</th>
            <th>Fecha de Estreno</th>
            <th>Precio</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["titulo"]."</td>
                        <td>".$row["director"]."</td>
                        <td>".$row["genero"]."</td>
                        <td>".$row["duracion"]."</td>
                        <td>".$row["fecha_estreno"]."</td>
                        <td>$".$row["precio"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay películas registradas</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
