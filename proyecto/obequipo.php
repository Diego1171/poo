<?php
require_once('./conexion.php');
require_once('./equipo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $Marca= $_POST['Marca'];
    $Descripcion = $_POST['Descripcion'];
    $equipo = new equipo($Marca, $Descripcion);
    $equipo->guardar();
    header("Location: ./html/enviado.html");
    exit();
}
?>