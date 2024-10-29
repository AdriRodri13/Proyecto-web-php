<?php

/**
 * Description of Empleado
 *
 * @author dania
 */
class Empleado {
    
    public function __construct(
        
        private string $nombre,
        private string $email,
        private string $puesto,
        private float $sueldo,
        private string $id="provisional"
    ) {}
    
    public function getId(): string {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPuesto(): string {
        return $this->puesto;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPuesto(string $puesto): void {
        $this->puesto = $puesto;
    }

    public function setSueldo(float $suledo): void {
        $this->sueldo = $suledo;
    }
    
    public function equals(string $id):bool{
        return $this->id == $id;
    }

    public function __toString(): string {
        return "Empleado[id=" . $this->id
                . ", nombre=" . $this->nombre
                . ", email=" . $this->email
                . ", puesto=" . $this->puesto
                . ", suledo=" . $this->sueldo
                . "]";
    }

    


}
