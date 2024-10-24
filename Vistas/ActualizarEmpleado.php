<?php
if ($empleado instanceof Empleado) {
    ?>

    <form action="../Controladores/UsuarioController.php" method="POST">

        <input type="hidden" name="instruccion" value="actualizar">
        <input type="hidden" name="id" value="<?= $empleado->getId(); ?>"
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
