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
            
            <?php foreach ($empleados as $empleado): ?>
            <?php if ($empleado instanceof Empleado): ?>
                <tr>
                    <td><?php echo $empleado->getId(); ?></td>
                    <td><?php echo $empleado->getNombre(); ?></td>
                    <td><?php echo $empleado->getEmail(); ?></td>
                    <td><?php echo $empleado->getPuesto(); ?></td>
                    <td><?php echo $empleado->getSueldo(); ?></td>
                    <td>
                        <a href="../Controladores/UsuarioController.php?instruccion=cargar&id=<?php echo $empleado->getId(); ?>">Editar</a> |
                        <a href="../Controladores/UsuarioController.php?instruccion=eliminar&id=<?php echo $empleado->getId(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </table>
    </body>
</html>

