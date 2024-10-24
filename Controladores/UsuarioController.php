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
        'cargar' => $this->cargarEmpleado(),
        default => $this->listarEmpleados()
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
        if(is_array(isset($_POST['empleado']))){
            $datosEmpleado = is_array($_POST['empleado']); 
            $id = is_string($_POST['empleado']['id']);
            $nombre = $datosEmpleado['nombre'];
            $email = $datosEmpleado['email'];
            $puesto = $datosEmpleado['puesto'];
            $sueldo = (float) $datosEmpleado['sueldo'];
            
            $empleado = new Empleado($id, $nombre, $email, $puesto, $sueldo);
            $this->modeloEmpleados->actualizarEmpleado($empleado);
            $this->listarEmpleados();
        }
    }
    
    private function cargarEmpleado():void{
        if(isset(is_string($_GET['id']))){
            $id = $_GET['id'];
            $empleado = $this->modeloEmpleados->recogerEmpleado($id);
            View::render('../Vistas/ActualizarEmpleado.php',['empleado'=>$empleado]);
        }
    }
    
    private function eliminarEmpleado():void{
     if(is_string(isset($_GET['id']))){
            $id = is_string($_GET['id']);
            $this->modeloEmpleados->eliminarEmpleado($id);
            $this->listarEmpleados();
        }   
    }

}
$controlador = new UsuarioController();

$instruccion = "";

if (isset(is_string($_POST['instruccion']))) {
    // Si la instrucción llega por POST
    $instruccion = $_POST['instruccion'];
} elseif (isset(is_string($_GET['instruccion']))) {
    // Si la instrucción llega por GET
    $instruccion = $_GET['instruccion'];
} else {
    $instruccion = 'listar';
}
$controlador->manejarPeticion($instruccion);


