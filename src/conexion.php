<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost"; // o la dirección del servidor de base de datos
$usuario = "root"; // Tu usuario de MySQL
$contrasena = ""; // Tu contraseña de MySQL
$base_datos = "istrategy"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Configurar el conjunto de caracteres
$conn->set_charset("utf8");

// Éxito
// echo "Conectado exitosamente";

// Cerrar la conexión al final del script (opcional)
// $conn->close();
?>
