<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_usuario'])) {
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $basededatos = 'clinica';

    $conexion = new mysqli($host, $usuario, $password, $basededatos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $idUsuario = $_POST['idUsuarioEditar'];
    $nuevoUsuario = $_POST['nuevoUsuario'];
    $nuevaContrasena = $_POST['nuevaContrasena'];
    $nuevoRol = $_POST['nuevoRol'];

    // Consulta SQL para actualizar el usuario con los nuevos datos
    $sql = "UPDATE usuario SET usuario='$nuevoUsuario', password='$nuevaContrasena', rol='$nuevoRol' WHERE dni=$idUsuario";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir de vuelta a la página principal con un parámetro indicando que la actualización fue exitosa
        header('Location: registro.php?actualizacion=exitosa');
        exit;
    } else {
        // Si hay un error en la consulta SQL, muestra un mensaje de error
        echo 'Error al actualizar usuario: ' . $conexion->error;
    }

    $conexion->close();
}
?>
