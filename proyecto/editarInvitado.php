<?php
  require_once "./Invitado.php";
  $Id_invitado = $_GET["id"];
  $invitado = Invitado::mostrarinvitado($Id_invitado);
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
    <h1>Modificar Formulario invitado</h1>
    <form method="POST" action="./modificarInvitado.php">
    <input value="<?php echo $Id_invitado; ?>" type="text" name="id" hidden>    
    <label for="">Correo</label><input value="<?php echo $invitado['Correo']; ?>" type="text" name="Correo">
    <label for="">Nombres</label><input value="<?php echo $invitado['Nombres']; ?>" type="text" name="Nombres">
    <label for="">Apellidos</label><input value="<?php echo $invitado['Apellidos']; ?>" type="text" name="Apellidos">
    <label for="">Documento</label><input value="<?php echo $invitado['Documento']; ?>" type="text" name="Documento">
    <label for="">Numero</label><input value="<?php echo $invitado['Numero']; ?>" type="text" name="Numero">
    <p><input type="submit" value="Guardar Cambios" name="enviar"></p>
    </form>
</body>
</html>