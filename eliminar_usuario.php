<?php
session_start();

$host = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'clinica';

$conexion = new mysqli($host, $usuario, $password, $basededatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_usuario'])) {
    $idUsuario = $_POST['id_usuario'];

    echo "ID del usuario a eliminar: " . $idUsuario; // Mensaje de depuración

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuario WHERE dni = '$idUsuario'";

    echo "Consulta SQL: " . $sql; // Mensaje de depuración

    if ($conexion->query($sql) === TRUE) {
        echo 'Usuario Eliminado ';
        header('Location: registro.php?registro=eliminado');
    } else {
        echo 'Error al eliminar usuario: ' . $conexion->error;
    }
}

$conexion->close();
?>
