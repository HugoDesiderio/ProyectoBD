<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventarios";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if(isset($_FILES['imagen'])) {

    $directorio = "uploads/";
    $archivo_nombre = $_FILES['imagen']['name'];
    $archivo_temporal = $_FILES['imagen']['tmp_name'];
    $ruta = $directorio . $archivo_nombre;


    move_uploaded_file($archivo_temporal, $ruta);


    $descripcion = $_POST['Descripcion'];

    $sql = "INSERT INTO tabla_articulos (descripcion, imagen) VALUES ('$descripcion', '$ruta')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
} else {
    echo "No se ha seleccionado ninguna imagen.";
}

$conn->close();
?>
