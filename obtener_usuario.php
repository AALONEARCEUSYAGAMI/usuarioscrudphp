<?php
session_start();

$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'clinica';

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el ID del usuario de la solicitud AJAX
$idUsuario = $_GET['id'];

// Consulta SQL para obtener los datos del usuario
$sql = "SELECT usuario, rol FROM usuario WHERE dni = '$idUsuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Obtener los datos del usuario
    $fila = $resultado->fetch_assoc();

    // Devolver los datos del usuario como un objeto JSON
    echo json_encode($fila);
} else {
    // Si no se encuentra el usuario, devolver un objeto JSON vacío
    echo json_encode(array());
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
