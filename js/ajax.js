$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

        $.ajax({
            url: 'login.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'index.php'; // Redirigir a la página principal
                } else {
                    $('#message').html('<div class="alert alert-danger">' + response + '</div>');
                }
            },
            error: function() {
                $('#message').html('<div class="alert alert-danger">Error al procesar la solicitud.</div>');
            }
        });
    });
});

function loadUsers() {
    $.ajax({
        url: 'obtener_usuarios.php',
        method: 'GET',
        success: function(response) {
            $('#userTableContainer').html(response);
        },
        error: function() {
            $('#userTableContainer').html('<p>Error al cargar los datos.</p>');
        }
    });
}