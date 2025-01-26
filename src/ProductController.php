<?php

// src/UserController.php

require_once '../config/database.php';
require_once 'Product.php';

class ProductController {

    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    // Método para manejar la solicitud POST (crear un usuario)
    public function create() {
        $data = json_decode(file_get_contents('php://input'));

        if (!empty($data->nombre) && !empty($data->apellidoP) && !empty($data->apellidoM) && !empty($data->telefono) && !empty($data->correo) && !empty($data->edad)) {
            $this->product->nombre = $data->nombre;
            $this->product->apellidoP = $data->apellidoP;
            $this->product->apellidoM = $data->apellidoM;
            $this->product->telefono = $data->telefono;
            $this->product->correo = $data->correo;
            $this->product->edad = $data->edad;

            if ($this->product->create()) {
                http_response_code(201);
                echo json_encode(["message" => "Usuario creado exitosamente."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "No se pudo crear el usuario."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos."]);
        }
    }

    // Método para manejar la solicitud GET (leer los usuarios)
    public function read() {
        $stmt = $this->product->read();
        $num = $stmt->rowCount();

        if ($num > 0) {
            $user_arr = [];
            $user_arr["registros"] = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $user_item = [
                    "idUsuario" => $idUsuario,
                    "nombre" => $nombre,
                    "apellidoP" => $apellidoP,
                    "apellidoM" => $apellidoM,
                    "telefono" => $telefono,
                    "correo" => $correo,
                    "edad" => $edad
                ];
                array_push($user_arr["registros"], $user_item);
            }

            http_response_code(200);
            echo json_encode($user_arr);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "No se encontraron usuarios."]);
        }
    }

    // Método para manejar la solicitud PUT (actualizar un usuario)
    public function update() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->idUsuario) && 
            (!empty($data->nombre) || !empty($data->apellidoP) || !empty($data->apellidoM) || !empty($data->telefono) || !empty($data->correo) || !empty($data->edad))) {
            
            $this->product->idUsuario = $data->idUsuario;
            $this->product->nombre = $data->nombre ?? null;
            $this->product->apellidoP = $data->apellidoP ?? null;
            $this->product->apellidoM = $data->apellidoM ?? null;
            $this->product->telefono = $data->telefono ?? null;
            $this->product->correo = $data->correo ?? null;
            $this->product->edad = $data->edad ?? null;

            if ($this->product->update()) {
                http_response_code(200);
                echo json_encode(["message" => "Usuario actualizado exitosamente."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "No se pudo actualizar el usuario."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos o incorrectos."]);
        }
    }

    // Método para manejar la solicitud DELETE (eliminar un usuario)
    public function delete() {
        $data = json_decode(file_get_contents("php://input"));

        if (!empty($data->idUsuario)) {
            $this->product->idUsuario = $data->idUsuario;

            if ($this->product->delete()) {
                http_response_code(200);
                echo json_encode(["message" => "Usuario eliminado exitosamente."]);
            } else {
                http_response_code(503);
                echo json_encode(["message" => "No se pudo eliminar el usuario."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Datos incompletos."]);
        }
    }
}
?>
