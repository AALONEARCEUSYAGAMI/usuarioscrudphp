<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="c.css">
    <title>login</title>
</head>
<body>
    
    <div class="contenedor">

  <form action="login.php" method="post">

    <h1>Bienvenido</h1>
    <?php 
            // Verificar si hay un error y mostrarlo
            if(!empty($_GET)) {
      echo "<br>";
                echo "<p>error de usuario o password</p>";
            }
            ?>
    <br>
    <p>usuario</p>

<input type="text" id="username" placeholder="Usuario" name="username" required> 
    <p>password</p>
    <input type="text" id="password" placeholder="password"name="password" required>
    <br>
    <br>
    <input type="submit" value="Iniciar sesion">
<br><br>
     <a href="">perdiste tu contraseña</a> <br>
     <a href="">¿Notienes cuenta ? Registrate</a>
    
  </form>
 
  
</div>

<div class="volver">  
    
    <a  href="">volver</a>

</div>

<footer> Desarrollado por Aalone Arceus Yagami</footer>
</body>

</html>