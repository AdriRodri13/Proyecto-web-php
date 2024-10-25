<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of View
 *
 * @author Admin
 */
class View {
    public static function render($viewPath, $data = []) {
        // Extrae las claves del array como variables para la vista
        extract($data); 
        
        // Verifica si la vista existe
        if (file_exists($viewPath)) {
            include $viewPath; // Incluye el archivo de vista especificado
        } else {
            throw new Exception("La vista $viewPath no existe.");
        }
    }
}
