<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Validar que la contraseña cumpla con los requisitos
    if (preg_match("/^(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        // Cifrar la contraseña antes de almacenarla
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'libreria');
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Comprobar si el correo ya está registrado
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Este correo ya está registrado.";
        } else {
            // Insertar nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (email, name, password) VALUES ('$email', '$name', '$hashedPassword')";
            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso!";
                header("Location: login.html");  // Redirigir al login
            } else {
                echo "Error al registrar el usuario: " . $conn->error;
            }
        }

        $conn->close();
    } else {
        echo "La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula y un número.";
    }
}
?>
