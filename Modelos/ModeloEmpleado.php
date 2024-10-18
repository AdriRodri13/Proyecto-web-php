<?php

class ModeloEmpleado {

    public function __construct(
            private PDO $conexion
    ) {
        
    }

    /*
     * Comprobar existencia recoge los id de todos los empleados en la BBDD
     * Y lo comprueba con el parametro de llegada. En caso de que coincida con alguno
     * devuelve True.
     */

    private function comprobarExistencia(string $id): bool {
        $sql = "SELECT * FROM empleados WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);

        // Ejecutar la consulta
        $stmt->execute();

        // Comprobar si se ha encontrado un registro
        return $stmt->fetch() !== false; // Retorna true si se encontró un registro, false si no
    }

    /**
     * Inserta un nuevo empleado en la base de datos.
     * Toma un objeto Empleado como parámetro y ejecuta una consulta 
     * SQL para insertar sus atributos (nombre, email, puesto y sueldo)
     * en la tabla 'empleados'.
     * 
     * @param Empleado $empleado Objeto que contiene la información del empleado.
     * @return bool Retorna true si la inserción fue exitosa, false en caso contrario.
     */
    public function insertarEmpleado(Empleado $empleado): bool {
        $sql = "INSERT INTO empleados (id,nombre, email, puesto, sueldo) VALUES (_id, :nombre, :email, :puesto, :sueldo)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':nombre', $empleado->getNombre());
        $stmt->bindValue(':email', $empleado->getEmail());
        $stmt->bindValue(':puesto', $empleado->getPuesto());
        $stmt->bindValue(':sueldo', $empleado->getSueldo());
        $stmt->bindValue(':id', $empleado->getId());
        return $stmt->execute();
    }

    /**
     * Elimina un empleado de la base de datos según su ID.
     * Primero verifica si el empleado existe llamando a la función 
     * comprobarExistencia(). Si existe, ejecuta una consulta SQL para 
     * eliminarlo de la tabla 'empleados'.
     * 
     * @param string $id ID del empleado a eliminar.
     * @return bool Retorna true si la eliminación fue exitosa, false si el empleado no existe.
     */
    public function eliminarEmpleado(string $id): bool {
        if ($this->comprobarExistencia($id)) {
            $sql = "DELETE FROM empleados WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindValue(':id', $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    /**
     * Actualiza la información de un empleado existente en la base de datos.
     * Verifica primero si el empleado existe. Si es así, ejecuta una 
     * consulta SQL para actualizar sus atributos (nombre, email, puesto y sueldo).
     * 
     * @param Empleado $empleado Objeto que contiene la información actualizada del empleado.
     * @return bool Retorna true si la actualización fue exitosa, false si el empleado no existe.
     */
    public function actualizarEmpleado(Empleado $empleado): bool {
        if ($this->comprobarExistencia($empleado->getId())) {
            $sql = "UPDATE empleados 
        SET nombre = :nombre, email = :email, puesto = :puesto, sueldo = :sueldo 
        WHERE id = :id;";

            $stmt = $this->conexion->prepare($sql);

            // Vinculación de valores
            $stmt->bindValue(':nombre', $empleado->getNombre());
            $stmt->bindValue(':email', $empleado->getEmail());
            $stmt->bindValue(':puesto', $empleado->getPuesto());
            $stmt->bindValue(':sueldo', $empleado->getSueldo());
            $stmt->bindValue(':id', $empleado->getId());

            // Ejecutar la consulta
            return $stmt->execute();
        } else {
            return false;
        }
    }

    /**
     * Recoge todos los empleados de la base de datos.
     * Ejecuta una consulta SQL para seleccionar todos los registros 
     * de la tabla 'empleados' y devuelve un array con todos los resultados.
     * 
     * @return array Un array de empleados obtenidos de la base de datos.
     */
    public function recogerAlumnos(): array {
        try {
            // Consulta para obtener todos los empleados
            $sql = "SELECT * FROM empleados";

            // Preparar y ejecutar la consulta
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();

            // Obtener todos los resultados
            $empleados = $stmt->fetchAll();

            // Retornar los resultados
            return $empleados;
        } catch (PDOException $e) {
            $this->manejarExcepcion($e);
        }
    }

    /**
     * Maneja excepciones relacionadas con la base de datos.
     * Al producirse un error, guarda el mensaje de error en la 
     * sesión y redirige a una página de errores.
     * 
     * @param PDOException $e La excepción que se ha producido.
     */
    private function manejarExcepcion(PDOException $e) {
        $_SESSION['errores']['BBDD'] = $e->getMessage();
        header('location:errores.php');
        exit();
    }
}
