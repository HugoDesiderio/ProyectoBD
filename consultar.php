<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventarios";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM tabla_articulos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Inventarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Consulta de Inventarios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["descripcion"] . "</td>";
                        echo "<td><img src='" . $row["imagen"] . "' width='100' height='100'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No se encontraron resultados.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
