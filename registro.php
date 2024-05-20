<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="stylesheet" href="c.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    
<div class="contenedor">

<?php
session_start();
// Obtener el valor de $usuario de la variable de sesión
$usuario = $_SESSION['usuario'];

echo "Inicio de sesión exitoso. Bienvenido, $usuario!";


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
$sql = "SELECT * FROM usuario";
$resultado = $conexion->query($sql);
?>
<h2>Tabla de Usuarios</h2>
<br>
<div id="tablaUsuario" class ="tablausuario">

<table>
<thead>
                <tr>
                <th>Numero de usuario</th>
                <th>Usuario</th>
                   
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
              
                
                </tr>
            </thead>
<tbody>
<?php
    $incremental= 0;
while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
            
                $incremental= $incremental + 1; 
                echo "<td>" . $incremental . "</td>";
                echo "<td>" . $fila['usuario'] . "</td>";
                echo "<td>" . $fila['rol'] . "</td>";
                echo '<td><button class="editar" data-id="' . $fila['dni'] . '">Editar</button></td>';


                echo '<td><button class="mostrar" IdUsuario="'.$fila['dni'].'">Eliminar</button></td>';
                // Agrega más celdas si hay más columnas en tu tabla de usuarios
                echo "</tr>";
            }
            ?>
           
  </tbody>
  
  </table>
  <?php
// Verificar si el parámetro "registro" está presente en la URL
if (isset($_GET['registro'])) {
    // Obtener el valor del parámetro
    $registro = $_GET['registro'];

    // Mostrar un mensaje de alerta según el valor del parámetro
    if ($registro === 'exitoso') {
        echo '<script>alert("Usuario registrado exitosamente.");</script>';
    } elseif ($registro === 'error') {
        echo '<script>alert("Error al agregar usuario.");</script>';
    }elseif ($registro === 'eliminado') {
        echo '<script>alert("Usuario eliminado.");</script>';
    }
}
?>
  <div id="modalAgregar" class="modal" style="display: none;">
    <div class="modal-contenido">
        <span class="cerrar-modal" onclick="cerrarModalAgregar()">&times;</span>
        <h2 style="color: black;">Agregar Nuevo Usuario</h2>
        <form method="post" action="agregar_usuario.php">
        <label style="color: black;"for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        
        <label style="color: black;"for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label style="color: black;" for="rol">Rol:</label><br>
        <input type="text" id="rol" name="rol" required><br>
        
        <button type="submit" name="agregar_usuario">Registrar</button> <!-- Añadido name="agregar_usuario" -->
    </form>

    </div>
</div>

<div id="modalEliminar" class="modal" style="display: none;">
    <div class="modal-contenido">
        <span class="cerrar-modal" onclick="cerrarModalEliminar()">&times;</span>
        <h2 style="color: black;">¿Estás seguro de eliminar?</h2>
   
        <form method="post" action="eliminar_usuario.php">
            <input type="hidden" name="id_usuario" id="idUsuarioEliminar" value="">
            <button type="submit" name="eliminar_usuario">Eliminar</button>
        </form>
    </div>
</div>

<!-- Modal de Edición -->
<div id="modalEditar" class="modal" style="display: none;">
    <div class="modal-contenido">
        <span class="cerrar-modal" onclick="cerrarModalEditar()">&times;</span>
        <h2 style="color: black;">Editar los campos</h2>
        <!-- Formulario de Edición -->
        <form id="formularioEditar" method="post" action="actualizar_usuario.php">
            <input type="hidden" id="idUsuarioEditar" name="idUsuarioEditar">
            <label style="color: black;" for="nuevoUsuario">Nuevo Usuario:</label>
            <input type="text" id="nuevoUsuario" name="nuevoUsuario" required><br>
            <label style="color: black;" for="nuevoRol">Nuevo Rol:</label>
            <input type="text" id="nuevoRol" name="nuevoRol" required><br>
            <label style="color: black;" for="nuevaContrasena">Nueva Contraseña:</label>
            <input type="password" id="nuevaContrasena" name="nuevaContrasena" required><br>
            <button type="submit" name="editar_usuario">Guardar Cambios</button>
        </form>
    </div>
</div>


<br>
<button onclick="abrirModalAgregar()">Agregar</button>
    

</div>


</div>
<script src="script.js"></script>

</body>
<footer> Desarrollado por Aalone Arceus Yagami</footer>
</html>
