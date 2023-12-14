<?php
require_once("Usuario.php");
$Estudiantes = Usuario::mostrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="./css/tabla.css"/>
</head>
<body>

    <table id="userTable">
        <thead>
            <th>Id_usuario</th>
            <th>Correo</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>Numero</th>
        </thead>
        <tbody>
            <?php foreach($Estudiantes as $item) { ?>
                <tr>
                    <td><?php echo $item['Id_usuario']; ?></td>
                    <td><?php echo $item['Correo']; ?></td>
                    <td><?php echo $item['Nombres']; ?></td>
                    <td><?php echo $item['Apellidos']; ?></td>
                    <td><?php echo $item['Documento']; ?></td> 
                    <td><?php echo $item['Numero']; ?></td>
                    <th> 
              <a  href="<?php echo "editarUsuario.php?id=" . $item['Id_usuario']?>">Editar</a>
              <a  href="<?php echo "usuarioEliminar.php?id=" . $item['Id_usuario']?>">Eliminar</a>
            </th>
                </tr>
            <?php } ?>
        </tbody>
        
    </table>

    <!-- Agregar el botón de retroceso -->
    <button onclick="window.location.href='../proyecto/html/paginaAdmin.html'">Volver Atrás</button>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>

</body>
</html>
