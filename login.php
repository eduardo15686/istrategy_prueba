<?php
session_start();
include('src/conexion.php'); // Incluye tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        // Consultar el usuario en la base de datos
        $query = $conn->prepare("SELECT id, contrasena FROM login WHERE correo_electronico = ?");
        $query->bind_param('s', $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['contrasena'];
            $user_id = $row['id']; // Obtener el ID del usuario

            if (password_verify($password, $hashed_password)) {
                if ($remember) {
                    setcookie('user_email', $email, time() + (30 * 24 * 60 * 60), "/"); // 30 días
                    setcookie('user_id', $user_id, time() + (30 * 24 * 60 * 60), "/"); // 30 días
                } else {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_id'] = $user_id; // Guardar el ID en la sesión
                    setcookie(session_name(), session_id(), time() + (1 * 60), "/"); // 1 minuto de vida útil
                }

                echo "success";
            } else {
                echo "Correo electrónico o contraseña incorrectos.";
            }
        } else {
            echo "Correo electrónico o contraseña incorrectos.";
        }

        $query->close();
        $conn->close();
    } else {
        echo "Por favor, ingresa un correo electrónico y una contraseña válidos.";
    }
}
?>
