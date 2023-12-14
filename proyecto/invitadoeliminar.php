
<?php
require_once("./Invitado.php");

$objinvitado = new invitado( $_POST["Correo"],$_POST["Nombres"], $_POST["Apellidos"], $_POST["Documento"], $_POST["Numero"],  $_GET["id"]);

$objinvitado->eliminarinvitado($_GET["id"]);

header("Location: ./mostrardatosin.php");