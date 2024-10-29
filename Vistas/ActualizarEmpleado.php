<?php
if ($empleado instanceof Empleado) {
    ?>
<head>
    <style>
    /* Estilos para el formulario de actualización */
    form {
        width: 100%;
        max-width: 500px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px auto;
    }

    label {
        display: block;
        font-size: 14px;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
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
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #2176bd;
    }
</style>

</head>
    <form action="../Controladores/UsuarioController.php" method="POST">

        <input type="hidden" name="instruccion" value="actualizar">
        <input type="hidden" name="empleado[id]" value="<?= $empleado->getId(); ?> "
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="empleado[nombre]" value="<?= $empleado->getNombre(); ?>" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="empleado[email]" value="<?= $empleado->getEmail(); ?>" required><br><br>

        <label for="puesto">Puesto:</label><br>
        <input type="text" id="puesto" name="empleado[puesto]" value="<?= $empleado->getPuesto(); ?>" required><br><br>

        <label for="sueldo">Sueldo:</label><br>
        <input type="number" id="sueldo" name="empleado[sueldo]" value="<?= $empleado->getSueldo(); ?>" step="0.01" required><br><br>

        <input type="submit" value="Actualizar Usuario">
    </form>
    <?php
}
?>
