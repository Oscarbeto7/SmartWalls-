<?php

// src/Product.php

class Product {
    private $conn;
    private $table_name = "usuarios";
    
    // Propiedades
    public $idUsuario; // Identificador único para cada usuario
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $telefono;
    public $correo;
    public $edad;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo usuario
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, apellidoP=:apellidoP, apellidoM=:apellidoM, telefono=:telefono, correo=:correo, edad=:edad";
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos antes de usarlos en la consulta
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellidoP = htmlspecialchars(strip_tags($this->apellidoP));
        $this->apellidoM = htmlspecialchars(strip_tags($this->apellidoM));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->edad = htmlspecialchars(strip_tags($this->edad));

        // Enlazar los parámetros
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellidoP", $this->apellidoP);
        $stmt->bindParam(":apellidoM", $this->apellidoM);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":edad", $this->edad);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer todos los usuarios
    public function read() {
        $query = "SELECT idUsuario, nombre, apellidoP, apellidoM, telefono, correo, edad FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Actualizar un usuario
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, apellidoP = :apellidoP, apellidoM = :apellidoM, telefono = :telefono, correo = :correo, edad = :edad WHERE idUsuario = :idUsuario";
        
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos antes de usarlos en la consulta
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellidoP = htmlspecialchars(strip_tags($this->apellidoP));
        $this->apellidoM = htmlspecialchars(strip_tags($this->apellidoM));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->edad = htmlspecialchars(strip_tags($this->edad));
        $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));

        // Enlazar los parámetros
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellidoP", $this->apellidoP);
        $stmt->bindParam(":apellidoM", $this->apellidoM);
        $stmt->bindParam(":telefono", $this->telefono);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":idUsuario", $this->idUsuario);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un usuario
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idUsuario = :idUsuario";
        $stmt = $this->conn->prepare($query);

        $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));
        $stmt->bindParam(":idUsuario", $this->idUsuario);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

?>
