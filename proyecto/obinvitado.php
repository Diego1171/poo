<?php
require_once('./conexion.php');
require_once('./Invitado.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $Correo= $_POST['Correo'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Documento = $_POST['Documento'];
    $Numero = $_POST['Numero'];
    
    $invitado = new invitado($Correo,$Nombres, $Apellidos, $Documento, $Numero);

    
    $invitado->guardar();

    
    header("Location: ./html/enviado.html");
    echo "gracias";
    exit();
}
?>