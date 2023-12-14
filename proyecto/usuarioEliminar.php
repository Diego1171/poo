
<?php
require_once("./Usuario.php");

$objusuario = new usuario( $_POST["Correo"],$_POST["Nombres"], $_POST["Apellidos"], $_POST["Documento"], $_POST["Numero"],  $_GET["id"]);

$objusuario->eliminarusuario($_GET["id"]);

header("Location: ./MostrarDatos.php");
?>