<?php

$host = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'clinica';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar_usuario'])) {
    $conexion = new mysqli($host, $usuario, $password, $basededatos);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $usuario = $conexion->real_escape_string($_POST['usuario']);
    $password = $conexion->real_escape_string($_POST['password']); // Campo de contraseña
    $rol = $conexion->real_escape_string($_POST['rol']);

    $sql = "INSERT INTO usuario (usuario, dni, password, rol) VALUES ('$usuario', '$dni', '$password', '$rol')";

    if ($conexion->query($sql) === TRUE) {
        echo 'Usuario agregado exitosamente.';
        header('Location: registro.php?registro=exitoso');
        exit;
    } else {
        echo 'Error al agregar usuario: ' . $conexion->error;;
    }

    $conexion->close();

}
?>
