<?php


$host = 'localhost';
$usuarios = 'root';
$password = '';
$basededatos = 'clinica';
//variables para llamar la coneccion al abase de datos

$conexion = new mysqli($host,$usuarios,$password,$basededatos);
//constructor para la base de datos

if($conexion->connect_error)
{
die("error de coneccion" . $conexion->connect_error);
//manda error de base de datos

}


$usuario = $_POST["username"];
$password = $_POST["password"];
//obtengo variables del form de html y las almaseno con metodo post en variables 

$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND password = '$password'";
// seleccionas la tabla usuario y buscararas el registro usuario y el pasword todo lo vas almasenar en la variable sql

$resultado = $conexion->query($sql);
// ejecuta la consulta ala base de datos que ya propuse y la almasena en resultado igual mensionar que es un objeto osea guarda toda la consulta


if ($resultado->num_rows > 0)
// num_row es una propiedad de objeto que devuelve el numero de filas que devuelve la consulta en este caso si es mayor a 0 entra en el if
 {
    session_start(); 
    //inicio sesion para usar variable session
    $_SESSION['usuario'] = $usuario;
    //lavariable de sesion se llama usuario y le estoy mandando para que guarde el valor de la variable usuario
    header('Location: registro.php');
    //llamo el archivo registrio.php
    exit;
    //me salgo
} else {
    $usuarioerror = '1';
    header('Location: index.php?'. urlencode($usuarioerror));
    //caso contrario contraseña incorrecta
}

// Cerrar conexión
$conexion->close();
//cierro coneccion base de datos

?>