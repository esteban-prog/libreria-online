<?php
session_start();  // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtiene los datos del formulario
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Conexión a la base de datos
  $conn = new mysqli('localhost', 'root', '', 'libreria');

  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  // Verifica si el usuario existe en la base de datos
  $sql = "SELECT * FROM usuarios WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifica la contraseña
    if (password_verify($password, $user['password'])) {
      // Si la contraseña es correcta, guarda los datos del usuario en la sesión
      $_SESSION['user_id'] = $user['ID'];
      $_SESSION['user_name'] = $user['name'];

      // Redirige a la página de inicio o donde desees
      header("Location: index.php");
      exit; // Asegúrate de que el script termine después de la redirección
    } else {
      // Si la contraseña es incorrecta
      echo "Contraseña incorrecta";
    }
  } else {
    // Si no se encuentra el usuario con ese correo
    echo "No se encontró un usuario con ese correo";
  }

  // Cierra la conexión
  $conn->close();
}
?>
