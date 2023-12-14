<?php
require_once("./Usuario.php");

$objusuario = new usuario( $_POST["Correo"],$_POST["Nombres"], $_POST["Apellidos"], $_POST["Documento"], $_POST["Numero"], $_POST["id"]);

$objusuario->editarusuario($_POST["id"]);

header("Location: ./MostrarDatos.php");
?>