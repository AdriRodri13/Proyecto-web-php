<?php

class ModeloEmpleado{
    public function __construct(
        private PDO $conexion
    ) 
    {}
    
    /*
     * Comprobar existencia recoge los id de todos los empleados en la BBDD
     * Y lo comprueba con el parametro de llegada. En caso de que coincida con alguno
     * devuelve True.
     */
    private function comprobarExistencia(string $id):bool{
        
    }
    
    public function insertarEmpleado(Empleado $empleado):bool{
        
    }
    
    public function eliminarEmpleado(string $id):bool{
        
    }
    
    public function actualizarEmpleado(Empleado $empleado):bool{
        
    }
    
    public function recogerAlumnos():array{
        
    }
    
    

}

