<?php
// Incluir archivo de conexión
include 'src/conexion.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['newCorreo'];
    $contrasena = $_POST['newContrasena'];

    // Verificar si el correo ya existe
    $sql = "SELECT * FROM login WHERE correo_electronico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo json_encode(['success' => false, 'error' => 'El correo ya está registrado.']);
        exit();
    }

    // Insertar nuevo usuario
    $hashedPassword = password_hash($contrasena, PASSWORD_BCRYPT);
    $sql = "INSERT INTO login (correo_electronico, contrasena) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $correo, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al crear el usuario.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido.']);
}
?>
