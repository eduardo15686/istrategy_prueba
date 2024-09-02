<?php
session_start();
session_unset();
session_destroy();

// Eliminar la cookie si existe
if (isset($_COOKIE['user_email'])) {
    setcookie('user_email', '', time() - 3600, "/");
}

header('Location: index.php');
exit();
?>
