<?php
$servername = "localhost";  // o la IP del servidor MySQL si no es local
$username = "root";         // tu usuario de MySQL
$password = "";             // tu contraseña de MySQL (si la tienes configurada)
$dbname = "libreria";       // nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>
