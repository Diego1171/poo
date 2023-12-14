<?php
  require_once "./equipo.php";
  $Id_equipo = $_GET["id"];
  $equipo = equipo::mostrarequipo($Id_equipo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/editarEquipo.css"/>
    <title>Modificar Formulario</title>
</head>
<body>
    <h1>Modificar Formulario equipo</h1>
    <form method="POST" action="./modificarEquipo.php">
    <input value="<?php echo $Id_equipo; ?>" type="text" name="id" hidden>    
    <label for="">Marca</label><input value="<?php echo $equipo['Marca']; ?>" type="text" name="Marca">
    <label for="">Descripcion</label><input value="<?php echo $equipo['Descripcion']; ?>" type="text" name="Descripcion">
    <p><input type="submit" value="Guardar Cambios" name="enviar"></p>
    </form>
</body>
</html>