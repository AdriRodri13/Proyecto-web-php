<?php

?>

<html>
    <head>
        <title>Lista Empleados</title>
    </head>
    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>PUESTO</th>
                <th>SUELDO</th>
                <th>ACCION</th>
            </tr>
            <?php 
            foreach ($empleado as $empleado) {
               if($empleado instanceof Empleado){
                   echo '<td>'. $empleado->getId() .'</td>';
                   echo '<td>'. $empleado->getNombre() .'</td>';
                   echo '<td>'. $empleado->getEmail() .'</td>';
                   echo '<td>'. $empleado->getPuesto() .'</td>';
                   echo '<td>'. $empleado->getSueldo() .'</td>';
                   echo '<td>';
                   echo '<a href="../Controladores/UsuarioController.php?instruccion=cargar&id=' . $empleado->getId() . '">Editar</a> | ';
                   echo '<a href="../Controladores/UsuarioController.php?instruccion=eliminar&id=' . $empleado->getId() . '">Eliminar</a>';
                   echo '</td>';
               }
            }
            ?>
        </table>
    </body>
</html>

