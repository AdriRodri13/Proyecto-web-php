<?php

require '../Conexion/Conexion.php';
require '../Modelos/ModeloEmpleado.php';
require '../Entidades/Empleado.php';

class UsuarioController{
    
    private $modeloEmpleados;
    
    public function __construct() {
        $this->conexion = establecerConexion();
        $this->modeloEmpleados = new ModeloEmpleado($this->conexion);
    }
    
    
    
    public function manejarPeticion(string $instruccion):void{
        match ($instruccion) {
        'listar' => $this->listarEmpleados(),
        'insertar' => $this->insertarEmpleado(),
        'actualizar' => $this->actualizarEmpleado(),
        'eliminar' => $this->eliminarEmpleado(),
        default => $this->listarEmpleados(),
        };
    }
    
    private function listarEmpleados():void{
        $empleados = $this->modeloEmpleados->recogerEmpleados();
        View::render('../Vistas/ListaEmpleados.php',['empleados'=>$empleados]);
    }
    
    private function insertarEmpleado():void{
        if(is_string(isset($_POST['empleado']))){
            $id = is_string($_POST['empleado']['id']);
            $nombre = is_string($_POST['empleado']['nombre']);
            $email = is_string($_POST['empleado']['email']);
            $puesto = is_string($_POST['empleado']['puesto']);
            $sueldo = is_string($_POST['empleado']['sueldo']);
            $empleado = new Empleado($id, $nombre, $email, $puesto, $sueldo);
            $this->modeloEmpleados->insertarEmpleado($empleado);
            $this->listarEmpleados();
        }
    }
    
    private function actualizarEmpleado():void{
        if(is_string(isset($_POST['empleado']))){
            $id = is_string($_POST['empleado']['id']);
            $nombre = is_string($_POST['empleado']['nombre']);
            $email = is_string($_POST['empleado']['email']);
            $puesto = is_string($_POST['empleado']['puesto']);
            $sueldo = is_string($_POST['empleado']['sueldo']);
            $empleado = new Empleado($id, $nombre, $email, $puesto, $sueldo);
            $this->modeloEmpleados->actualizarEmpleado($empleado);
            $this->listarEmpleados();
        }
    }
    
    private function eliminarEmpleado():void{
     if(is_string(isset($_GET['id']))){
            $id = is_string($_POST['id']);
            $this->modeloEmpleados->eliminarEmpleado($id);
            $this->listarEmpleados();
        }   
    }

}
$controlador = new UsuarioController();
$instruccion = is_string($_POST['instruccion']);
$controlador->manejarPeticion($instruccion);


