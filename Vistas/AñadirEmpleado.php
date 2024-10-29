<?php

?>

<head>
    <style>
    /* Estilos para el formulario */
    form {
        width: 100%;
        max-width: 500px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
    }

    form table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th {
        text-align: left;
        padding: 10px;
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

    td {
        padding: 10px;
    }

    /* Estilos para los campos de entrada */
    input[type="text"],
    input[type="email"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        color: #333;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="number"]:focus {
        border-color: #4a90e2;
        outline: none;
        box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
    }

    /* Estilo para el botón de envío */
    input[type="submit"] {
        background-color: #4a90e2;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #2176bd;
    }
</style>
</head>
<form action="../Controladores/UsuarioController.php" method="POST">
    <input type="hidden" name="instruccion" value="insertar">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th><label for="nombre">Nombre:</label></th>
            <td><input type="text" id="nombre" name="empleado[nombre]" required></td>
        </tr>
        <tr>
            <th><label for="email">Correo Electrónico:</label></th>
            <td><input type="email" id="email" name="empleado[email]" required></td>
        </tr>
        <tr>
            <th><label for="puesto">Puesto:</label></th>
            <td><input type="text" id="puesto" name="empleado[puesto]" required></td>
        </tr>
        <tr>
            <th><label for="sueldo">Sueldo:</label></th>
            <td><input type="number" id="sueldo" name="empleado[sueldo]" step="0.01" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Guardar Empleado">
            </td>
        </tr>
    </table>
</form>
