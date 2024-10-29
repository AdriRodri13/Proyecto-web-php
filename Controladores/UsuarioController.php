<?php

require '../Conexion/Conexion.php';
require '../Modelos/ModeloEmpleado.php';
require '../Entidades/Empleado.php';
require '../Entidades/View.php';

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
        if (isset($_POST['empleado'])){
            $nombre = $_POST['empleado']['nombre'];
            $email = $_POST['empleado']['email'];
            $puesto = $_POST['empleado']['puesto'];
            $sueldo = $_POST['empleado']['sueldo'];
            
            $empleado = new Empleado($nombre, $email, $puesto, $sueldo);
            
            $this->modeloEmpleados->insertarEmpleado($empleado);
            $this->listarEmpleados();
        }
    }
    
    private function actualizarEmpleado():void{
        if (isset($_POST['empleado'])){
            $datosEmpleado = $_POST['empleado']; 
            $id = $datosEmpleado['id'];
            $nombre = $datosEmpleado['nombre'];
            $email = $datosEmpleado['email'];
            $puesto = $datosEmpleado['puesto'];
            $sueldo = (float) $datosEmpleado['sueldo'];
            $empleado = new Empleado($nombre, $email, $puesto, $sueldo,$id);
            $this->modeloEmpleados->actualizarEmpleado($empleado);
            $this->listarEmpleados();
        }
    }
    
    private function cargarEmpleado():void{
        if (isset($_GET['id']) && is_string($_GET['id'])){
            $id = $_GET['id'];
            $empleado = $this->modeloEmpleados->recogerEmpleado($id);
            View::render('../Vistas/ActualizarEmpleado.php',['empleado'=>$empleado]);
        }
    }
    
    private function eliminarEmpleado():void{
    if (isset($_GET['id']) && is_string($_GET['id'])){
            $id = $_GET['id'];
            $this->modeloEmpleados->eliminarEmpleado($id);
            $this->listarEmpleados();
        }   
    }

}
$controlador = new UsuarioController();

$instruccion = "";

if (isset($_POST['instruccion']) && is_string($_POST['instruccion'])) {
    // Si la instrucción llega por POST
    $instruccion = $_POST['instruccion'];
} elseif (isset($_GET['instruccion']) && is_string($_GET['instruccion'])) {
    $instruccion = $_GET['instruccion'];
} else {
    $instruccion = 'listar';
}
$controlador->manejarPeticion($instruccion);


