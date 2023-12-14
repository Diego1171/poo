<?php
require_once("equipo.php");
$equipo = equipo ::mostrar();
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/tabla.css"/>
 
</head>
<body>
    <table id="userTable">
        <thead>
            <th>Id_equpo</th>
            <th>Marca</th>
            <th>Descripcion</th>
            
        </thead>
        <tbody>
                <?php foreach($equipo as $item) { ?>
                    <tr>
                    <td><?php echo $item['Id_equipo']; ?></td>
                        <td><?php echo $item['Marca']; ?></td>
                        <td><?php echo $item['Descripcion']; ?></td>
                        <th>
                        <a  href="<?php echo "editarEquipo.php?id=" . $item['Id_equipo']?>">Editar</a>
                        <a  href="<?php echo "compuEliminar.php?id=" . $item['Id_equipo']?>">Eliminar</a>
                        </th>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <!-- Botón de retroceso como un elemento <button> -->
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