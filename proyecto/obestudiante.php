<?php
require_once('./conexion.php');
require_once('./Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $Correo= $_POST['Correo'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Documento = $_POST['Documento'];
    $Numero = $_POST['Numero'];
    
    $usuarios = new Usuario($Correo,$Nombres, $Apellidos, $Documento, $Numero);

    
    $usuarios->guardar();

    
    header("Location: ./html/enviado.html");
    echo "gracias";
    exit();
}
?>
