<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $app = $_POST['app'];
    $apm = $_POST['apm'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password !== $password2) {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
        exit();
    }

    if (empty($nombre) || empty($app) || empty($apm) || empty($telefono) || empty($email) || empty($edad) || empty($password)) {
        echo "<script>alert('Campos vacíos.');</script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, apellidoP, apellidoM, telefono, correo, edad, pass, tipo) 
            VALUES (:nombre, :apellidoP, :apellidoM, :telefono, :correo, :edad, :pass, 'Usuario')";
    
    $stmt = $conexion->prepare($sql); 

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidoP', $app);
    $stmt->bindParam(':apellidoM', $apm);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $email);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':pass', $hashedPassword);

    if ($stmt->execute()) {
        header('Location: login.html');
        exit();
    } else {
        echo "<script>alert('Error al registrar. Inténtalo de nuevo.');</script>";
        exit();
    }
} else {
    echo "<script>alert('Método no permitido.');</script>";
}
?>

