<html>
    <head>
    <title>Lista Empleados</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            color: #4a90e2;
        }

        a {
            text-decoration: none;
            color: #4a90e2;
            font-weight: bold;
        }

        a:hover {
            color: #2176bd;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #4a90e2;
            color: white;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
        }

        td {
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #e6f7ff;
        }

        /* Estilo para los botones de acción */
        .actions a {
            color: #4a90e2;
            margin: 0 5px;
            font-size: 12px;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        /* Estilos para el botón de añadir empleado */
        .add-employee-btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            background-color: #4a90e2;
            color: white;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
        }

        .add-employee-btn:hover {
            background-color: #2176bd;
        }
    </style>
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
        <a href="..\Vistas\AñadirEmpleado.php">AÑADIR EMPLEADO</a>
    </body>
</html>

