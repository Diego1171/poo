<?php
  require_once "./Usuario.php";
  $Id_usuario = $_GET["id"];
  $usuario = Usuario::mostrarusuario($Id_usuario);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/editar.css"/>

    <title>Modificar Formulario</title>
</head>
<body>
    <h1>Modificar Formulario Estudiantes </h1>
    <form method="POST" action="./modificarUsuario.php">
    <input value="<?php echo $Id_usuario; ?>" type="text" name="id" hidden>    
    <label for="">Correo</label><input value="<?php echo $usuario['Correo']; ?>" type="text" name="Correo">
    <label for="">Nombres</label><input value="<?php echo $usuario['Nombres']; ?>" type="text" name="Nombres">
    <label for="">Apellidos</label><input value="<?php echo $usuario['Apellidos']; ?>" type="text" name="Apellidos">
    <label for="">Documento</label><input value="<?php echo $usuario['Documento']; ?>" type="text" name="Documento">
    <label for="">Numero</label><input value="<?php echo $usuario['Numero']; ?>" type="text" name="Numero">
    <p><input type="submit" value="Guardar Cambios" name="enviar"></p>
    </form>
</body>
</html>