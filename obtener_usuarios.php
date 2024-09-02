<?php
include('src/conexion.php'); // Incluye tu archivo de conexión a la base de datos

$query = "SELECT id, correo_electronico FROM login";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>ID</th><th>Correo Electrónico</th></tr></thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['correo_electronico']) . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
} else {
    echo '<p>No hay usuarios.</p>';
}

$conn->close();
?>
