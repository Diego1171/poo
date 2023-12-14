<?php
require_once("./equipo.php");

$objequipo = new equipo( $_POST["Marca"],$_POST["Descripcion"],  $_GET["id"]);

$objequipo->editarequipo($_POST["id"]);

header("Location: ./MostrarDatosCompu.php");
?>