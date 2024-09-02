<?php
session_start();
include('src/conexion.php');

if (isset($_SESSION['user_email']) || isset($_COOKIE['user_email'])) {
    $user_email = $_SESSION['user_email'] ?? $_COOKIE['user_email'];
    $user_id = $_SESSION['user_id'] ?? $_COOKIE['user_id'];
    ?>
    <!DOCTYPE html>
    <html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluir CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir CSS personalizado -->
    <link href="css/estilos.css" rel="stylesheet">
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir tu archivo JS de AJAX -->
    <script src="js/ajax.js"></script>
    
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Parte izquierda -->
            <div class="col-md-4 bg-left">
                <!-- Contenido para la parte izquierda si es necesario -->
                <p>Contenido de la parte izquierda</p>
            </div>

            <!-- Parte derecha -->
            <div class="col-md-8">
                <div class="row">
                    <!-- Parte superior de la derecha -->
                    <div class="col-12 bg-primary text-white text-center">
                        <p>1</p>
                    </div>
                    <!-- Parte media de la derecha -->
                    <div class="col-12 bg-secondary text-white text-center">
                        <p>2</p>
                    </div>
                    <!-- Parte inferior de la derecha -->
                    <div class="col-12 bg-light">
                        <!-- <div class="text-center mt-3">
                            <h3>Bienvenido, <?php echo htmlspecialchars($user_email); ?>!</h3>
                            <p>ID de Usuario: <?php echo htmlspecialchars($user_id); ?></p>
                            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
                        </div> -->
                        <div id="userTableContainer" class="mt-4">
                            <!-- Aquí se cargará la tabla de usuarios -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Incluir JS de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cargar la tabla de usuarios usando AJAX
            loadUsers();
        });
    </script>
</body>

</html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
        <!-- Incluir CSS de Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Incluir CSS personalizado -->
        <link href="css/estilos.css" rel="stylesheet">
        <!-- Incluir jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Incluir tu archivo JS de AJAX -->
        <script src="js/ajax.js"></script>
    </head>

    <body class="login">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div>
                        <div class="text-center">
                            <img src="assets/logo.svg" alt="Logo" class="logo">
                            <h3>Iniciar sesión</h3>
                        </div>
                        <div class="text-center">
                            <p>Ingresa tus datos a continuación</p>
                        </div>
                        <div>
                            <form id="loginForm">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Ingresa el correo" required>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="password">Contraseña</label>
                                        <a href="" class="forgot-password-link">¿Olvidaste la contraseña?</a>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Introduzca Contraseña" required>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Mantenme Conectado</label>
                                </div>
                                <div class="text-center">
                                    <div class="button-container">
                                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form>
                            <div id="message" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Incluir JS de Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
}
?>
